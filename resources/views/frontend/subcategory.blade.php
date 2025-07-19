@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <h1 class="text-2xl font-bold mb-4 text-center mt-10">{{ $subcategory->subcategory_name }}</h1>


    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-16 pb-10">
        @forelse($subcategory->products as $product)
            <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group relative">
                <button
                    class="wishlist-toggle absolute top-3 right-3 text-2xl z-10 {{ in_array($product->id, $wishlistedProductIds) ? 'text-red-500' : 'text-gray-400' }}"
                    data-product-id="{{ $product->id }}" title="Toggle Wishlist">
                    <i class="fa fa-heart"></i>
                </button>
                <div class="relative">
                    <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image"
                        class="mx-auto mb-3 w-full h-[180px] object-contain">
                </div>
                <h4 class="font-semibold text-gray-800 dark:text-white mb-1 truncate">{{ $product->product_name }}</h4>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ number_format($product->selling_price) }}</p>
                <a href="{{ route('showproduct', $product->id) }}">

                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition w-1/2">Quick
                        View</button>
                </a>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No products found in this subcategory.</p>
        @endforelse
    </div>




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



                $(document).on('click', '.wishlist-toggle', function() {
                    const button = $(this);
                    const productId = button.data('product-id');

                    $.ajax({
                        url: "{{ route('wishlist.toggle') }}",
                        method: "POST",
                        data: {
                            product_id: productId,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status === 'added') {
                                button.removeClass('text-gray-400').addClass('text-red-500');
                                toastr.success('Added to wishlist!');
                            } else if (response.status === 'removed') {
                                button.removeClass('text-red-500').addClass('text-gray-400');
                                toastr.success('Removed from wishlist!');
                            }
                        },
                        error: function() {
                            toastr.error('Something went wrong. Please try again.');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
