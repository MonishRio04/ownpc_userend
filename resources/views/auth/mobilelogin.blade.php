<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pink Cheeks</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    @include('frontend.body.header')

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/login-1.png') }}"
                                    alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Login & Signup </h1>
                                            {{-- <p class="mb-30">Don't have an account? <a
                                                    href="{{ url('register') }}">Create here</a></p> --}}
                                        </div>
                                        <form id="loginForm" method="POST" action="{{ route('sendotp') }}">
                                            @csrf
                                            <div class="form-group" style="display: flex; gap: 10px;">
                                                <select id="country_code" class="form-select" name="country_code"
                                                    required style="width: 30%;border: 1px solid #ececec;">
                                                    <option value="1">🇺🇸 1</option>
                                                    <option value="91" selected>🇮🇳 91</option>
                                                    <option value="44">🇬🇧 44</option>
                                                    <option value="61">🇦🇺 61</option>
                                                    <option value="971">🇦🇪 971</option>
                                                    <!-- Add more as needed -->
                                                </select>
                                                <input type="text" maxlength="10" id="mobile" name="mobile"
                                                    required placeholder="Mobile *" style="flex: 1;" />
                                            </div>
                                            <div id="captcharender"></div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-heading btn-block hover-up"
                                                    name="login" onclick="sendOTP()">Get OTP</button>
                                            </div>
                                        </form>
                                        <form id="otpForm" action="{{ url('verifyotp') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" id="entered_otp" name="entered_otp" required
                                                    placeholder="Enter OTP *" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up">Verify
                                                    OTP</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('frontend.body.footer')
    <!-- Preloader Start -->
    <!--
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif

        // Wait for the DOM to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            $('#otpForm').hide();
        });
    </script>
    <script type="text/javascript">
        // Function to call OTP method
        var mobile = '';

        function sendOTP() {
            mobile = $('#mobile').val();
            var isCaptchaVerified = window.isCaptchaVerified();
            if (!isCaptchaVerified) {
                alert('Please verify the captcha first.');
                return;
            }
            if (mobile.length < 10) {
                alert('Please enter a valid mobile number.');
                return;
            }
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
            var entered_otp = $('#entered_otp').val();
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
                    $.ajax({
                        url: '{{ url('/verifyotp') }}?mobile=' + mobile,
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            if (response.status) {
                                window.location.href = response.url;
                            } else {
                                console.log(response.message);
                            }
                        }
                    });
                }, // optional
                (error) => alert('Something went wrong'), // optional
            );

        });
        var configuration = {
            widgetId: "{{ config('msg91.widgetId') }}",
            tokenAuth: "{{ config('msg91.token') }}",
            exposeMethods: true,
            captchaRenderId: 'captcharender',
            success: (data) => {
                debugger;
            },
            failure: (error) => {
                console.log('failure reason', error);
            },

        };
    </script>
    <script type="text/javascript" onload="initSendOTP(configuration)" src="https://verify.msg91.com/otp-provider.js">
    </script>
</body>

</html>
