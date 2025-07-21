<button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
    <i class="fa-solid fa-arrow-up-from-bracket"></i>
</button>

<div class="relative w-full h-[200px] md:h-[300px] lg:h-[400px] bg-cover bg-center flex items-center px-4 md:px-8 lg:px-16"
    style="background-image: url('{{ asset('images/review.png') }}');">
    <div class="z-10 max-w-xl text-black space-y-2 md:space-y-4">
        <p class="text-base md:text-lg">
            <span class="text-2xl md:text-3xl lg:text-4xl font-bold">Checkout</span> Page
        </p>
        <p class="text-sm md:text-base">
            <a href="/" class="text-orange-400 font-bold">HOME</a>
            <span class="mx-1 md:mx-2 text-white">
                <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
            </span>
            <span class="font-bold">Checkout</span>
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto p-4 sm:p-8 lg:p-16 space-y-6 md:space-y-12 text-black dark:text-white">
    <h2 class="text-xl md:text-2xl font-bold mb-2 md:mb-4">Your shopping cart contains:</h2>
    <div id="cartWrapper">
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-200 dark:border-gray-700">
                <thead class="bg-[#0B1D51] dark:bg-gray-800">
                    <tr class="text-left text-white">
                        <th class="p-2 md:p-3 border dark:border-gray-700">S.No</th>
                        <th class="p-2 md:p-3 border dark:border-gray-700">Product</th>
                        <th class="p-2 md:p-3 border dark:border-gray-700">Quantity</th>
                        <th class="p-2 md:p-3 border dark:border-gray-700">Product Name</th>
                        <th class="p-2 md:p-3 border dark:border-gray-700">Price</th>
                        <th class="p-2 md:p-3 border dark:border-gray-700">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr class="border-t dark:border-gray-700">
                            <td class="p-2 md:p-3">{{ $loop->iteration }}</td>
                            <td class="p-2 md:p-3">
                                <img src="{{ asset($item->options->image) }}" class="w-12 h-12 md:w-16 md:h-16" />
                            </td>
                            <td class="p-2 md:p-3">{{ $item->qty }}</td>
                            <td class="p-2 md:p-3">{{ $item->name }}</td>
                            <td class="p-2 md:p-3">₹{{ $item->price }}</td>
                            <td class="p-2 md:p-3">
                                <button type="button" class="remove-cart-item" data-rowid="{{ $item->rowId }}"
                                    title="Remove Item">
                                    <i class="fa-regular fa-circle-xmark text-xl md:text-2xl text-red-500 hover:text-red-700"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right space-y-1 md:space-y-2 mt-4 md:mt-6">
            <p class="text-lg md:text-xl font-bold text-orange-500 cart-total">
                Total: ₹{{ Cart::total() }}
            </p>
        </div>
    </div>
    <form action="{{ route('Payment') }}" method="get" onsubmit="return validateCheckoutForm();">
        @csrf

        <div class="bg-white dark:bg-gray-800 p-4 md:p-6 shadow rounded-xl space-y-4 md:space-y-6">
            <h2 class="text-xl md:text-2xl font-bold">Add Your Details</h2>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-3 md:gap-4">
                <input type="text" name="name" placeholder="Full Name" required
                    class="w-full px-3 py-1 md:px-4 md:py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none">

                <input type="tel" name="phone" placeholder="Mobile Number" required
                    class="w-full px-3 py-1 md:px-4 md:py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none">

                <input type="text" name="landmark" placeholder="Landmark" required
                    class="w-full px-3 py-1 md:px-4 md:py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none">

                <input type="text" name="city" placeholder="Town / City" required
                    class="w-full px-3 py-1 md:px-4 md:py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded focus:outline-none">

                <select name="address_type" required
                    class="w-full px-3 py-1 md:px-4 md:py-2 bg-gray-100 dark:bg-gray-700 dark:text-white rounded">
                    <option value="">Select Address Type</option>
                    <option value="home">Home</option>
                    <option value="office">Office</option>
                </select>
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center gap-1 md:gap-2 hover:bg-[#0B1D51] text-white px-4 py-1 md:px-6 md:py-2 rounded-md text-base md:text-lg font-semibold bg-orange-400 dark:hover:bg-orange-500">
                    MAKE A PAYMENT
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </form>
</div>