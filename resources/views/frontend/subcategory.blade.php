@extends('layout.app')

@section('content')

<button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
<h1 class="text-2xl font-bold mb-4 text-center mt-10">{{ $subcategory->subcategory_name }}</h1>


<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-10 pb-10">
    @forelse($subcategory->products as $product)
        <div class="border rounded-lg p-4 shadow hover:shadow-lg transition bg-white dark:bg-gray-800">
           <img src="{{ asset($product->product_thambnail) }}"
     alt="{{ $product->product_name }}"
     class="w-full h-68 object-contain rounded mb-4 bg-white">


            <h3 class="font-semibold text-lg text-gray-800 dark:text-white">{{ $product->product_name }}</h3>

            <p class="text-orange-500 font-bold mt-2">₹{{ $product->selling_price }}</p>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-500">No products found in this subcategory.</p>
    @endforelse
</div>


    <div class="px-16">
        <p class="font-bold text-black dark:text-white text-2xl p-2 pt-12">Electronics:</p>
        <p class="p-2 text-black dark:text-gray-300">
            If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
            make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
            laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
            video and more.
        </p>

        <div class="flex justify-between gap-6 text-center mt-6 pb-12">
            <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                <h1 class="font-bold text-2xl p-2">
                    <i class="fa-solid fa-cart-shopping text-3xl p-2 font-bold text-orange-400"></i>Free Shipping
                </h1>
                <p>on orders over $100</p>
            </div>

            <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                <h1 class="font-bold text-2xl p-2">
                    <i class="fa-solid fa-truck-fast text-3xl p-2 font-bold text-orange-400"></i>Fast Delivery
                </h1>
                <p>World Wide</p>
            </div>

            <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
                <h1 class="font-bold text-2xl p-2">
                    <i class="fa-regular fa-thumbs-up text-3xl p-2 font-bold text-orange-400"></i>Big Choice
                </h1>
                <p>of Products</p>
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


