@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="w-full bg-white dark:bg-gray-900 py-10 relative ">
        <div class="max-w-7xl mx-auto  px-0 relative">
            <div class="relative h-[400px]">

                <div class="banner-slide flex items-center justify-between absolute inset-0 opacity-100 transition-opacity duration-500"
                    id="banner-1">
                    <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">

                        <p class="text-lg">Get <span class="text-2xl font-bold">25%</span> offer</p>
                        <h2 class="text-4xl font-bold">Upgrade Your Tech</h2>
                        <p class="text-lg">Best deals on custom PCs and gadgets</p>
                        <a href="#"
                            class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition duration-300">
                            Shop Now
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2 h-full">
                        <img src="{{ asset('images/pc2.jpg') }}" alt="Banner 1" class="w-full h-full object-contain">
                    </div>
                </div>

                <div class="banner-slide flex items-center justify-between absolute inset-0 opacity-0 transition-opacity duration-500"
                    id="banner-2">
                    <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">

                        <p class="text-lg">New <span class="text-2xl font-bold">Arrivals</span></p>
                        <h2 class="text-4xl font-bold">Powerful Keyboards</h2>
                        <p class="text-lg">Top mechanical and RGB keyboards</p>
                        <a href="#"
                            class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition duration-300">
                            Shop Now
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2 h-full">
                        <img src="{{ asset('images/keyboard.webp') }}" alt="Banner 2" class="w-full h-full object-contain">
                    </div>
                </div>

                <div class="banner-slide flex items-center justify-between absolute inset-0 opacity-0 transition-opacity duration-500"
                    id="banner-3">
                    <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">

                        <p class="text-lg">Limited <span class="text-2xl font-bold">Stock</span></p>
                        <h2 class="text-4xl font-bold">4K Ultra Monitors</h2>
                        <p class="text-lg">Best display for design & gaming</p>
                        <a href="#"
                            class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition duration-300">
                            Shop Now
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2 h-full">
                        <img src="{{ asset('images/monitor.avif') }}" alt="Banner 3" class="w-full h-full object-contain">
                    </div>
                </div>

                <div class="banner-slide flex items-center justify-between absolute inset-0 opacity-0 transition-opacity duration-500"
                    id="banner-4">
                    <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">

                        <p class="text-lg">Limited <span class="text-2xl font-bold">Stock</span></p>
                        <h2 class="text-4xl font-bold">Custom PC Builds</h2>
                        <p class="text-lg">Built for performance and style</p>
                        <a href="#"
                            class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition duration-300">
                            Shop Now
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2 h-full">
                        <img src="{{ asset('images/pc.png') }}" alt="Banner 4" class="w-full h-full object-contain">
                    </div>
                </div>



                <button
                    class="banner-prev absolute left-0 top-1/2 -translate-y-1/2
               bg-gray-400 dark:bg-gray-800 bg-opacity-80 hover:bg-gray-600
               w-12 h-12 rounded-full flex items-center justify-center shadow z-50">
                    &lt;
                </button>

                <button
                    class="banner-next absolute right-0 top-1/2 -translate-y-1/2
                bg-gray-400 dark:bg-gray-800 bg-opacity-80 hover:bg-gray-600
                w-12 h-12 rounded-full flex items-center justify-center shadow z-50">
                    &gt;
                </button>




                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60" data-index="0"></button>
                    <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60" data-index="1"></button>
                    <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60" data-index="2"></button>
                    <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60" data-index="3"></button>
                </div>
            </div>
        </div>
    </div>




    <h1 class="text-center text-4xl pt-18 dark:text-white">Our <span class="font-bold">New Products</span></h1>

    <div class="container mx-auto px-14 py-10">
        <div class="flex flex-col md:flex-row gap-8">

            <div class="md:w-1/4 bg-blue-50 dark:bg-gray-800 p-4 rounded shadow text-left space-y-6">

                <div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4 text-center dark:text-white">Customer Ratings</h3>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black dark:text-white text-sm">5.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black dark:text-white text-sm">4.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-black dark:text-white text-sm">3.5</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black dark:text-white text-sm">3.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-black dark:text-white text-sm">2.5</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Price</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                Under ₹1,000
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                ₹1,000 - ₹5,000
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                ₹5,000 - ₹10,000
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                ₹10,000 - ₹20,000
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                ₹20,000 - ₹30,000
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 hover:text-orange-500">

                                Over ₹30,000
                            </a>
                        </li>
                    </ul>
                </div>


                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Discount</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <li><input type="checkbox"> 5% or More</li>
                        <li><input type="checkbox"> 10% or More</li>
                        <li><input type="checkbox"> 20% or More</li>
                        <li><input type="checkbox"> 30% or More</li>
                        <li><input type="checkbox"> 50% or More</li>
                        <li><input type="checkbox"> 60% or More</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Electronics</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <li><input type="checkbox"> Accessories</li>
                        <li><input type="checkbox"> Cameras & Photography</li>
                        <li><input type="checkbox"> Car & Vehicle Electronics</li>
                        <li><input type="checkbox"> Computers & Accessories</li>
                        <li><input type="checkbox"> GPS & Accessories</li>
                        <li><input type="checkbox"> Headphones</li>
                        <li><input type="checkbox"> Home Audio</li>
                        <li><input type="checkbox"> Home Theater, TV & Video</li>
                        <li><input type="checkbox"> Mobiles & Accessories</li>
                        <li><input type="checkbox"> Portable Media Players</li>
                        <li><input type="checkbox"> Tablets</li>
                        <li><input type="checkbox"> Telephones & Accessories</li>
                        <li><input type="checkbox"> Wearable Technology</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Cash On Delivery</h4>
                    <label class="text-sm text-gray-700 dark:text-gray-300">
                        <input type="checkbox"> Eligible for Cash On Delivery
                    </label>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">New Arrivals</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <li><input type="checkbox"> Last 30 days</li>
                        <li><input type="checkbox"> Last 90 days</li>
                    </ul>
                </div>


                <div>
                    <h4 class="text-lg font-semibold mb-3 text-blue-900 dark:text-white">Best Seller</h4>
                    <div class="overflow-hidden h-64 relative">
                        <div class="animate-scroll space-y-4">
                            @foreach (['Gaming Mouse' => '₹799', 'Mechanical Keyboard' => '₹2,499', 'RGB Cabinet' => '₹4,999'] as $name => $price)
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('images/pc.png') }}" alt="Product"
                                        class="w-14 h-14 object-contain">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-100 leading-tight">
                                            {{ $name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-300">{{ $price }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group">

                        <div class="relative">

                            <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                            <a href="{{ route('SingleProduct1') }}">
                                <button
                                    class="absolute left-1/2 -translate-x-1/2 top-1/2 opacity-0 group-hover:opacity-100 translate-y-[-20px] group-hover:translate-y-2 transition-all bg-[#0B1D51] text-white px-4 py-1 text-sm rounded shadow">

                                    Quick View
                                </button>
                            </a>
                        </div>

                        <h4 class="font-semibold text-gray-800 dark:text-white mb-1">Product {{ $i }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ rand(799, 4999) }}</p>
                        <button
                            class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                            Add to Cart
                        </button>
                    </div>
                @endfor


                <div class="col-span-3 m-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Mid Section Banner"
                        class="w-full h-auto rounded shadow-md object-cover">
                </div>


                @for ($i = 7; $i <= 12; $i++)
                    <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group">


                        <div class="relative">
                            <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                            <a href="{{ route('SingleProduct1') }}">
                                <button
                                    class="absolute left-1/2 -translate-x-1/2 top-1/2 opacity-0 group-hover:opacity-100 translate-y-[-20px] group-hover:translate-y-2 transition-all bg-[#0B1D51] text-white px-4 py-1 text-sm rounded shadow">
                                    Quick View
                                </button>
                            </a>
                        </div>

                        <h4 class="font-semibold text-gray-800 dark:text-white mb-1">Product {{ $i }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ rand(799, 4999) }}</p>
                        <button
                            class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                            Add to Cart
                        </button>
                    </div>
                @endfor
            </div>

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
        <p class="font-bold text-black dark:text-white text-2xl dark:text-white p-2 pt-12">Electronics:</p>
        <p class="p-2 dark:text-gray-300">
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
