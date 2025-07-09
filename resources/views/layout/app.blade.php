<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
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
        @keyframes scroll-up {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
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

            $('#toggleDark, #demoToggle').click(function () {
                $('html').toggleClass('dark');
                const mode = $('html').hasClass('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', mode);
            });
        });
      


  document.addEventListener('DOMContentLoaded', function () {
    const locationToggle = document.getElementById('locationToggle');
    const locationOverlay = document.getElementById('locationOverlay');
    const closeLocationModal = document.getElementById('closeLocationModal');
    const citySelect = document.getElementById('citySelect');
    const selectedLocationText = document.getElementById('selectedLocationText');

   
    locationToggle?.addEventListener('click', function () {
      locationOverlay?.classList.remove('hidden');
    });

  
    closeLocationModal?.addEventListener('click', function () {
      locationOverlay?.classList.add('hidden');
    });

   
    citySelect?.addEventListener('change', function () {
      const city = citySelect.value;
      if (city) {
        selectedLocationText.textContent = city;
        locationOverlay?.classList.add('hidden');
      }
    });

 
    locationOverlay?.addEventListener('click', function (e) {
      if (e.target === locationOverlay) {
        locationOverlay?.classList.add('hidden');
      }
    });
  });
 
  $(document).ready(function () {
    $('#cartToggle').click(function () {
      $('#cartOverlay').removeClass('hidden');
    });

    $('#closeCartModal').click(function () {
      $('#cartOverlay').addClass('hidden');
    });

    $('#cartOverlay').click(function (e) {
      if (e.target === this) {
        $(this).addClass('hidden');
      }
    });
  });
 
  $(document).ready(function () {
    const $loginToggle = $('#loginToggle');
    const $loginOverlay = $('#loginOverlay');
    const $closeLoginModal = $('#closeLoginModal');

   
    $loginToggle.on('click', function () {
      $loginOverlay.removeClass('hidden');
    });


    $closeLoginModal.on('click', function () {
      $loginOverlay.addClass('hidden');
    });

   
    $loginOverlay.on('click', function (e) {
      if (e.target === this) {
        $loginOverlay.addClass('hidden');
      }
    });
  });

  $(document).ready(function () {
    $('#registerToggle').on('click', function () {
      $('#registerOverlay').removeClass('hidden');
    });

    $('#closeRegisterModal').on('click', function () {
      $('#registerOverlay').addClass('hidden');
    });

    $('#registerOverlay').on('click', function (e) {
      if (e.target.id === 'registerOverlay') {
        $('#registerOverlay').addClass('hidden');
      }
    });
  });
  $(document).ready(function () {
  $('.open-register').on('click', function () {
    $('#registerOverlay').removeClass('hidden');
    $('#loginOverlay').addClass('hidden');
  });

  $('#closeRegisterModal').on('click', function () {
    $('#registerOverlay').addClass('hidden');
  });

  $('#registerOverlay').on('click', function (e) {
    if (e.target.id === 'registerOverlay') {
      $('#registerOverlay').addClass('hidden');
    }
  });
});

</script>
</body>
</html>
