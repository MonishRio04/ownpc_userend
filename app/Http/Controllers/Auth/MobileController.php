<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use App\Notifications\RegisterUserNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MobileController extends Controller
{
    /**
     * Display the registration view.
     */
    public function mobileregisterview(): View
    {
        return view('auth.mobileregister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function mobileregisterOTPvalidation(Request $request): RedirectResponse
    {
        $url = '';
        $notification = '';
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:15', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Storing values in the session
            session([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => $request->password
            ]);

            $url = 'mobileOTPvalidate';

            return redirect()->intended($url)->with($notification);
        } catch (\Exception $e) {
            // Authentication failed
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'warning'
            );
            return redirect()->intended($url)->with($notification);
        }
    }

    public function mobileOTPvalidate(Request $request): view
    {
        return view('auth.mobileOTPvalidate');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function mobileregisterstore(Request $request): RedirectResponse
    {

        $otp = $request->otp;
        if ($otp == '12345') {
            // Retrieving values from the session
            $name = session('name');
            $phone = session('phone');
            $password = session('password');

            // Remove multiple keys from the session
            $request->session()->forget(['name', 'phone', 'password']);

            $user = User::create([
                'name' => $name,
                'phone' => $phone,
                'email' => '',
                'password' => Hash::make($password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            $nuser = User::where('role', 'admin')->get();
            Notification::send($nuser, new RegisterUserNotification($request));
            return redirect(RouteServiceProvider::HOME);
        } else {
            $notification = array(
                'message' => 'OTP is not correct. Try again',
                'alert-type' => 'warning'
            );
            return redirect()->intended('')->with($notification);
        }
    }


    public function mobilelogin(): View
    {
        return view('auth.mobilelogin');
    }

    // Handle an incoming authentication request.
    public function mobileauthenticate(Request $request)
    {
        // Validate incoming request data
        $data = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);
        if (request()->get('for') == 'otp') {
            $user = User::where('phone', $data['mobile'])->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found',
                ]);
            }
            if (!Hash::check($data['password'], $user->password)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Invalid Password',
                ]);
            }
            // $user->update(['otp' => $otp=rand(1000, 9999)]);
            return response()->json([
                'status' => true,
                'message' => 'OTP sent successfully',
                'user' => $user,
            ]);
        }
        // Get mobile and password from the request
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        // Check if the user with the given mobile number exists and has the correct password
        $user = User::where('phone', $mobile)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Attempt to authenticate the user using mobile number and password
            if (Auth::attempt(['phone' => $mobile, 'password' => $password])) {
                // Authentication successful
                // Mobile number and password are correct
                $notification = array(
                    'message' => 'Login Successfully',
                    'alert-type' => 'success'
                );
            } else {
                // Authentication failed
                $notification = array(
                    'message' => 'Login Failed',
                    'alert-type' => 'warning'
                );
            }
        } else {
            // Mobile number or password is incorrect
            $notification = array(
                'message' => 'Login Failed',
                'alert-type' => 'warning'
            );
        }

        $request->session()->regenerate();
        $url = '';
        if ($user?->role === 'admin') {
            $url = 'admin/dashboard';
        } elseif ($user?->role === 'vendor') {
            $url = 'vendor/dashboard';
        } elseif ($user?->role === 'user') {
            $url = '/dashboard';
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found',
                ]);
            }
            return redirect()->back()->with($notification);
        }
        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Login Successfully',
                'url' => $url,
            ]);
        }
        return redirect()->intended($url)->with($notification);
    }

    public function sendotp(Request $request)
    {
        // TO-DO: generate OTP and send as sms
        $user = User::where('phone', $request->mobile)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ]);
        }
        // Storing phone values in the session
        session(['phone' => $request->mobile]);

        return response()->json(['status' => 'success', 'message' => 'valid user', 'user' => $user], 200);
    }

    public function verifyotp(Request $request): RedirectResponse|JsonResponse
    {
        // retrieve phone number from session
        $mobile = $request->get('mobile');
        $url = '';
        // Check if the user with the given mobile number exists and has the correct password
        $user = User::where('phone', $mobile)->first();
        if ($user && Auth::loginUsingId($user->id)) {
            $notification = array('message' => 'Login Successfully', 'alert-type' => 'success');
            $request->session()->regenerate();
            if ($user->role === 'admin') {
                $url = 'admin/dashboard';
            } elseif ($user->role === 'vendor') {
                $url = 'vendor/dashboard';
            } elseif ($user->role === 'user') {
                $url = '/dashboard';
            }
        } else {
            session(['phone' => $mobile]);
            $url =  route('register');
        }
        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Login Successfully',
                'url' => $url,
            ]);
        }
        return redirect()->intended($url)->with($notification);
    }
}
