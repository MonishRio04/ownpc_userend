<!-- Banner Section -->
<section class="relative w-full bg-fixed bg-center bg-cover my-12 min-h-[400px]"
    style="background-image: url('{{ asset('static_images/modern-stationary-collection-arrangement.jpg') }}');">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative container mx-auto h-full px-4">
        <div class="flex flex-col sm:flex-row gap-6 pb-8 pt-[7rem] items-stretch justify-center h-full">

            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-xl flex flex-col sm:flex-row-reverse w-full sm:w-1/2 overflow-hidden">
                <img src="{{ asset('static_images/people-repairing-computer-chips.jpg') }}" alt="PC 1"
                    class="w-full sm:w-1/2 object-cover" />
                <div class="p-6 flex flex-col justify-center text-left sm:w-1/2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Powerful Computers</h3>
                    <p class="text-gray-600 text-sm">Top-tier performance machines built for speed and durability.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-xl shadow-xl flex flex-col sm:flex-row-reverse w-full sm:w-1/2 overflow-hidden">
                <img src="{{ asset('static_images/still-life-books-versus-technology.jpg') }}" alt="PC 2"
                    class="w-full sm:w-1/2 object-cover" />
                <div class="p-6 flex flex-col justify-center text-left sm:w-1/2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Essential Hardware</h3>
                    <p class="text-gray-600 text-sm">Latest components to upgrade or build your custom rig.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="container mx-auto px-4 sm:px-6 md:px-16">
    <p class="font-bold text-black dark:text-white text-lg sm:text-xl md:text-2xl p-2 pt-2">Electronics:</p>
    <p class="p-2 text-gray-500 dark:text-gray-300 text-sm sm:text-base md:text-lg">
        If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
        make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
        laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
        video and more.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-center mt-6 pb-12">
        <!-- Card 1 -->
        <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-lg sm:text-xl md:text-2xl mb-2">
                <i class="fa-solid fa-cart-shopping text-xl sm:text-2xl md:text-3xl text-orange-400"></i>
                Free Shipping
            </h1>
            <p class="text-gray-500 text-sm sm:text-base md:text-lg">on orders over $100</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-lg sm:text-xl md:text-2xl mb-2">
                <i class="fa-solid fa-truck-fast text-xl sm:text-2xl md:text-3xl text-orange-400"></i>
                Fast Delivery
            </h1>
            <p class="text-gray-500 text-sm sm:text-base md:text-lg">World Wide</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-lg sm:text-xl md:text-2xl mb-2">
                <i class="fa-regular fa-thumbs-up text-xl sm:text-2xl md:text-3xl text-orange-400"></i>
                Big Choice
            </h1>
            <p class="text-gray-500 text-sm sm:text-base md:text-lg">of Products</p>
        </div>
    </div>
</div>

<div class="bg-[#021526] text-white pt-8 md:pt-16 px-4 md:px-16 pb-8 dark:bg-gray-800 dark:text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-8 mb-8 md:mb-12">
            <div class="mb-6 md:mb-0">
                <h5 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Categories</h5>
                <ul class="space-y-1 md:space-y-2 text-sm md:text-base">
                    <li><a href="{{ route('Electronics') }}"
                            class="text-gray-300 hover:text-orange-400 transition">Smartphones</a>
                    </li>
                    <li><a href="{{ route('Electronics') }}"
                            class="text-gray-300 hover:text-orange-400 transition">Laptops &
                            Tablets</a></li>
                    <li><a href="{{ route('Electronics') }}"
                            class="text-gray-300 hover:text-orange-400 transition">Cameras</a></li>
                    <li><a href="{{ route('Electronics') }}"
                            class="text-gray-300 hover:text-orange-400 transition">Audio Devices</a>
                    </li>
                    <li><a href="{{ route('Electronics') }}" class="text-gray-300 hover:text-orange-400 transition">Home
                            Appliances</a></li>
                </ul>
            </div>
            <div class="mb-6 md:mb-0">
                <h5 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Quick Links</h5>
                <ul class="space-y-1 md:space-y-2 text-sm md:text-base">
                    <li><a href="{{ route('AboutUs') }}" class="text-gray-300 hover:text-orange-400 transition">About
                            Us</a></li>
                    <li><a href="{{ route('ContactUs') }}"
                            class="text-gray-300 hover:text-orange-400 transition">Contact us</a></li>
                    <li><a href="{{ route('Help') }}" class="text-gray-300 hover:text-orange-400 transition">Help</a>
                    </li>
                    <li><a href="{{ route('FAQS') }}" class="text-gray-300 hover:text-orange-400 transition">Faqs</a>
                    <li><a href="{{ route('Terms') }}" class="text-gray-300 hover:text-orange-400 transition">Terms of
                            Use</a>
                    <li><a href="{{ route('Privacy') }}" class="text-gray-300 hover:text-orange-400 transition">Privacy
                            Policy</a>
                    </li>
                </ul>
            </div>
            <div class="mb-6 md:mb-0">
                <h5 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Get in Touch</h5>
                <ul class="space-y-1 md:space-y-2 text-sm md:text-base">
                    <li>
                        <p class="text-gray-300 ">Mkc, 123 Sebastian, USA</p>
                    </li>
                    <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">77 5566 8899</a>
                    </li>
                    <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">+11 2234 9865</a>
                    </li>
                    <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">mail1@gmail.com</a>
                    </li>
                    <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">mail2@gmail.com</a>
                    </li>
                </ul>

            </div>

            <div class="mb-6 md:mb-0">
                <p class="space-y-1 md:space-y-2 text-sm md:text-base">Free Delivery on your first order</p>
                <p class="text-2xl py-4 font-bold text-white">Follow Us on</p>
                <div class="flex justify-center sm:justify-start space-x-3 md:space-x-4 p-2">
                    <a href="#"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-accent transition text-sm md:text-base">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-accent transition text-sm md:text-base">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-accent transition text-sm md:text-base">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="p-3 md:p-4 text-center text-xs md:text-sm text-gray-400 bg-[#021526]">
    <p>© 2023 Electronics Mart. All rights reserved.</p>
</div>
