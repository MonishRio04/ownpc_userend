@extends('layout.app')
@section('content')
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-56 overflow-hidden md:h-96">
            @foreach ($sliders as $slider)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset($slider->slider_image) }}" class="h-full w-full object-cover" alt="...">
                </div>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="px-4 sm:px-6 lg:px-8">
        <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
            <i class="fa-solid fa-arrow-up-from-bracket"></i>
        </button>
        <h1 class="text-center text-2xl sm:text-3xl lg:text-4xl pt-8 sm:pt-12 lg:pt-16 dark:text-white">
            Our <span class="font-bold">New Products</span>
        </h1>

        <div class="container mx-auto py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products as $index => $product)
                <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center relative group">
                    <button
                        class="wishlist-toggle absolute top-2 right-2 text-xl {{ in_array($product->id, $wishlistedProductIds) ? 'text-red-500' : 'text-gray-300' }}"
                        data-product-id="{{ $product->id }}">
                        <i class="fa fa-heart"></i>
                    </button>

                    <div class="relative">
                        <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image"
                            class="mx-auto h-[150px] object-contain mb-3">
                        <a href="{{ route('showproduct', $product->id) }}"
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <button class="bg-[#196490] text-white px-3 py-2 rounded text-sm">Quick View</button>
                        </a>
                    </div>

                    <h4 class="font-semibold text-sm text-gray-800 dark:text-white mb-1 truncate">
                        {{ $product->product_name }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ number_format($product->selling_price) }}
                    </p>

                    <button class="addToCartBtn bg-[#196490] text-white px-4 py-2 rounded text-sm"
                        data-id="{{ $product->id }}" data-name="{{ $product->product_name }}"
                        data-price="{{ $product->discount_price ?? $product->selling_price }}">
                        Add to Cart
                    </button>
                </div>
            @endforeach
        </div>


    </div>
    <!-- Banner Section -->
<section class="relative w-full bg-fixed bg-center bg-cover my-12 min-h-[400px]"
    style="background-image: url('{{ asset('images/modern-stationary-collection-arrangement.jpg') }}');">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative container mx-auto h-full px-4">
        <div class="flex flex-col sm:flex-row gap-6 pb-8 pt-[7rem] items-stretch justify-center h-full">

            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-xl flex flex-col sm:flex-row-reverse w-full sm:w-1/2 overflow-hidden">
                <img src="{{ asset('images/people-repairing-computer-chips.jpg') }}" alt="PC 1"
                    class="w-full sm:w-1/2 object-cover" />
                <div class="p-6 flex flex-col justify-center text-left sm:w-1/2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Powerful Computers</h3>
                    <p class="text-gray-600 text-sm">Top-tier performance machines built for speed and durability.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-xl flex flex-col sm:flex-row-reverse w-full sm:w-1/2 overflow-hidden">
                <img src="{{ asset('images/still-life-books-versus-technology.jpg') }}" alt="PC 2"
                    class="w-full sm:w-1/2 object-cover" />
                <div class="p-6 flex flex-col justify-center text-left sm:w-1/2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Essential Hardware</h3>
                    <p class="text-gray-600 text-sm">Latest components to upgrade or build your custom rig.</p>
                </div>
            </div>

        </div>
    </div>
</section>


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
