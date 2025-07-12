<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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

        body {
            font-family: "Lexend", sans-serif;

        }

        .animate-scroll {
            animation: scroll-up 5s linear infinite;
        }

        html {
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        .dropdown-menu {
            transition: all 0.3s ease;
            transform-origin: top;
        }

        .dark .dropdown-menu {
            background-color: #1e293b;
            color: #f1f5f9;
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
        $(document).ready(function() {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                $('html').addClass('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                $('html').removeClass('dark');
                localStorage.setItem('theme', 'light');
            }

            $('#toggleDark, #demoToggle').click(function() {
                $('html').toggleClass('dark');
                const mode = $('html').hasClass('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', mode);
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            const locationToggle = document.getElementById('locationToggle');
            const locationOverlay = document.getElementById('locationOverlay');
            const closeLocationModal = document.getElementById('closeLocationModal');
            const citySelect = document.getElementById('citySelect');
            const selectedLocationText = document.getElementById('selectedLocationText');


            locationToggle?.addEventListener('click', function() {
                locationOverlay?.classList.remove('hidden');
            });


            closeLocationModal?.addEventListener('click', function() {
                locationOverlay?.classList.add('hidden');
            });


            citySelect?.addEventListener('change', function() {
                const city = citySelect.value;
                if (city) {
                    selectedLocationText.textContent = city;
                    locationOverlay?.classList.add('hidden');
                }
            });


            locationOverlay?.addEventListener('click', function(e) {
                if (e.target === locationOverlay) {
                    locationOverlay?.classList.add('hidden');
                }
            });
        });

        $(document).ready(function() {
            $('#cartToggle').click(function() {
                $('#cartOverlay').removeClass('hidden');
            });

            $('#closeCartModal').click(function() {
                $('#cartOverlay').addClass('hidden');
            });

            $('#cartOverlay').click(function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                }
            });
        });

        $(document).ready(function() {
            const $loginToggle = $('#loginToggle');
            const $loginOverlay = $('#loginOverlay');
            const $closeLoginModal = $('#closeLoginModal');


            $loginToggle.on('click', function() {
                $loginOverlay.removeClass('hidden');
            });


            $closeLoginModal.on('click', function() {
                $loginOverlay.addClass('hidden');
            });


            $loginOverlay.on('click', function(e) {
                if (e.target === this) {
                    $loginOverlay.addClass('hidden');
                }
            });
        });

        $(document).ready(function() {
            $('#registerToggle').on('click', function() {
                $('#registerOverlay').removeClass('hidden');
            });

            $('#closeRegisterModal').on('click', function() {
                $('#registerOverlay').addClass('hidden');
            });

            $('#registerOverlay').on('click', function(e) {
                if (e.target.id === 'registerOverlay') {
                    $('#registerOverlay').addClass('hidden');
                }
            });
        });
        $(document).ready(function() {
            $('.open-register').on('click', function() {
                $('#registerOverlay').removeClass('hidden');
                $('#loginOverlay').addClass('hidden');
            });

            $('#closeRegisterModal').on('click', function() {
                $('#registerOverlay').addClass('hidden');
            });

            $('#registerOverlay').on('click', function(e) {
                if (e.target.id === 'registerOverlay') {
                    $('#registerOverlay').addClass('hidden');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            let slides = document.querySelectorAll('.banner-slide');
            let dots = document.querySelectorAll('.banner-dot');
            let currentSlide = 0;
            let interval;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('opacity-100', i === index);
                    slide.classList.toggle('opacity-0', i !== index);
                });

                dots.forEach((dot, i) => {
                    dot.classList.toggle('bg-orange-500', i === index);
                    dot.classList.toggle('bg-white', i !== index);
                });

                currentSlide = index;
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function startAutoSlide() {
                interval = setInterval(nextSlide, 5000);
            }

            function stopAutoSlide() {
                clearInterval(interval);
            }

            document.querySelector('.banner-prev')?.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            });

            document.querySelector('.banner-next')?.addEventListener('click', () => {
                nextSlide();
            });

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.dataset.index));
                });
            });

            startAutoSlide();

            const bannerContainer = document.querySelector('.banner-container');
            bannerContainer.addEventListener('mouseenter', stopAutoSlide);
            bannerContainer.addEventListener('mouseleave', startAutoSlide);
        });

        $(document).ready(function() {

            $('.category-link').on('click', function(e) {
                let hasSub = $(this).data('has-sub');
                let url = $(this).data('url');

                if (hasSub === 1 || hasSub === '1') {
                    e.preventDefault();

                    let $dropdown = $(this).siblings('.subcategory-dropdown');
                    $('.subcategory-dropdown').not($dropdown).slideUp();
                    $dropdown.slideToggle();
                } else {

                    window.location.href = url;
                }
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.category-item').length) {
                    $('.subcategory-dropdown').slideUp();
                }
            });
        });
       
    $(document).ready(function () {
        let $slides = $('#productSlider .slide');
        let $dots = $('#productSlider .dot');
        let currentIndex = 0;
        let interval;

        function showSlide(index) {
            $slides.each(function (i) {
                $(this).css({
                    'opacity': i === index ? '1' : '0',
                    'z-index': i === index ? '10' : '1',
                    'pointer-events': i === index ? 'auto' : 'none'
                });
            });

            $dots.each(function (i) {
                $(this).removeClass('bg-orange-400').addClass('bg-gray-400');
                if (i === index) {
                    $(this).addClass('bg-orange-400');
                }
            });

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
        interval = setInterval(nextSlide, 3000); // Auto-slide every 3 seconds
    });


    </script>



</body>

</html>
