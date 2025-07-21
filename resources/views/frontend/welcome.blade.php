@extends('layout.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">

    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="w-full bg-white shadow rounded dark:bg-gray-900 py-2 relative">
        <div class="max-w-7xl mx-auto px-0 relative">
         <div class="banner-container h-[180px] sm:h-[250px] md:h-[300px] lg:h-[400px] relative overflow-hidden">
                @foreach ($sliders as $index => $banner)
                    <div class="banner-slide flex items-center justify-between absolute inset-0 transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                        id="banner-{{ $index }}">
                        <div class="w-full lg:w-1/2 space-y-4 text-black dark:text-white pl-6 lg:pl-12">
                            <p class="text-xl font-bold">{{ $banner->slider_title }}</p>
                            <p class="text-lg">{{ $banner->short_title }}</p>
                            <a href="#"
                                class="inline-block bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 mt-6 rounded shadow transition">Shop
                                Now</a>
                        </div>
                        <div class="w-full lg:w-1/2 h-full">
                            <img src="{{ asset($banner->slider_image) }}" alt="Banner Image"
                                class="w-full h-full object-contain">
                        </div>
                    </div>
                @endforeach

                <button
                    class="banner-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-gray-300 hover:bg-gray-500 rounded-full text-white text-xl">‹</button>
                <button
                    class="banner-next absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 bg-gray-300 hover:bg-gray-500 rounded-full text-white text-xl">›</button>

                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    @foreach ($sliders as $index => $banner)
                        <button
                            class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-60 hover:bg-orange-500 transition {{ $index === 0 ? 'bg-orange-500' : '' }}"
                            data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


     <h1 class="text-center text-2xl sm:text-3xl lg:text-4xl pt-8 sm:pt-12 lg:pt-16 dark:text-white">Our <span class="font-bold">New Products</span></h1>

    <div class="container mx-auto px-4 sm:px-8 lg:px-16 py-6 sm:py-8 lg:py-10">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-8">

          <div class="w-full md:w-1/4 bg-blue-50 dark:bg-gray-800 p-3 sm:p-4 rounded shadow text-left space-y-4 sm:space-y-6 hidden sm:block">


                <div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4 text-center dark:text-white">Customer Ratings</h3>
                    <div class="space-y-2">
                        @php $ratings = [5, 4, 3.5, 3, 2.5]; @endphp
                        @foreach ($ratings as $rating)
                            <div class="flex items-center gap-2 text-yellow-400">
                                <div class="flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($rating))
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
                        @foreach ([
            'Under ₹1,000' => '<1000',
            '₹1,000 - ₹5,000' => '1000-5000',
            '₹5,000 - ₹10,000' => '5000-10000',
            '₹10,000 - ₹20,000' => '10000-20000',
            '₹20,000 - ₹30,000' => '20000-30000',
            'Over ₹30,000' => '>30000',
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
                        @foreach (['5% or More', '10% or More', '20% or More', '30% or More', '50% or More', '60% or More'] as $discount)
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
                        @foreach (['Accessories', 'Cameras & Photography', 'Car & Vehicle Electronics', 'Computers & Accessories', 'GPS & Accessories', 'Headphones', 'Home Audio', 'Home Theater, TV & Video', 'Mobiles & Accessories', 'Portable Media Players', 'Tablets', 'Telephones & Accessories', 'Wearable Technology'] as $item)
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
                        @foreach (['Last 30 days', 'Last 90 days'] as $arrival)
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
                                    <img src="{{ $product->product_thambnail }}" alt="{{ $product->product_name }}"
                                        class="w-14 h-14 object-contain">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-100 leading-tight">
                                            {{ $product->product_name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-300">
                                            ₹{{ number_format($product->selling_price) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

           <div class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
    @foreach ($products->take(6) as $product)
        <div class="bg-white dark:bg-gray-900 rounded shadow p-2 sm:p-3 md:p-4 text-center relative group">
            <!-- Wishlist Button -->
            <button
                class="wishlist-toggle absolute top-2 right-2 sm:top-3 sm:right-3 text-xl sm:text-2xl z-10 {{ in_array($product->id, $wishlistedProductIds) ? 'text-red-500' : 'text-gray-300' }}"
                data-product-id="{{ $product->id }}" title="Toggle Wishlist">
                <i class="fa fa-heart"></i>
            </button>

            <!-- Product Image with Hover Quick View -->
            <div class="relative">
                <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image"
                    class="mx-auto mb-2 sm:mb-3 w-full h-[100px] sm:h-[120px] md:h-[150px] lg:h-[180px] object-contain">

                <!-- Quick View Overlay on Image -->
                <a href="{{ route('showproduct', $product->id) }}"
                    class="absolute top-0 left-0 w-full h-full flex items-center justify-center 
                    opacity-0 group-hover:opacity-100 transition duration-300">
                    <button class="bg-[#0B1D51] text-white px-2 py-1 sm:px-3 sm:py-1 md:px-4 md:py-2 rounded text-xs sm:text-sm">
                        Quick View
                    </button>
                </a>
            </div>

            <!-- Product Name -->
            <h4 class="font-semibold text-sm sm:text-base text-gray-800 dark:text-white mb-1 truncate">
                {{ $product->product_name }}
            </h4>

            <!-- Price -->
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 mb-1 sm:mb-2">
                ₹{{ number_format($product->selling_price) }}
            </p>

            <!-- Add to Cart Button -->
            <button type="button"
                class="addToCartBtn bg-[#0B1D51] text-white px-2 py-1 sm:px-3 sm:py-1 md:px-4 md:py-2 rounded text-xs sm:text-sm"
                data-id="{{ $product->id }}"
                data-name="{{ $product->product_name }}"
                data-price="{{ $product->discount_price ?? $product->selling_price }}">
                Add to Cart
            </button>
        </div>
    @endforeach

    <div class="col-span-1 sm:col-span-2 lg:col-span-3 m-2 sm:m-3 md:m-4">
        <img src="{{ asset('images/logo.jpg') }}" alt="Mid Section Banner" class="w-full h-auto rounded shadow-md object-cover">
    </div>

    @foreach ($products->slice(6, 6) as $product)
        <div class="bg-white dark:bg-gray-900 rounded shadow p-2 sm:p-3 md:p-4 text-center relative group">
            <!-- Wishlist Button -->
            <button
                class="wishlist-toggle absolute top-2 right-2 sm:top-3 sm:right-3 text-xl sm:text-2xl z-10 {{ in_array($product->id, $wishlistedProductIds) ? 'text-red-500' : 'text-gray-300' }}"
                data-product-id="{{ $product->id }}" title="Toggle Wishlist">
                <i class="fa fa-heart"></i>
            </button>

            <!-- Product Image with Hover Quick View -->
            <div class="relative">
                <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image"
                    class="mx-auto mb-2 sm:mb-3 w-full h-[100px] sm:h-[120px] md:h-[150px] lg:h-[180px] object-contain">

                <!-- Quick View Overlay on Image -->
                <a href="{{ route('showproduct', $product->id) }}"
                    class="absolute top-0 left-0 w-full h-full flex items-center justify-center 
                    opacity-0 group-hover:opacity-100 transition duration-300">
                    <button class="bg-[#0B1D51] text-white px-2 py-1 sm:px-3 sm:py-1 md:px-4 md:py-2 rounded text-xs sm:text-sm">
                        Quick View
                    </button>
                </a>
            </div>

            <!-- Product Name -->
            <h4 class="font-semibold text-sm sm:text-base text-gray-800 dark:text-white mb-1 truncate">
                {{ $product->product_name }}
            </h4>

            <!-- Price -->
            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 mb-1 sm:mb-2">
                ₹{{ number_format($product->selling_price) }}
            </p>

            <!-- Add to Cart Button -->
            <button type="button"
                class="addToCartBtn bg-[#0B1D51] text-white px-2 py-1 sm:px-3 sm:py-1 md:px-4 md:py-2 rounded text-xs sm:text-sm"
                data-id="{{ $product->id }}"
                data-name="{{ $product->product_name }}"
                data-price="{{ $product->discount_price ?? $product->selling_price }}">
                Add to Cart
            </button>
        </div>
    @endforeach
</div>

        </div>
    </div>
 <div class="relative w-full bg-fixed bg-center bg-cover my-12 min-h-[300px]"
    style="background-image: url('{{ asset('images/logo.jpg') }}');">
    
    <!-- Semi-transparent overlay for better contrast -->
    <div class="absolute inset-0 bg-black/20"></div>
    
    <!-- Content container with responsive layout -->
    <div class="relative container mx-auto h-full">
        <div class="flex flex-col sm:flex-row h-full py-8">
            <!-- Image 1 - Shows on all screens -->
            <div class="w-full sm:w-1/2 flex justify-center items-center p-4">
                <img src="{{ asset('images/pc.png') }}" alt="PC 1"
                    class="w-full max-w-xs sm:max-w-md h-auto rounded-lg shadow-xl" />
            </div>
            
            <!-- Image 2 - Shows on all screens -->
            <div class="w-full sm:w-1/2 flex justify-center items-center p-4">
                <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2"
                    class="w-full max-w-xs sm:max-w-md h-auto rounded-lg shadow-xl" />
            </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const goTopBtn = document.getElementById('goTopBtn');
                window.addEventListener('scroll', () => {
                    goTopBtn.classList.toggle('hidden', window.scrollY <= 300);
                });
                goTopBtn.addEventListener('click', () => {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

            });
        </script>
    @endpush

