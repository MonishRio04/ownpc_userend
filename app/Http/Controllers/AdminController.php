<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\User;
use App\Notifications\VendorApproveNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } // End Method


    public function AdminLogin()
    {
        return 0;
        return view('admin.admin_login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old password doesnt match");
        }

        //Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password Changed Successfully");
    }

    public function InactiveVendor()
    {
        $inActiveVendor = User::where('status', 'inactive')->where('role', 'vendor')->latest()->get();
        return view('backend.vendor.inactive_vendor', compact('inActiveVendor'));
    }

    public function ActiveVendor()
    {
        $ActiveVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        return view('backend.vendor.active_vendor', compact('ActiveVendor'));
    }

    public function InactiveVendorDetails($id)
    {
        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details', compact('inactiveVendorDetails'));
    }

    public function ActiveVendorApprove(Request $request)
    {

        $vendor_id = $request->id;
        $user = User::findOrFail($vendor_id)->update([
            'status' => 'active',
        ]);
        $notification = array(
            'message' => 'Vendor Active successfully',
            'alert-type' => 'success'
        );
        $vuser = User::where('role', 'vendor')->get();
        Notification::send($vuser, new VendorApproveNotification($request));
        return redirect()->route('active.vendor')->with($notification);
    }

    public function ActiveVendorDetails($id)
    {
        $activeVendorDetails = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details', compact('activeVendorDetails'));
    }

    public function InactiveVendorApprove(Request $request)
    {
        $vendor_id = $request->id;
        $user = User::findOrFail($vendor_id)->update([
            'status' => 'inactive',
        ]);
        $notification = array(
            'message' => 'Vendor Inactive successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('inactive.vendor')->with($notification);
    }

    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    ////Admin All Method /////
    public function AllAdmin()
    {
        $alladminuser = User::where('role', 'admin')->latest()->get();
        return view('backend.admin.all_admin', compact('alladminuser'));
    }

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
    }

    public function AdminUserStore(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->password = Hash::make($request->password);
        $user->status = 'active';
        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        $notification = array(
            'message' => 'New Admin User Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdminRole($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin', compact('user', 'roles'));
    }

    public function AdminUserUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        $notification = array(
            'message' => 'Admin User Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdminRole($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message' => 'Admin User Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function affiliate()
    {
        $affiliates = Affiliate::where('status', 1)->latest()->get();
        return view('backend.affiliate.index', compact('affiliates'));
    }

    public function affiliateEdit($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('backend.affiliate.edit', compact('affiliate'));
    }


    public function affiliateUpdate(Request $request, $id)
    {
        $affiliate = Affiliate::findOrFail($id);
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20|unique:affiliates,phone,' . $affiliate->id,
            'address' => 'nullable|string',
            'bank_details' => 'nullable|json',
            'commision_rate' => 'nullable|integer|min:0|max:100',
            'discount_rate' => 'nullable|integer|min:0|max:100',
            'referral_code' => 'nullable|string|unique:affiliates,referral_code,' . $affiliate->id,
            'status' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);

        // Handle photo upload if there is a new file
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($affiliate->photo && Storage::disk('public')->exists($affiliate->photo)) {
                Storage::disk('public')->delete($affiliate->photo);
            }
            $photoPath = $request->file('photo')->store('affiliates', 'public');
            $validated['photo'] = $photoPath;
        }
        if (is_string($validated['bank_details'] ?? '')) {
            $validated['bank_details'] = json_decode($validated['bank_details'], true);
        }
        $affiliate->update($validated);
        $notification = array(
            'message' => 'Affiliate updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/affiliate')->with($notification);
    }
    public function affiliateDelete($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        if ($affiliate->photo && Storage::disk('public')->exists($affiliate->photo)) {
            Storage::disk('public')->delete($affiliate->photo);
        }
        $affiliate->delete();
        $notification = array(
            'message' => 'Affiliate deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
