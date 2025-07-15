@extends('layout.app')

@section('content')
    <div id="mainContent">
       
        <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
            <i class="fa-solid fa-arrow-up-from-bracket"></i>
        </button>

        <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
            style="background-image: url('{{ asset('images/3slider.jpg') }}');">
            <div class="z-10 max-w-xl text-black dark:text-white space-y-4">
                <p class="text-xl">
                    <span class="text-4xl font-bold">Product </span> single page
                </p>
                <p>
                    <a href="/" class="text-orange-400 font-bold">HOME</a>
                    <span class="mx-2 text-black dark:text-gray-300">
                        <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                    </span>
                    <span class="font-bold">{{ $product->product_name }}</span>
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8">
       
                <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">
                    <div
                        class="overflow-hidden rounded-xl h-96 mb-4 flex justify-center items-center bg-white dark:bg-gray-900">
                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}"
                            class="max-h-full max-w-full object-contain rounded-xl" />
                    </div>

                    <div class="grid grid-cols-3 gap-2 mt-4">
                        @for ($i = 1; $i <= 3; $i++)
                            <div
                                class="bg-white dark:bg-gray-900 h-24 flex justify-center items-center rounded-xl overflow-hidden">
                                <img src="{{ asset($product->product_thambnail) }}" alt="Thumbnail {{ $i }}"
                                    class="h-full object-contain cursor-pointer">
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->product_name }}</h1>

                    <div class="flex items-center mb-4 space-x-3">
                        <span
                            class="text-3xl font-bold text-black dark:text-white">₹{{ $product->discount_price ?? $product->selling_price }}</span>
                        @if ($product->discount_price)
                            <span
                                class="text-xl line-through text-gray-500 dark:text-gray-400 ml-4">₹{{ $product->selling_price }}</span>
                        @endif
                        <span class="text-xl font-medium text-black dark:text-white">Free delivery</span>
                    </div>

                    <div class="space-y-1 text-gray-700 dark:text-gray-300">
                        {!! $product->short_descp !!}
                    </div>

                    <div class="py-2">
                        <p class="text-xl font-bold dark:text-white">
                            <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                            Product Features
                        </p>
                        <ul class="list-disc pl-6 space-y-1 text-gray-700 dark:text-gray-300">
                            {!! $product->long_descp !!}
                        </ul>
                    </div>

                    <div class="py-2">
                        <p class="text-xl font-bold dark:text-white">
                            <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                            Payment Options: Net banking, Credit/Debit cards
                        </p>
                    </div>

                    <button type="button" class="add-to-cart-btn bg-orange-400 text-white px-4 py-2 rounded"
                        data-id="{{ $product->id }}">
                        <i class="fa fa-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>

        </div>
    @endsection
    @push('scripts')
        <script>
            $(document).ready(function() {
                const goTopBtn = $('#goTopBtn');

                $(window).scroll(function() {
                    goTopBtn.toggleClass('hidden', $(window).scrollTop() <= 300);
                });

                goTopBtn.click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'slow');
                });

                $('html').css('overflow-y', 'scroll');
                $('body').css('overflow-y', 'scroll');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $('.add-to-cart-btn').click(function(e) {
                    e.preventDefault();

                    const productId = $(this).data('id');
                    const mainContent = $('#mainContent');
                    const originalHeight = mainContent.height();

                    mainContent.css('min-height', originalHeight + 'px');

                    $.ajax({
                        url: "{{ route('ajax.add.to.cart') }}",
                        method: "POST",
                        data: {
                            product_id: productId,
                            quantity: 1
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Product added to cart.',
                                    timer: 1200,
                                    showConfirmButton: false,
                                    scrollbarPadding: false,
                                    backdrop: true,
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        document.documentElement.style.overflowY =
                                            'scroll';
                                        document.body.style.overflowY = 'scroll';
                                    },
                                    didClose: () => {
                                        $.ajax({
                                            url: "{{ route('checkout') }}",
                                            type: 'GET',
                                            success: function(data) {
                                                mainContent.fadeOut(100,
                                                    function() {
                                                        $(this).html(
                                                                data)
                                                            .fadeIn(
                                                            200);
                                                        window.scrollTo(
                                                            0, 0
                                                            ); // ✅ Jump instantly to top
                                                        mainContent.css(
                                                            'min-height',
                                                            '');
                                                    });
                                            },
                                            error: function() {
                                                alert(
                                                    'Failed to load checkout.');
                                                mainContent.css(
                                                    'min-height', '');
                                            }
                                        });
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('Error adding item to cart');
                            mainContent.css('min-height', '');
                        }
                    });
                });

                $(document).on('click', '.remove-cart-item', function(e) {
                    e.preventDefault();
                    const rowId = $(this).data('rowid');

                    $.ajax({
                        url: "{{ route('ajax.cart.remove') }}",
                        method: 'POST',
                        data: {
                            rowId: rowId
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                $('button[data-rowid="' + rowId + '"]').closest('tr').remove();
                                $('.cart-total').text('Total: ₹' + response.total);

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Removed!',
                                    text: response.message,
                                    timer: 1200,
                                    showConfirmButton: false,
                                    scrollbarPadding: false,
                                    didOpen: () => {
                                        document.documentElement.style.overflowY =
                                            'scroll';
                                        document.body.style.overflowY = 'scroll';
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr);
                            alert('Failed to remove item');
                        }
                    });
                });
            });
        </script>
    @endpush
