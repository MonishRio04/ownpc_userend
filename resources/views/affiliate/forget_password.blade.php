<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Affiliate Login – Pink Cheeks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php $setting = App\Models\SiteSetting::find(1); ?>
</head>

<body class="bg-[#fff0f5] flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <img src="{{ asset($setting->logo) }}" alt="Pink Cheeks Logo" class="mx-auto h-20 rounded-full mb-2">
            <h1 class="text-2xl font-bold text-[#f74b81]">Forget Password</h1>
        </div>

        <form method="POST" id="login-form" action="{{ route('affiliate.login') }}" class="space-y-5">
            @csrf
            <div class="" id="login-inputs">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mobile</label>
                    <div class="flex space-x-2">
                        <select name="country_code" id="country_code" required
                            class=" border bg-white border-gray-300 rounded-sm px-2 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
                            <option value="+91" selected>🇮🇳 +91</option>
                            <option value="+1">🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+61">🇦🇺 +61</option>
                            <option value="+971">🇦🇪 +971</option>
                            <!-- Add more countries as needed -->
                        </select>

                        <input type="tel" name="mobile" required id="mobile"
                            placeholder="Enter your mobile number"
                            class="w-full border border-gray-300 rounded-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
                    </div>
                </div>
                <a href="{{ url('affiliate/login') }}"
                    class="text-sm text-[#f74b81] hover:underline mt-2 inline-block">Login?</a>
            </div>
            <div class="hidden" id="otp">
                <label class="block text-sm font-medium text-gray-700 mb-1">Enter OTP</label>
                <p class="text-sm text-gray-500 mb-2">We have sent a 4-digit OTP to your registered mobile number.</p>
                <div class="flex space-x-2 justify-center">
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="text" maxlength="1" name="otp[]"
                        class="w-12 h-12 text-center border otp-input rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
            </div>
            <button type="button" onclick="sendOTP()"
                class="w-full bg-[#f74b81] text-white py-2 rounded-lg font-semibold hover:bg-[#e93c73] transition">Get
                OTP</button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Don’t have an account?
            <a href="{{ route('affiliate.registeration') }}" class="text-[#f74b81] hover:underline font-medium">Sign up
                here</a>
        </p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function sendOTP() {
            mobile = $('#mobile').val();
            window.sendOtp(
                $('#country_code').val() + mobile,
                function(data) {
                    $('#loginForm').hide();
                    $('#otpForm').show();
                    alert('OTP sent successfully.');
                },
                (error) => alert('Error occurred')
            );
        }
        $('#otpForm').on('submit', function(e) {
            e.preventDefault();
            var entered_otp = $('input[name="otp[]"]').map(function() {
                return $(this).val();
            }).get().join('');
            // For example
            window.verifyOtp(
                parseInt(entered_otp),
                (data) => {
                    const url = new URL(
                        'https://control.msg91.com/api/v5/widget/verifyAccessToken'
                    );
                    let headers = {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                    };

                    let body = {
                        "authkey": "{{ config('msg91.authkey') }}",
                        "access-token": data.message,
                    }
                    fetch(url, {
                            method: 'POST',
                            headers: headers,
                            body: JSON.stringify(body)
                        })
                        .then(response => response.json())
                        .then(json => console.log(json));
                    
                }, // optional
                (error) => alert('Something went wrong'), // optional
            );

        });
        var configuration = {
            widgetId: "{{ config('msg91.widgetId') }}",
            tokenAuth: "{{ config('msg91.token') }}",
            exposeMethods: true,
            captchaRenderId: '',
            success: (data) => {},
            failure: (error) => {
                // handle error
                console.log('failure reason', error);
            },

        };
    </script>
    <script type="text/javascript" onload="initSendOTP(configuration)" src="https://verify.msg91.com/otp-provider.js">
    </script>
</body>

</html>
