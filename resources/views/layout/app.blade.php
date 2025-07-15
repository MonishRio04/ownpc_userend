<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
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

    <!-- jQuery + SweetAlert2 + FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Custom CSS -->
    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scroll 20s linear infinite;
            display: flex;
        }

        @keyframes scroll-up {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
            }
        }

        .animate-scroll {
            animation: scroll-up 5s linear infinite;
        }

        body,
        html {
            font-family: "Lexend", sans-serif;
            overflow-y: scroll !important;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body.swal2-shown {
            padding-right: 0 !important;
            overflow-y: scroll !important;
        }

        .dropdown-menu {
            transition: all 0.3s ease;
            transform-origin: top;
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
    @include('layout.login')
    @include('layout.register')
    @include('layout.footer')

    @stack('scripts')

  <script>
    $(document).ready(function () {
       
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            $('html').addClass('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            $('html').removeClass('dark');
            localStorage.setItem('theme', 'light');
        }

        $('#toggleDark, #demoToggle').on('click', function () {
            $('html').toggleClass('dark');
            const mode = $('html').hasClass('dark') ? 'dark' : 'light';
            localStorage.setItem('theme', mode);
        });

        //  Location Modal
        $('#locationToggle').on('click', function () {
            $('#locationOverlay').removeClass('hidden');
        });
        $('#closeLocationModal').on('click', function () {
            $('#locationOverlay').addClass('hidden');
        });
        $('#citySelect').on('change', function () {
            $('#selectedLocationText').text($(this).val());
            $('#locationOverlay').addClass('hidden');
        });
        $('#locationOverlay').on('click', function (e) {
            if (e.target === this) {
                $(this).addClass('hidden');
            }
        });

        // Cart Modal
        $('#cartToggle').on('click', function () {
            $('#cartOverlay').removeClass('hidden');
        });
        $('#closeCartModal').on('click', function () {
            $('#cartOverlay').addClass('hidden');
        });
        $('#cartOverlay').on('click', function (e) {
            if (e.target === this) {
                $(this).addClass('hidden');
            }
        });

        // Login Modal
        $('#loginToggle').on('click', function () {
            $('#loginOverlay').removeClass('hidden');
        });
        $('#closeLoginModal').on('click', function () {
            $('#loginOverlay').addClass('hidden');
        });
        $('#loginOverlay').on('click', function (e) {
            if (e.target === this) {
                $(this).addClass('hidden');
            }
        });

        //  Register Modal
        $('#registerToggle').on('click', function () {
            $('#registerOverlay').removeClass('hidden');
        });
        $('#closeRegisterModal').on('click', function () {
            $('#registerOverlay').addClass('hidden');
        });
        $('#registerOverlay').on('click', function (e) {
            if (e.target.id === 'registerOverlay') {
                $(this).addClass('hidden');
            }
        });

        //  Switch Login ↔ Register
        $('.open-register').on('click', function () {
            $('#registerOverlay').removeClass('hidden');
            $('#loginOverlay').addClass('hidden');
        });

        // Product Slider
        let $slides = $('#productSlider .slide');
        let $dots = $('#productSlider .dot');
        let currentIndex = 0;

        function showSlide(index) {
            $slides.each(function (i) {
                $(this).css({
                    opacity: i === index ? '1' : '0',
                    'z-index': i === index ? '10' : '1',
                    'pointer-events': i === index ? 'auto' : 'none'
                });
            });

            $dots.removeClass('bg-orange-400').addClass('bg-gray-400');
            $dots.eq(index).addClass('bg-orange-400');

            currentIndex = index;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % $slides.length;
            showSlide(currentIndex);
        }

        $dots.each(function (i) {
            $(this).on('click', function () {
                showSlide(i);
            });
        });

        showSlide(currentIndex);
        setInterval(nextSlide, 3000);

        //  Banner Slider
        let $bannerSlides = $('.banner-slide');
        let $bannerDots = $('.banner-dot');
        let currentBanner = 0;
        let bannerInterval;

        function showBannerSlide(index) {
            $bannerSlides.each(function (i) {
                $(this).toggleClass('opacity-100', i === index);
                $(this).toggleClass('opacity-0', i !== index);
            });
            $bannerDots.each(function (i) {
                $(this).toggleClass('bg-orange-500', i === index);
                $(this).toggleClass('bg-white', i !== index);
            });
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

        $('.banner-prev').on('click', function () {
            currentBanner = (currentBanner - 1 + $bannerSlides.length) % $bannerSlides.length;
            showBannerSlide(currentBanner);
        });

        $('.banner-next').on('click', function () {
            nextBannerSlide();
        });

        $bannerDots.each(function (i) {
            $(this).on('click', function () {
                showBannerSlide(i);
            });
        });

        $('.banner-container').on('mouseenter', stopBannerSlide).on('mouseleave', startBannerSlide);

        startBannerSlide();
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    </script>
@endif


</body>

</html>
