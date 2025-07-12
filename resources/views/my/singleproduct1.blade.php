@extends('layout.app')

@section('content')
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
                <div class="overflow-hidden rounded-xl h-96 mb-4 flex justify-center items-center bg-white dark:bg-gray-900">
    <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}"
        class="max-h-full max-w-full object-contain rounded-xl" />
</div>

               <div class="grid grid-cols-3 gap-2 mt-4">
    <div class="bg-white dark:bg-gray-900 h-24 flex justify-center items-center rounded-xl overflow-hidden">
        <img src="{{ asset($product->product_thambnail) }}" alt="Thumbnail 1"
             class="h-full object-contain cursor-pointer">
    </div>
    <div class="bg-white dark:bg-gray-900 h-24 flex justify-center items-center rounded-xl overflow-hidden">
        <img src="{{ asset($product->product_thambnail) }}" alt="Thumbnail 2"
             class="h-full object-contain cursor-pointer">
    </div>
    <div class="bg-white dark:bg-gray-900 h-24 flex justify-center items-center rounded-xl overflow-hidden">
        <img src="{{ asset($product->product_thambnail) }}" alt="Thumbnail 3"
             class="h-full object-contain cursor-pointer">
    </div>
</div>

            </div>

            <div class="lg:w-1/2 bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->product_name }}</h1>

                <div class="flex items-center mb-4 space-x-3">
                    <span class="text-3xl font-bold text-black dark:text-white">₹{{ $product->discount_price ?? $product->selling_price }}</span>
                    @if($product->discount_price)
                        <span class="text-xl line-through text-gray-500 dark:text-gray-400 ml-4">₹{{ $product->selling_price }}</span>
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

                <button class="w-54 bg-orange-400 hover:bg-[#0B1D51] text-white font-bold py-3 px-3 rounded-lg transition duration-300 mb-4">
                    ADD TO CART
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const goTopBtn = document.getElementById('goTopBtn');
            window.addEventListener('scroll', () => {
                goTopBtn.classList.toggle('hidden', window.scrollY <= 300);
            });
            goTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        </script>
    @endpush
@endsection
