@extends('layout.app')

@section('content')

    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="w-full bg-white shadow rounded dark:bg-gray-900 py-2 relative">
        <div class="max-w-7xl mx-auto px-0 relative">
            <div class="banner-container h-[400px] relative overflow-hidden">
                @foreach ($sliders as $index => $banner)
                    <div class="banner-slide flex items-center justify-between absolute inset-0 transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" id="banner-{{ $index }}">
                        <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">
                            <p class="text-xl font-bold">{{ $banner->slider_title }}</p>
                            <p class="text-lg">{{ $banner->short_title }}</p>
                            <a href="#" class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition">Shop Now</a>
                        </div>
                        <div class="w-full lg:w-1/2 h-full">
                            <img src="{{ asset($banner->slider_image) }}" alt="Banner Image" class="w-full h-full object-contain">
                        </div>
                    </div>
                @endforeach

                <button class="banner-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-gray-300 hover:bg-gray-500 rounded-full text-white text-xl">‹</button>
                <button class="banner-next absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-gray-300 hover:bg-gray-500 rounded-full text-white text-xl">›</button>

                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    @foreach ($sliders as $index => $banner)
                        <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60 hover:bg-orange-500 transition {{ $index === 0 ? 'bg-orange-500' : '' }}" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

   
    <h1 class="text-center text-4xl pt-16 dark:text-white">Our <span class="font-bold">New Products</span></h1>

    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row gap-8">

            <div class="md:w-1/4 bg-blue-50 dark:bg-gray-800 p-4 rounded shadow text-left space-y-6">

     
                <div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4 text-center dark:text-white">Customer Ratings</h3>
                    <div class="space-y-2">
                        @php $ratings = [5, 4, 3.5, 3, 2.5]; @endphp
                        @foreach($ratings as $rating)
                            <div class="flex items-center gap-2 text-yellow-400">
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($rating))
                                            <i class="fa-solid fa-star"></i>
                                        @elseif($i == ceil($rating) && !is_int($rating))
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-black dark:text-white text-sm">{{ $rating }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Price</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        @foreach([
                            'Under ₹1,000' => '<1000',
                            '₹1,000 - ₹5,000' => '1000-5000',
                            '₹5,000 - ₹10,000' => '5000-10000',
                            '₹10,000 - ₹20,000' => '10000-20000',
                            '₹20,000 - ₹30,000' => '20000-30000',
                            'Over ₹30,000' => '>30000'
                        ] as $label => $value)
                            <li>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="rounded" value="{{ $value }}">
                                    <span class="hover:text-orange-500">{{ $label }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

     
                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Discount</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        @foreach(['5% or More', '10% or More', '20% or More', '30% or More', '50% or More', '60% or More'] as $discount)
                            <li>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="rounded">
                                    <span>{{ $discount }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Electronics</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        @foreach(['Accessories', 'Cameras & Photography', 'Car & Vehicle Electronics', 'Computers & Accessories', 'GPS & Accessories', 'Headphones', 'Home Audio', 'Home Theater, TV & Video', 'Mobiles & Accessories', 'Portable Media Players', 'Tablets', 'Telephones & Accessories', 'Wearable Technology'] as $item)
                            <li>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="rounded">
                                    <span>{{ $item }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

 
                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">Cash On Delivery</h4>
                    <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
                        <input type="checkbox" class="rounded">
                        <span>Eligible for Cash On Delivery</span>
                    </label>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900 dark:text-white">New Arrivals</h4>
                    <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        @foreach(['Last 30 days', 'Last 90 days'] as $arrival)
                            <li>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="rounded">
                                    <span>{{ $arrival }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-3 text-blue-900 dark:text-white">Best Seller</h4>
                    <div class="overflow-hidden h-64 relative">
                        <div class="space-y-4 animate-vertical-scroll">
                            @foreach ($products as $product)
                                <div class="flex items-center gap-3">
                                    <img src="{{ $product->product_thambnail }}" alt="{{ $product->product_name }}" class="w-14 h-14 object-contain">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-100 leading-tight">{{ $product->product_name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-300">₹{{ number_format($product->selling_price) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
     
            <div class="md:w-3/4 h-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products->take(6) as $product)
                    <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group relative">
                        <div class="relative">
                            <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image" class="mx-auto mb-3 w-full h-[180px] object-contain">
                            <a href="{{ route('SingleProduct1', $product->id) }}" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="bg-[#0B1D51] hover:bg-orange-400 text-white px-4 py-2 rounded shadow">Quick View</button>
                            </a>
                        </div>
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-1 truncate">{{ $product->product_name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ number_format($product->selling_price) }}</p>
                        <button class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition w-1/2">Add to Cart</button>
                    </div>
                @endforeach


                <div class="col-span-full my-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Mid Section Banner" class="w-full h-auto rounded shadow-md object-cover">
                </div>

                @foreach($products->slice(6, 6) as $product)
                    <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group relative">
                        <div class="relative">
                            <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image" class="mx-auto mb-3 w-full h-[180px] object-contain">
                            <a href="{{ route('SingleProduct1', $product->id) }}" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="bg-[#0B1D51] hover:bg-orange-400 text-white px-4 py-2 rounded shadow">Quick View</button>
                            </a>
                        </div>
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-1 truncate">{{ $product->product_name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ number_format($product->selling_price) }}</p>
                        <button class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition w-full">Add to Cart</button>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="relative w-full h-[500px] bg-fixed bg-center bg-cover my-12" style="background-image: url('{{ asset('images/logo.jpg') }}');">
        <div class="flex h-full container mx-auto">
            <div class="w-1/2 flex justify-center items-center p-4">
                <img src="{{ asset('images/pc.png') }}" alt="PC 1" class="w-full max-w-md h-auto rounded shadow-lg" />
            </div>
            <div class="w-1/2 flex justify-center items-center p-4">
                <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2" class="w-full max-w-md h-auto rounded shadow-lg" />
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4">
        <p class="font-bold text-black dark:text-white text-2xl py-4">Electronics:</p>
        <p class="pb-4 dark:text-gray-300">
            If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we make it easy to find exactly what you need at a price you can afford...
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-12">
            <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-center">
                <div class="text-orange-400 text-4xl mb-3"><i class="fa-solid fa-cart-shopping"></i></div>
                <h3 class="font-bold text-xl text-black dark:text-white mb-2">Free Shipping</h3>
                <p class="text-gray-600 dark:text-gray-300">on orders over $100</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-center">
                <div class="text-orange-400 text-4xl mb-3"><i class="fa-solid fa-truck-fast"></i></div>
                <h3 class="font-bold text-xl text-black dark:text-white mb-2">Fast Delivery</h3>
                <p class="text-gray-600 dark:text-gray-300">World Wide</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-6 rounded shadow text-center">
                <div class="text-orange-400 text-4xl mb-3"><i class="fa-regular fa-thumbs-up"></i></div>
                <h3 class="font-bold text-xl text-black dark:text-white mb-2">Big Choice</h3>
                <p class="text-gray-600 dark:text-gray-300">of Products</p>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const goTopBtn = document.getElementById('goTopBtn');
            window.addEventListener('scroll', () => {
                goTopBtn.classList.toggle('hidden', window.scrollY <= 300);
            });
            goTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
    @endpush

@endsection
