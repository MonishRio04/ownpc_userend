@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
         style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-2 sm:space-y-4">
            <p class="text-base sm:text-lg">
                Contact with <span class="text-2xl sm:text-3xl md:text-4xl font-bold">us</span>
            </p>

            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">CONTACT US</span>
            </p>
        </div>
    </div>

    <section class="p-4 sm:p-8 md:p-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 md:gap-12">

            <div class="space-y-4 sm:space-y-6">
                <h2 class="text-2xl sm:text-3xl font-bold text-black dark:text-white">Connect Us</h2>

                <div>
                    <h4 class="text-base sm:text-lg font-semibold dark:text-white">Company Address</h4>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">10001, 5th Avenue, 12202 street, USA.</p>
                </div>

                <div>
                    <h4 class="text-base sm:text-lg font-semibold dark:text-white">Call Us</h4>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">+1(21) 112 7368</p>
                </div>

                <div>
                    <h4 class="text-base sm:text-lg font-semibold dark:text-white">Email Us</h4>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">example@mail.com</p>
                </div>

                <div>
                    <h4 class="text-base sm:text-lg font-semibold dark:text-white">Customer Support</h4>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">info@support.com</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-900 p-4 sm:p-6 md:p-8 rounded-xl sm:rounded-2xl shadow-lg">
                <form action="#" method="POST" class="space-y-3 sm:space-y-4">
                    @csrf

                    <input type="text" name="name" placeholder="Your Name"
                        class="w-full px-3 sm:px-4 py-1 sm:py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm sm:text-base">

                    <input type="email" name="email" placeholder="Your Email"
                        class="w-full px-3 sm:px-4 py-1 sm:py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm sm:text-base">

                    <input type="text" name="subject" placeholder="Subject"
                        class="w-full px-3 sm:px-4 py-1 sm:py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm sm:text-base">

                    <input type="url" name="website" placeholder="Website URL"
                        class="w-full px-3 sm:px-4 py-1 sm:py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm sm:text-base">

                    <textarea name="message" rows="4" placeholder="Type your message here"
                        class="w-full px-3 sm:px-4 py-1 sm:py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-sm sm:text-base"></textarea>

                    <button type="submit"
                        class="bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold px-4 sm:px-6 py-1 sm:py-2 rounded-md transition text-sm sm:text-base">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

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