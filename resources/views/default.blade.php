<!DOCTYPE html>
<html lang="en">
<head><script src="https://static.readdy.ai/static/e.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom PC Builder</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#3B82F6',secondary:'#10B981'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">


    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-section {
            background-image: url('https://img.freepik.com/premium-photo/new-modern-powerful-gaming-computer-with-beautiful-rgb-lights-different-color-glass-case-table-dark_63762-7256.jpg?uid=R201714687&ga=GA1.1.1841090616.1748199341&semt=ais_items_boosted&w=740');
            background-size: cover;
            background-position: center;
        }
        .component-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .custom-range {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }
        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3B82F6;
            cursor: pointer;
        }
        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3B82F6;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    
        @include('layouts.header')
   

    @yield('content')

    
        @include('layouts.footer')


    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 bg-primary text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center">
            <i class="ri-arrow-up-line"></i>
        </div>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Back to Top Button
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        // FAQ Toggle
        function toggleFAQ(id) {
            const answer = document.getElementById(`faq-answer-${id}`);
            const arrow = document.getElementById(`faq-arrow-${id}`);
            
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                arrow.classList.remove('ri-arrow-down-s-line');
                arrow.classList.add('ri-arrow-up-s-line');
            } else {
                answer.classList.add('hidden');
                arrow.classList.remove('ri-arrow-up-s-line');
                arrow.classList.add('ri-arrow-down-s-line');
            }
        }
    </script>
</body>
</html>
