@extends('layout.app')

@section('content')
    <div id="mainContent">
        <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
            <i class="fa-solid fa-arrow-up-from-bracket"></i>
        </button>

        <div class="relative w-full h-[300px] sm:h-[350px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
            style="background-image: url('{{ asset('images/3slider.jpg') }}');">
            <div class="z-10 max-w-xl text-black dark:text-white space-y-2 sm:space-y-4">
                <p class="text-lg sm:text-xl">
                    <span class="text-2xl sm:text-3xl md:text-4xl font-bold">Product </span> single page
                </p>
                <p class="text-sm sm:text-base">
                    <a href="/" class="text-orange-400 font-bold">HOME</a>
                    <span class="mx-1 sm:mx-2 text-black dark:text-gray-300">
                        <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                    </span>
                    <span class="font-bold">{{ $product->product_name }}</span>
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
           <div class="flex flex-col lg:flex-row gap-6 sm:gap-8">
    <div id="productSlider" class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-4 sm:p-6 relative">
        <div class="relative h-64 sm:h-80 md:h-96 mb-4 flex justify-center items-center bg-white dark:bg-gray-900 overflow-hidden rounded-xl">
            @for ($i = 1; $i <= 3; $i++)
                <img src="{{ asset($product->product_thambnail) }}"
                    alt="{{ $product->product_name }} {{ $i }}"
                    class="slide max-h-full max-w-full object-contain absolute transition-opacity duration-500 ease-in-out mx-auto"
                    style="opacity: 0;" />
            @endfor
        </div>

        <div class="grid grid-cols-3 gap-2 mt-4">
            @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white dark:bg-gray-900 h-20 sm:h-24 flex justify-center items-center rounded-xl overflow-hidden">
                    <img src="{{ asset($product->product_thambnail) }}" alt="Thumbnail {{ $i }}"
                        class="h-full object-contain cursor-pointer">
                </div>
            @endfor
        </div>

        <div class="flex justify-center gap-2 mt-4">
            @for ($i = 0; $i < 3; $i++)
                <span class="dot w-3 h-3 bg-gray-400 rounded-full cursor-pointer transition-all"></span>
            @endfor
        </div>
    </div>

                <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-4 sm:p-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->product_name }}</h1>

                    <div class="flex flex-wrap items-center mb-4 gap-2 sm:gap-3">
                        <span class="text-2xl sm:text-3xl font-bold text-black dark:text-white">
                            ₹{{ $product->discount_price ?? $product->selling_price }}
                        </span>
                        @if ($product->discount_price)
                            <span class="text-lg sm:text-xl line-through text-gray-500 dark:text-gray-400">
                                ₹{{ $product->selling_price }}
                            </span>
                        @endif
                        <span class="text-lg sm:text-xl font-medium text-black dark:text-white">Free delivery</span>
                    </div>

                    <div class="space-y-1 text-gray-700 dark:text-gray-300 text-sm sm:text-base">
                        {!! $product->short_descp !!}
                    </div>

                    <div class="py-2">
                        <p class="text-lg sm:text-xl font-bold dark:text-white">
                            <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                            Product Features
                        </p>
                        <ul class="list-disc pl-6 space-y-1 text-gray-700 dark:text-gray-300 text-sm sm:text-base">
                            {!! $product->long_descp !!}
                        </ul>
                    </div>

                    <div class="py-2">
                        <p class="text-lg sm:text-xl font-bold dark:text-white">
                            <i class="fa-solid fa-arrow-right text-orange-400 p-2 font-bold"></i>
                            Payment Options: Net banking, Credit/Debit cards
                        </p>
                    </div>

                                      <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-lg p-4 z-40">
                        <button type="button"
                            class="add-to-cart-btn w-full bg-orange-400  text-white py-3 rounded text-lg"
                            data-id="{{ $product->id }}">
                            <i class="fa fa-cart-plus"></i> Add to Cart -
                            ₹{{ $product->discount_price ?? $product->selling_price }}
                        </button>
                    </div>

                    <button type="button"
                        class="hidden lg:block add-to-cart-btn bg-orange-400 text-white px-6 py-3 rounded text-lg w-full sm:w-auto"
                        data-id="{{ $product->id }}">
                        <i class="fa fa-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            const goTopBtn = $('#goTopBtn');

            $(window).scroll(function () {
                goTopBtn.toggleClass('hidden', $(window).scrollTop() <= 300);
            });

            goTopBtn.click(function () {
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });

           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-to-cart-btn').click(function (e) {
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
                    success: function (response) {
                        if (response.status === 'success') {
                            toastr.success('Product added to cart.');

                            $.ajax({
                                url: "{{ route('checkout') }}",
                                type: 'GET',
                                success: function (data) {
                                    mainContent.fadeOut(100, function () {
                                        $(this).html(data).fadeIn(200);
                                        window.scrollTo(0, 0);
                                        mainContent.css('min-height', '');
                                    });
                                },
                                error: function () {
                                    toastr.error('Failed to load checkout.');
                                    mainContent.css('min-height', '');
                                }
                            });
                        } else {
                            toastr.error('Something went wrong.');
                            mainContent.css('min-height', '');
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        toastr.error('Error adding item to cart.');
                        mainContent.css('min-height', '');
                    }
                });
            });
        });
    </script>
@endpush
