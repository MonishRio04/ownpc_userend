@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    
    <div class="max-w-6xl mx-auto py-4 sm:py-6 md:py-8 px-3 sm:px-4">
        <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">Your Wishlist</h2>

        @if ($wishlistProducts->isEmpty())
            <p class="text-gray-500 text-center">No products in your wishlist.</p>
        @else
           <div class="wishlist-container">
                <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6 text-center">
                    @foreach ($wishlistProducts as $product)
                        <div class="border p-2 sm:p-3 md:p-4 rounded-lg shadow relative hover:shadow-md transition">
                            <!-- Heart Icon to Remove -->
                            <button class="absolute top-1 right-1 sm:top-2 sm:right-2 wishlist-toggle" data-product-id="{{ $product->id }}">
                                <i class="fa-solid fa-heart text-red-500 text-lg sm:text-xl transition"></i>
                            </button>

                            <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}"
                                class="w-full h-28 sm:h-32 md:h-40 object-contain mb-1 sm:mb-2">
                            <h3 class="font-bold text-sm sm:text-base">{{ $product->product_name }}</h3>
                            <p class="text-xs sm:text-sm text-gray-500">{{ $product->short_desc }}</p>
                            <p class="font-semibold text-orange-500 mt-1 sm:mt-2 text-sm sm:text-base">₹{{ $product->selling_price }}</p>
                            <a href="{{ route('showproduct', $product->id) }}">
                                <button class="mt-1 sm:mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-2 sm:px-3 md:px-4 py-1 sm:py-2 rounded text-xs sm:text-sm transition w-1/2">
                                    Quick View
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const goTopBtn = $('#goTopBtn');

            $(window).scroll(function() {
                goTopBtn.toggleClass('hidden', $(window).scrollTop() <= 300);
            });

            goTopBtn.click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
        });
    </script>
@endpush