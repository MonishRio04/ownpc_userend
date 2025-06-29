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
                    <a href="{{ url('/') }}"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Register
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
                                    alt="Register Image" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label for="name">Full Name *</label>
                                                <input type="text" name="name" id="name" required
                                                    class="form-control" placeholder="Enter your full name"
                                                    value="{{ old('name') }}">
                                            </div>

                                            <input type="hidden" name="phone" value="{{ session('phone') }}" />

                                            <div class="form-group mb-3">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Enter your email (optional)"
                                                    value="{{ old('email') }}">
                                            </div>

                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="terms"
                                                    id="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    I agree to the <a href="#" class="text-primary">Terms and
                                                        Conditions</a> of Pink Cheeks
                                                </label>
                                            </div>

                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input" name="privacy"
                                                    id="privacy" required>
                                                <label class="form-check-label" for="privacy">
                                                    I agree to receive offers and promotions
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Register
                                                </button>
                                            </div>
                                        </form>


                                        {{-- Optional: Add Toastr or Validation Message display here --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger mt-3">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

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

        // Function to call OTP method
        function sendOtp() {
            var mobile = $('#mobile').val();
            var passwd = $('#password').val();
            $.ajax({
                url: '{{ url('/sendotp') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'mobile': mobile,
                    'password': passwd
                },
                success: function(response) {
                    if (response.status == 'success') {
                        debugger;
                        alert(response.message);
                        $('#loginForm').hide();
                        $('#otpForm').show();
                    } else {
                        alert(response.message);
                        $('#otpForm').show();
                    }
                }
            });
        }
    </script>
</body>

</html>
