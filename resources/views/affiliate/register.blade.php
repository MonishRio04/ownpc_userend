<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Affiliate Registration – Pink Cheeks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php $setting = App\Models\SiteSetting::find(1); ?>
</head>

<body class="bg-[#fff0f5] flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full">
        <div class="text-center mb-6">
            <img src="{{ asset($setting->logo) }}" alt="Pink Cheeks Logo" class="mx-auto h-20 rounded-full mb-2">
            <h1 class="text-2xl font-bold text-[#f74b81]">Join the Affiliate Program</h1>
            <p class="text-sm text-gray-500">Let’s grow together 🌸</p>
        </div>

        <form method="POST" action="{{ route('affiliate.registeration') }}" class="space-y-5">
            @csrf

            <div>
                <label class="label-text block text-sm font-medium text-gray-700 mb-1">Mobile</label>
                <div class="flex mobile-input">
                    <select name="country_code" required id="country_code"
                        class="border border-gray-300 rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe] bg-white">
                        <option value="1">🇺🇸 1</option>
                        <option value="44">🇬🇧 44</option>
                        <option value="91" selected>🇮🇳 91</option>
                        <option value="61">🇦🇺 61</option>
                        <option value="81">🇯🇵 81</option>
                        <!-- Add more country codes as needed -->
                    </select>
                    <input type="tel" name="mobile" required placeholder="1234567890"
                        class="w-full border border-gray-300 rounded-r-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
                </div>
            </div>
            <div class="" id="captcharender"></div>

            <div class="flex space-x-2 justify-center otp" style="display: none">
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
            <div class="register-input" style="display: none">
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
            </div>
            <div class="register-input" style="display: none">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
            </div>
            <div class="register-input" style="display: none">
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#98dffe]">
            </div>
            <div class="mb-2 flex items-start register-input" style="display: none">
                <input id="terms" name="terms" type="checkbox" required
                    class="mt-1 h-4 w-4 text-[#98dffe] border-gray-300 rounded focus:ring-[#98dffe]">
                <label for="terms" class="ml-2 text-sm text-gray-700">
                    I agree to the <a href="#" class="text-[#98dffe] hover:underline">Terms and Conditions</a> of
                    Pink Cheeks
                </label>
            </div>

            <div class="mb-4 flex items-start register-input" style="display: none">
                <input id="privacy" name="privacy" type="checkbox" required
                    class="mt-1 h-4 w-4 text-[#98dffe] border-gray-300 rounded focus:ring-[#98dffe]">
                <label for="privacy" class="ml-2 text-sm text-gray-700">
                    I agree to receive offers and promotions
                </label>
            </div>

            <button type="button"
                class="w-full bg-[#f74b81] submit-btn text-white py-2 rounded-lg font-semibold hover:bg-[#e93c73] transition">Next
            </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('affiliate.login') }}" class="text-[#f74b81] hover:underline font-medium">Login here</a>
        </p>
    </div>
    <script>
        $('.submit-btn').on('click', function() {
            var mobile = $('input[name="mobile"]').val();
            if (mobile.length < 10) {
                alert('Please enter a valid mobile number.');
                return;
            }
            if(!window.isCaptchaVerified) {
                alert('Please verify the captcha.');
                return;
            }
            window.sendOtp(
                $('#country_code').val() + mobile,
                function(data) {
                    $('.mobile-input').hide();
                    $('.otp').show();
                    $('.label-text').text('Enter OTP');
                    $('.submit-btn').removeClass('submit-btn').addClass('verify-btn').text('Verify');
                    alert('OTP sent successfully.');
                },
                (error) => alert('Error occurred')
            );
        });
        $('.verify-btn').on('click', function() {
            let entered_otp = $('input[name="otp[]"]').map(function() {
                return $(this).val();
            }).get().join('');
            window.verifyOtp(
                parseInt(entered_otp),
                (data) => {
                    $('.otp').hide();
                    $('.register-input').show();
                    $('.label-text').text('Register');
                    $('.verify-btn').attr('type', 'submit');
                    $('.verify-btn').removeClass('verify-btn').addClass('submit-btn').text('Register');
                    alert('OTP verified successfully.');
                },
                (error) => alert('Error occurred')
            );
        });
        $(document).ready(function() {
            const inputs = $('input[name="otp[]"]');
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
            captchaRenderId: 'captcharender',
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
