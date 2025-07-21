<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    keyframes: {
                        'vertical-scroll': {
                            '0%': {
                                transform: 'translateY(0%)'
                            },
                            '100%': {
                                transform: 'translateY(-100%)'
                            },
                        },
                    },
                    animation: {
                        'vertical-scroll': 'vertical-scroll 8s linear infinite',
                    },
                    colors: {
                        primary: {
                            400: '#ff9800',
                            500: '#f57c00',
                            600: '#ef6c00',
                        },
                        dark: {
                            800: '#0B1D51',
                            900: '#121212',
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <style>
        html {
            overflow-y: scroll;
        }

        body {
            font-family: "Outfit", sans-serif;
            overflow: visible;
        }

        * {
            box-sizing: border-box;
        }

        .dropdown-menu {
            transition: all 0.3s ease;
            transform-origin: top;
        }

        #toast-container>.toast-success {
            background-color: #06923E !important;

            color: #fff !important;
            opacity: 1 !important;
        }

        #toast-container>.toast-error {
            background-color: #DC2525 !important;

            color: #fff !important;
            opacity: 1 !important;
        }

        .dark .dropdown-menu {
            background-color: #1e293b;
            color: #f1f5f9;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>

    <title>Shopping Mart</title>
    @stack('styles')
</head>

<body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-all duration-300">

    @include('layout.header')

    <main>
        @yield('content')
    </main>

    @include('layout.location')
    @include('layout.cart')
    @include('userauth.login')
    @include('userauth.register')
    @include('layout.footer')

    @stack('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 3000,
            extendedTimeOut: 1000,
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
    </script>

    @if (session('success'))
        <script>
            toastr.success("{!! session('success') !!}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{!! session('error') !!}");
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Dark Mode
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                $('html').addClass('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                $('html').removeClass('dark');
                localStorage.setItem('theme', 'light');
            }

            $('#toggleDark, #demoToggle').on('click', function() {
                $('html').toggleClass('dark');
                localStorage.setItem('theme', $('html').hasClass('dark') ? 'dark' : 'light');
            });

            // Modals: Location
            $('#locationToggle').on('click', () => $('#locationOverlay').removeClass('hidden'));
            $('#closeLocationModal').on('click', () => $('#locationOverlay').addClass('hidden'));
            $('#citySelect').on('change', function() {
                $('#selectedLocationText').text($(this).val());
                $('#locationOverlay').addClass('hidden');
            });
            $('#locationOverlay').on('click', function(e) {
                if (e.target === this) $(this).addClass('hidden');
            });

            // Modals: Cart
            $('#cartToggle').on('click', () => $('#cartOverlay').removeClass('hidden'));
            $('#closeCartModal').on('click', () => $('#cartOverlay').addClass('hidden'));
            $('#cartOverlay').on('click', function(e) {
                if (e.target === this) $(this).addClass('hidden');
            });

            // Modals: Login
            $('#loginToggle').on('click', () => $('#loginOverlay').removeClass('hidden'));

            $('#closeLoginModal').on('click', () => {
                $('#loginOverlay').addClass('hidden');
                $('#loginOverlay form')[0].reset();
            });

            $('#loginOverlay').on('click', function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                    $('#loginOverlay form')[0].reset();
                }
            });

            // Modals: Register
            $('#registerToggle').on('click', () => $('#registerOverlay').removeClass('hidden'));

            $('#closeRegisterModal').on('click', () => {
                $('#registerOverlay').addClass('hidden');
                $('#registerOverlay form')[0].reset(); // Reset register form
            });

            $('#registerOverlay').on('click', function(e) {
                if (e.target.id === 'registerOverlay') {
                    $(this).addClass('hidden');
                    $('#registerOverlay form')[0].reset(); // Reset register form
                }
            });

            // Switch Login <=> Register
            $('.open-register').on('click', function() {
                $('#loginOverlay').addClass('hidden');
                $('#registerOverlay').removeClass('hidden');

                // Reset both forms
                $('#loginOverlay form')[0].reset();
                $('#registerOverlay form')[0].reset();
            });


            // Product Slider
            let $slides = $('#productSlider .slide');
            let $dots = $('#productSlider .dot');
            let currentIndex = 0;

            function showSlide(index) {
                $slides.css({
                    opacity: '0',
                    'z-index': '1',
                    'pointer-events': 'none'
                });
                $slides.eq(index).css({
                    opacity: '1',
                    'z-index': '10',
                    'pointer-events': 'auto'
                });
                $dots.removeClass('bg-orange-400').addClass('bg-gray-400');
                $dots.eq(index).addClass('bg-orange-400');
                currentIndex = index;
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % $slides.length;
                showSlide(currentIndex);
            }

            $dots.on('click', function() {
                showSlide($(this).index());
            });

            showSlide(currentIndex);
            setInterval(nextSlide, 3000);

            // Banner Slider
            let $bannerSlides = $('.banner-slide');
            let $bannerDots = $('.banner-dot');
            let currentBanner = 0;
            let bannerInterval;

            function showBannerSlide(index) {
                $bannerSlides.removeClass('opacity-100').addClass('opacity-0');
                $bannerSlides.eq(index).removeClass('opacity-0').addClass('opacity-100');
                $bannerDots.removeClass('bg-orange-500').addClass('bg-white');
                $bannerDots.eq(index).removeClass('bg-white').addClass('bg-orange-500');
                currentBanner = index;
            }

            function nextBannerSlide() {
                currentBanner = (currentBanner + 1) % $bannerSlides.length;
                showBannerSlide(currentBanner);
            }

            function startBannerSlide() {
                bannerInterval = setInterval(nextBannerSlide, 5000);
            }

            function stopBannerSlide() {
                clearInterval(bannerInterval);
            }

            $('.banner-prev').on('click', function() {
                currentBanner = (currentBanner - 1 + $bannerSlides.length) % $bannerSlides.length;
                showBannerSlide(currentBanner);
            });

            $('.banner-next').on('click', nextBannerSlide);
            $bannerDots.on('click', function() {
                showBannerSlide($(this).index());
            });

            $('.banner-container').on('mouseenter', stopBannerSlide).on('mouseleave', startBannerSlide);
            startBannerSlide();
            $(document).on('click', '.wishlist-toggle', function () {
            const button = $(this);
            const productId = button.data('product-id');
            const icon = button.find('i');

            console.log('Clicked heart for product ID:', productId); // ✅ Debug line

            $.ajax({
                url: "{{ route('wishlist.toggle') }}",
                method: "POST",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.status === 'added') {
                        icon.removeClass('text-gray-400').addClass('text-red-500');
                        toastr.success('Added to wishlist!');
                    } else if (response.status === 'removed') {
                        icon.removeClass('text-red-500').addClass('text-gray-400');
                        button.closest('.border').fadeOut(300, function () {
                            $(this).remove();
                            if ($('.wishlist-toggle').length === 0) {
                                $('.wishlist-container').html('<p class="text-gray-500">No products in your wishlist.</p>');
                            }
                        });
                        toastr.success('Removed from wishlist!');
                    }
                },
                error: function () {
                    toastr.error('Something went wrong. Please try again.');
                }
            });
        });
  
  
        $('.addToCartBtn').on('click', function (e) {
    e.preventDefault();

    var product_id = $(this).data('id');

    $.ajax({
        url: "{{ route('cart.add') }}",
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: product_id,
            quantity: 1,
        },
        success: function (response) {
            if (response.status === 'success') {
                toastr.success("Product added to Cart!");
                loadCartSection();
            } else {
                toastr.error("Something went wrong!");
            }
        },
        error: function () {
            toastr.error("Server error!");
        }
    });
});

function loadCartSection() {
    $('#cartOverlayContent').load("{{ route('cart.refresh') }}");
}


    });
</script>

</body>
</html>
