@extends('layout.app')

@section('content')
<button id="goTopBtn" class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
    <i class="fa-solid fa-arrow-up-from-bracket"></i>
</button>
<div class="container mx-auto px-4 sm:px-6 py-4 sm:py-6">

    <h2 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6 text-center mt-6 sm:mt-10">{{ $category->category_name }}</h2>

    @if ($category->products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach ($category->products as $product)
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
    @else
        <div class="text-center text-gray-500 text-base sm:text-lg mt-6 sm:mt-10">
            No products found in this category.
        </div>
    @endif

</div>

<div class="px-4 sm:px-8 md:px-16">
    <p class="font-bold text-black dark:text-white text-xl sm:text-2xl p-2 pt-6 sm:pt-12">Electronics:</p>
    <p class="p-2 text-black dark:text-gray-300 text-sm sm:text-base">
        If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
        make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
        laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
        video and more.
    </p>

    <div class="flex flex-col sm:flex-row justify-between gap-4 sm:gap-6 text-center mt-4 sm:mt-6 pb-6 sm:pb-12">
        <div class="flex-1 bg-white dark:bg-gray-900 p-3 sm:p-4 rounded shadow text-black dark:text-white mb-4 sm:mb-0">
            <h1 class="font-bold text-xl sm:text-2xl p-2">
                <i class="fa-solid fa-cart-shopping text-2xl sm:text-3xl p-2 font-bold text-orange-400"></i>Free Shipping
            </h1>
            <p class="text-sm sm:text-base">on orders over $100</p>
        </div>

        <div class="flex-1 bg-white dark:bg-gray-900 p-3 sm:p-4 rounded shadow text-black dark:text-white mb-4 sm:mb-0">
            <h1 class="font-bold text-xl sm:text-2xl p-2">
                <i class="fa-solid fa-truck-fast text-2xl sm:text-3xl p-2 font-bold text-orange-400"></i>Fast Delivery
            </h1>
            <p class="text-sm sm:text-base">World Wide</p>
        </div>

        <div class="flex-1 bg-white dark:bg-gray-900 p-3 sm:p-4 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-xl sm:text-2xl p-2">
                <i class="fa-regular fa-thumbs-up text-2xl sm:text-3xl p-2 font-bold text-orange-400"></i>Big Choice
            </h1>
            <p class="text-sm sm:text-base">of Products</p>
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