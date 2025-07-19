<div id="cartOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-lg shadow-lg max-w-2xl w-full p-6 relative">

        <button id="closeCartModal"
            class="absolute -top-4 -right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-8 h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark"></i>
        </button>


        <ul class="space-y-4 max-h-[300px] overflow-auto">
            @forelse(Cart::content() as $item)
                <li class="flex justify-between items-center border-b pb-2">
                    <div>
                        <p class="font-semibold">{{ $item->name }}</p>
                        @if (isset($item->options->original_price) && $item->price < $item->options->original_price)
                            <small class="text-gray-500">Discount:
                                ₹{{ $item->options->original_price - $item->price }}</small>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="number" value="{{ $item->qty }}"
                            class="w-12 px-2 py-1 border rounded bg-white dark:bg-gray-700" readonly />
                        <p class="font-semibold">₹{{ $item->price * $item->qty }}</p>
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500 dark:text-gray-300">Your cart is empty.</li>
            @endforelse
        </ul>


        <div class="mt-4 text-right flex justify-between items-center">
            <p class="text-lg font-bold">Total: <span>₹{{ Cart::total() }}</span></p>
            <a href="{{ route('checkout') }}" class="bg-orange-400 hover:bg-orange-500 text-white px-4 py-2 rounded">
                Checkout Now
            </a>
        </div>
    </div>
</div>
