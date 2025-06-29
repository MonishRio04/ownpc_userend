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
            <h1 class="text-2xl font-bold text-[#f74b81]">Affiliate Login</h1>
            <p class="text-sm text-gray-500">Welcome back! Let’s make some magic ✨</p>
        </div>

        <form method="POST" id="login-form" action="{{ route('affiliate.login') }}" class="space-y-5">
            @csrf
            <div class="" id="login-inputs">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mobile</label>
                    <input type="tel" name="mobile" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" class="mr-2"> Remember me
                    </label>
                    <a href="{{url('affiliate/forget-password')}}" class="text-sm text-[#f74b81] hover:underline">Forgot password?</a>
                </div>
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
            <button type="submit"
                class="w-full bg-[#f74b81] text-white py-2 rounded-lg font-semibold hover:bg-[#e93c73] transition">Login</button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Don’t have an account?
            <a href="{{ route('affiliate.registeration') }}" class="text-[#f74b81] hover:underline font-medium">Sign up
                here</a>
        </p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let ForOtp = false;
        $('#login-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission                       
            if (ForOtp) {
                // If OTP is already shown, do not submit the form again
                let entered_otp = $('input[name="otp[]"]').map(function() {
                    return $(this).val();
                }).get().join('');
                window.verifyOtp(
                    parseInt(entered_otp),
                    (data) => {
                        $.ajax({
                            url: $(this).attr('action'), // Use the form's action attribute
                            type: 'POST',
                            data: data, // Serialize the form data
                            success: function(response) {
                                if (response.status) {
                                    window.location.href = response.url;
                                } else {
                                    alert(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }, // optional;
                    (error) => alert('Something went wrong'), // optional
                );
                return;
            }
            $.ajax({
                url: $(this).attr('action') + '?for=otp', // Use the form's action attribute
                type: 'POST',
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    window.sendOtp(
                        response.user.phone,
                        function(data) {
                            $('#login-inputs').hide();
                            $('#otp').show();
                            alert('OTP sent successfully.');
                            $('#submit-btn').text('Sign In');
                        },
                        (error) => alert('Error occurred')
                    );
                    ForOtp = true;
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $(document).ready(function() {
            const inputs = $('.otp-input');
            // Handle typing
            inputs.on('input', function() {
                const current = $(this);
                const value = current.val();

                if (value.length === 1) {
                    const next = inputs.eq(inputs.index(this) + 1);
                    next.focus();
                }
            });

            // Handle backspace
            inputs.on('keydown', function(e) {
                if (e.key === 'Backspace' && !$(this).val()) {
                    const prev = inputs.eq(inputs.index(this) - 1);
                    prev.focus();
                }
            });

            // Handle paste (only on the first box)
            inputs.first().on('paste', function(e) {
                e.preventDefault();
                const paste = (e.originalEvent || e).clipboardData.getData('text');
                const chars = paste.split('');
                inputs.each(function(i) {
                    $(this).val(chars[i] || '');
                });
                // Focus next empty input
                const firstEmpty = inputs.filter(function() {
                    return !$(this).val();
                }).first();
                if (firstEmpty.length) firstEmpty.focus();
            });
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
