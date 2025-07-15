@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
        style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-4">
            <p class="text-xl">
                <span class="text-4xl font-bold">Product </span> single page
            </p>

            <p>
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">SINGLE PRODUCT 2</span>
            </p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">

                <div class="relative overflow-hidden rounded-xl h-96 mb-4">
                    <div class="relative h-full">
                        <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-500"
                            id="slide-1">
                            <img src="{{ asset('images/pc2.jpg') }}" alt="Front View"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-500"
                            id="slide-2">
                            <img src="{{ asset('images/keyboard.webp') }}" alt="Interior View"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                        <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-500"
                            id="slide-3">
                            <img src="{{ asset('images/monitor.avif') }}" alt="Side View"
                                class="w-full h-full object-cover rounded-xl">
                        </div>
                    </div>

                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-70"></button>
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-70"></button>
                        <button class="carousel-indicator w-3 h-3 rounded-full bg-white bg-opacity-70"></button>
                    </div>

                    <button
                        class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 bg-opacity-70 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-chevron-left text-gray-800 dark:text-white"></i>
                    </button>
                    <button
                        class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 bg-opacity-70 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-chevron-right text-gray-800 dark:text-white"></i>
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-2 mt-4">
                    <img src="{{ asset('images/pc2.jpg') }}" alt="Thumbnail 1"
                        class="w-full h-24 object-cover rounded-xl cursor-pointer">
                    <img src="{{ asset('images/keyboard.webp') }}" alt="Thumbnail 2"
                        class="w-full h-24 object-cover rounded-xl cursor-pointer">
                    <img src="{{ asset('images/monitor.avif') }}" alt="Thumbnail 3"
                        class="w-full h-24 object-cover rounded-xl cursor-pointer">
                </div>
            </div>

            <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Intel i5 / AMD Ryzen 5</h1>

                <div class="flex items-center mb-4 space-x-3">
                    <span class="text-3xl font-bold text-black dark:text-white">$400.00</span>
                    <span class="text-xl line-through text-gray-500 dark:text-gray-400 ml-4">$500.00</span>
                    <span class="text-xl font-medium text-black dark:text-white">Free delivery</span>
                </div>

                <div class="space-y-1 text-gray-700 dark:text-gray-300">
                    <p>Cash on Delivery Eligible.</p>
                    <p>Shipping Speed to Delivery.</p>
                    <p>EMI starts at $100</p>
                    <p>Special Price: Get extra $100 off</p>
                </div>

                <div class="py-2">
                    <p class="text-xl font-bold dark:text-white">
                        <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                        Free standard installation within 48 hours of delivery
                    </p>
                    <ul class="list-disc pl-6 space-y-1 text-gray-700 dark:text-gray-300">
                        <li>Refrigerator, User Manual, Warranty Card</li>
                        <li>Double Door, Top Freezer</li>
                        <li>Capacity: 245 L</li>
                        <li>Net Height: 1500 mm</li>
                        <li>Net Depth: 670 mm</li>
                        <li>Net Width: 570 mm</li>
                        <li>Weight: 49 kg</li>
                        <li>Warranty Service Type: Technician Visit</li>
                        <li>1 Year on Product and 10 Years on Compressor From Whirlpool</li>
                    </ul>
                </div>

                <div class="py-2">
                    <p class="text-xl font-bold dark:text-white">
                        <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                        Net banking & Credit / Debit / ATM card
                    </p>
                </div>

                <button
                    class="w-54 bg-orange-400 hover:bg-[#0B1D51] text-white font-bold py-3 px-3 rounded-lg transition duration-300 mb-4">
                    ADD TO CART
                </button>
            </div>
        </div>

        <div class="relative w-full h-[500px] p-12 bg-fixed bg-center bg-cover"
            style="background-image: url('{{ asset('images/logo.jpg') }}');">

            <div class="flex h-full p-18">
                <div class="w-1/2 flex justify-center items-center">
                    <img src="{{ asset('images/pc.png') }}" alt="PC 1" class="w-[90%] h-auto rounded shadow-lg" />
                </div>
                <div class="w-1/2 flex justify-center items-center">
                    <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2" class="w-[90%] h-auto rounded shadow-lg" />
                </div>
            </div>
        </div>

        <div class="px-16">
            <p class="font-bold text-black dark:text-white text-2xl p-2 pt-12">Electronics:</p>
            <p class="p-2 text-black dark:text-gray-300">
                If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
                make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
                laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
                video and more.
            </p>

            <div class="flex justify-between gap-6 text-center mt-6 pb-12">
                <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                    <h1 class="font-bold text-2xl p-2">
                        <i class="fa-solid fa-cart-shopping text-3xl p-2 font-bold text-orange-400"></i>Free Shipping
                    </h1>
                    <p>on orders over $100</p>
                </div>

                <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                    <h1 class="font-bold text-2xl p-2">
                        <i class="fa-solid fa-truck-fast text-3xl p-2 font-bold text-orange-400"></i>Fast Delivery
                    </h1>
                    <p>World Wide</p>
                </div>

                <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                    <h1 class="font-bold text-2xl p-2">
                        <i class="fa-regular fa-thumbs-up text-3xl p-2 font-bold text-orange-400"></i>Big Choice
                    </h1>
                    <p>of Products</p>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                const slides = document.querySelectorAll('.carousel-slide');
                const indicators = document.querySelectorAll('.carousel-indicator');
                const prevBtn = document.querySelector('.carousel-prev');
                const nextBtn = document.querySelector('.carousel-next');

                let currentSlide = 0;

                function showSlide(index) {
                    slides.forEach((slide, i) => {
                        slide.style.opacity = (i === index) ? '1' : '0';
                    });
                    indicators.forEach((dot, i) => {
                        dot.classList.toggle('bg-orange-500', i === index);
                    });
                    currentSlide = index;
                }

                nextBtn?.addEventListener('click', () => {
                    let next = (currentSlide + 1) % slides.length;
                    showSlide(next);
                });

                prevBtn?.addEventListener('click', () => {
                    let prev = (currentSlide - 1 + slides.length) % slides.length;
                    showSlide(prev);
                });

                indicators.forEach((dot, index) => {
                    dot.addEventListener('click', () => showSlide(index));
                });

                setInterval(() => {
                    let next = (currentSlide + 1) % slides.length;
                    showSlide(next);
                }, 5000);

                showSlide(0);

                const goTopBtn = document.getElementById('goTopBtn');
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 300) {
                        goTopBtn.classList.remove('hidden');
                    } else {
                        goTopBtn.classList.add('hidden');
                    }
                });

                goTopBtn.addEventListener('click', () => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            </script>
        @endpush
    @endsection
