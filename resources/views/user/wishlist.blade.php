@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Your Wishlist</h2>

        @if ($wishlistProducts->isEmpty())
            <p class="text-gray-500">No products in your wishlist.</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 text-center">
                @foreach ($wishlistProducts as $product)
                    <div class="border p-4 rounded-lg shadow">
                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}"
                            class="w-full h-40 object-contain mb-2">
                        <h3 class="font-bold">{{ $product->product_name }}</h3>
                        <p class="text-sm text-gray-500">{{ $product->short_desc }}</p>
                        <p class="font-semibold text-orange-500 mt-2">₹{{ $product->selling_price }}</p>
                        <a href="{{ route('showproduct', $product->id) }}">

                            <button
                                class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition w-1/2">Quick
                                View</button>
                        </a>
                    </div>
                @endforeach
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
