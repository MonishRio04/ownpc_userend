<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminbackend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminbackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminbackend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminbackend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminbackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="text-center">
                            <img src="{{ asset('adminbackend/assets/images/logo.png') }}" width="240"
                                alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Admin Login</h3>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" id="login-form" method="POST"
                                            action="{{ route('mobilelogin') }}">
                                            @csrf
                                            <div id="login-inputs" class="row">
                                                <div class="col-12 my-2">
                                                    <label for="inputEmailAddress" class="form-label">Mobile</label>
                                                    <input type="tel" name="mobile" class="form-control"
                                                        id="email" placeholder="Mobile Number" required>
                                                </div>
                                                <div class="col-12 my-2">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" name="password"
                                                            class="form-control border-end-0" id="password"
                                                            placeholder="Enter Password"> <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class='bx bx-hide'></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 my-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end my-2"> <a
                                                        href="authentication-forgot-password.html">Forgot Password ?</a>
                                                </div>
                                            </div>
                                            <div style="display: none" id="otp">
                                                <label class="form-label mb-1">Enter OTP</label>
                                                <p class="text-muted mb-2 small">We have sent a 4-digit OTP to your
                                                    registered mobile number.</p>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                    <input type="text" maxlength="1" name="otp[]"
                                                        class="form-control text-center otp-input"
                                                        style="width: 3rem; height: 3rem;" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn" id="submit-btn"
                                                        style="background: #93ddfe"><i
                                                            class="bx bxs-lock-open"></i>Get Otp</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('adminbackend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script>
        let ForOtp = false;
        $('#login-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission                       
            let data = $(this).serialize(); // Serialize the form data
            if (ForOtp) {
                // If OTP is already shown, do not submit the form again
                // For example
                let entered_otp = $('input[name="otp[]"]').map(function() {
                    return $(this).val();
                }).get().join('');
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
                data: data, // Serialize the form data
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
    <!--app JS-->
    <script src="{{ asset('adminbackend/assets/js/app.js') }}"></script>
    <script type="text/javascript" onload="initSendOTP(configuration)" src="https://verify.msg91.com/otp-provider.js">
    </script>
</body>

</html>
