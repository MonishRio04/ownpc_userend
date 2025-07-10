@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
        style="background-image: url('{{ asset('images/pc.png') }}');">
        <div class="z-10 max-w-xl text-white dark:text-white space-y-4">
            <p class="text-lg">
                <span class="text-4xl font-bold">Checkout</span> Page
            </p>
            <p>
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">CHECKOUT</span>
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto p-16 space-y-12 text-black dark:text-white">

        <h2 class="text-2xl font-bold mb-4">Your shopping cart contains:</h2>

        <table class="w-full table-auto border border-gray-200 dark:border-gray-700">
            <thead class="bg-[#0B1D51] dark:bg-gray-800">
                <tr class="text-left text-white">
                    <th class="p-3 border dark:border-gray-700">S.No</th>
                    <th class="p-3 border dark:border-gray-700">Product</th>
                    <th class="p-3 border dark:border-gray-700">Quantity</th>
                    <th class="p-3 border dark:border-gray-700">Product Name</th>
                    <th class="p-3 border dark:border-gray-700">Price</th>
                    <th class="p-3 border dark:border-gray-700">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-3 border dark:border-gray-700">1</td>
                    <td class="p-3 border text-center dark:border-gray-700">
                        <img src="{{ asset('images/pc2.jpg') }}" alt="Product" class="w-16 h-16 rounded mx-auto mb-1">
                    </td>
                    <td class="p-3 border dark:border-gray-700">
                        <input type="number" value="1" min="1"
                            class="w-16 border px-2 py-1 rounded dark:bg-gray-700 dark:text-white">
                    </td>
                    <td class="p-3 border dark:border-gray-700">Gaming laptop</td>
                    <td class="p-3 border dark:border-gray-700">$1200</td>
                    <td class="p-3 border text-center cursor-pointer hover:scale-110 transition dark:border-gray-700">
                        <i class="fa-regular fa-circle-xmark text-3xl font-bold"></i>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="bg-white dark:bg-gray-800 p-6  shadow rounded-xl space-y-6">
            <h2 class="text-2xl font-bold">Add a new Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <input type="text" placeholder="Full Name"
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none focus:ring-0 focus:bg-gray-200 dark:focus:bg-gray-600">
                <input type="tel" placeholder="Mobile Number"
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none focus:ring-0 focus:bg-gray-200 dark:focus:bg-gray-600">
                <input type="text" placeholder="Landmark"
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none focus:ring-0 focus:bg-gray-200 dark:focus:bg-gray-600">
                <input type="text" placeholder="Town / City"
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none focus:ring-0 focus:bg-gray-200 dark:focus:bg-gray-600">
                <select
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none focus:ring-0 focus:bg-gray-200 dark:focus:bg-gray-600">
                    <option value="">Select Address Type</option>
                    <option value="home">Home</option>
                    <option value="office">Office</option>
                </select>
            </div>

            <div>
                <button
                    class="font-semibold px-6 py-2 border rounded hover:border-orange-400 transition dark:text-white dark:border-gray-500 dark:hover:border-orange-400">
                    Deliver to This Address
                </button>
            </div>

            <div>
                <a href="{{ route('Payment') }}"
                    class="inline-flex items-center gap-2 whitespace-nowrap hover:bg-[#0B1D51] text-white px-6 py-2 rounded-md text-lg font-semibold bg-orange-400 dark:hover:bg-orange-500">
                    MAKE A PAYMENT
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="relative w-full h-[500px] p-12 bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/logo.jpg') }}');">
        <div class="flex h-full p-18">
            <div class="w-1/2 flex justify-center items-center ">
                <img src="{{ asset('images/pc.png') }}" alt="PC 1" class="w-[90%] h-auto rounded shadow-lg" />
            </div>
            <div class="w-1/2 flex justify-center items-center">
                <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2" class="w-[90%] h-auto rounded shadow-lg" />
            </div>
        </div>
    </div>

    <div class="px-16 text-black dark:text-white">
        <p class="font-bold text-2xl p-2 pt-12">Electronics:</p>
        <p class="p-2 dark:text-gray-300">
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
