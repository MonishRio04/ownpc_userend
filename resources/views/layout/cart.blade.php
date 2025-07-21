<div id="cartOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center p-4 sm:p-6">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-lg shadow-lg max-w-xs sm:max-w-md md:max-w-2xl w-full p-4 sm:p-6 relative">
        <button id="closeCartModal"
            class="absolute -top-3 -right-3 sm:-top-4 sm:-right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-7 h-7 sm:w-8 sm:h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark text-sm sm:text-base"></i>
        </button>
        <div id="cartOverlayContent">
            @include('layout.cart_html', ['cart' => Cart::content(), 'total' => Cart::total()])
        </div>
    </div>
</div>