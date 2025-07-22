@extends('layout.app')
@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
         style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-2 sm:space-y-4">
            <p class="text-base sm:text-lg">
                Few Words about <span class="text-2xl sm:text-3xl md:text-4xl font-bold">us</span>
            </p>

            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-white">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">CONTACT US</span>
            </p>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center p-4">
        <div
            class="max-w-6xl w-full bg-white dark:bg-gray-900 rounded-xl sm:rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">

            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <div class="p-4 sm:p-6 md:p-8 lg:p-12 text-center md:text-left">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-semibold text-black dark:text-white tracking-wide leading-snug">
                        <span class="text-2xl sm:text-3xl md:text-4xl font-bold">We Work</span> for your best Success
                    </h1>
                </div>

                <div class="px-4 sm:px-6 md:px-8 lg:px-12 pb-4 sm:pb-6 md:pb-8 lg:pb-12">
                    <p class="text-gray-700 dark:text-gray-300 mb-4 sm:mb-6 leading-relaxed text-sm sm:text-base">
                        We specialize in crafting high-performance custom PCs tailored to your needs. <br>Whether you're a
                        gamer, creator, or professional, we deliver optimized machines built with precision and care.
                    </p>

                    <div class="space-y-3 sm:space-y-4 mb-6 sm:mb-8">
                        <div class="flex items-start">
                            <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-2 sm:mr-3 text-base sm:text-lg"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm sm:text-base">Expert-built systems for gamers, designers, and
                                developers</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-2 sm:mr-3 text-base sm:text-lg"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm sm:text-base">Trusted support and guidance throughout your
                                journey</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-2 sm:mr-3 text-base sm:text-lg"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm sm:text-base">Fast delivery and easy upgrade options at your
                                fingertips</span>
                        </div>
                    </div>

                    <div class="text-center md:text-left">
                        <a href="{{ route('Appliances') }}"
                            class="inline-block bg-orange-400 text-white font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-full text-sm sm:text-base md:text-lg shadow-lg hover:bg-[#0B1D51] transition transform hover:-translate-y-1 duration-300">
                            VIEW OUR PRODUCTS
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex justify-center items-center bg-white dark:bg-gray-900 p-4 sm:p-6">
                <img src="{{ asset('images/28.png') }}" alt="Custom PC" class="max-w-full h-auto rounded-lg sm:rounded-xl shadow-lg">
            </div>
        </div>
    </div>

    <div class="relative w-full h-[400px] sm:h-[500px] md:h-[600px] bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/review.webp') }}');">
        <div class="absolute top-6 sm:top-8 md:top-10 left-1/2 transform -translate-x-1/2 z-10 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-white">Our <span class="text-3xl sm:text-4xl md:text-5xl font-bold">Customer </span>Say</h2>
            <p class="text-white mt-1 sm:mt-2 text-sm sm:text-base">Real feedback from our happy clients</p>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center gap-4 sm:gap-6 h-full px-4 sm:px-6 md:px-10 pt-20 sm:pt-24 md:pt-32 z-10 relative">
            <div
                class="bg-white dark:bg-gray-900 rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 h-48 sm:h-56 w-full md:w-1/3 flex flex-col justify-between">
                <p class="text-base sm:text-lg md:text-xl font-semibold text-gray-700 dark:text-gray-300 leading-snug mb-3 sm:mb-4">
                    "Amazing PC builder site! I built my dream rig in minutes and got it delivered fast."
                </p>
                <div class="flex items-center space-x-3 sm:space-x-5">
                    <img src="{{ asset('images/shreya.jpg') }}" alt="S"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover shadow">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white">Shreya P.</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Software Engineer</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-900 rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 h-48 sm:h-56 w-full md:w-1/3 flex flex-col justify-between">
                <p class="text-base sm:text-lg md:text-xl font-semibold text-gray-700 dark:text-gray-300 leading-snug mb-3 sm:mb-4">
                    "Great support and value for money. Their team really helped me with choosing the right parts."
                </p>
                <div class="flex items-center space-x-3 sm:space-x-5">
                    <img src="{{ asset('images/rahul.jpg') }}" alt="R"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover shadow">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white">Rahul M.</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Tech Enthusiast</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-900 rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 h-48 sm:h-56 w-full md:w-1/3 flex flex-col justify-between">
                <p class="text-base sm:text-lg md:text-xl font-semibold text-gray-700 dark:text-gray-300 leading-snug mb-3 sm:mb-4">
                    "Highly recommended. Super clean UI and very smooth experience."
                </p>
                <div class="flex items-center space-x-3 sm:space-x-5">
                    <img src="{{ asset('images/anita.jpg') }}" alt="A"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover shadow">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white">Anita R.</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Gamer & Streamer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
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