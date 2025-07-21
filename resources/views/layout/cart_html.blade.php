<ul class="space-y-3 sm:space-y-4 max-h-[200px] sm:max-h-[300px] overflow-auto">
    @forelse(Cart::content() as $item)
        <li class="flex justify-between items-center border-b pb-1 sm:pb-2">
            <div>
                <p class="font-semibold text-sm sm:text-base">{{ $item->name }}</p>
                @if (isset($item->options->original_price) && $item->price < $item->options->original_price)
                    <small class="text-gray-500 text-xs sm:text-sm">Discount: ₹{{ $item->options->original_price - $item->price }}</small>
                @endif
            </div>
            <div class="flex items-center gap-1 sm:gap-2">
                <input type="number" value="{{ $item->qty }}" class="w-10 sm:w-12 px-1 sm:px-2 py-0.5 sm:py-1 border rounded bg-white dark:bg-gray-700 text-sm sm:text-base" readonly />
                <p class="font-semibold text-sm sm:text-base">₹{{ $item->price * $item->qty }}</p>
            </div>
        </li>
    @empty
        <li class="text-center text-gray-500 dark:text-gray-300 text-sm sm:text-base">Your cart is empty.</li>
    @endforelse
</ul>

<div class="mt-3 sm:mt-4 text-right flex justify-between items-center">
    <p class="text-base sm:text-lg font-bold">Total: <span>₹{{ Cart::total() }}</span></p>
    <a href="{{ route('checkout') }}" class="bg-orange-400 hover:bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base">
        Checkout Now
    </a>
</div>