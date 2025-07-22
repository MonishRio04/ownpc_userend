<div id="loginOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center p-4">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-lg md:rounded-xl shadow-lg md:shadow-2xl w-full max-w-xs sm:max-w-sm md:max-w-md p-4 sm:p-5 md:p-6 relative">
    
        <button id="closeLoginModal"
            class="absolute -top-3 sm:-top-4 -right-3 sm:-right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-7 h-7 sm:w-8 sm:h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark text-sm sm:text-base"></i>
        </button>

        <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Log In</h2>

        <form method="POST" action="{{ route('custom.login') }}" class="space-y-3 sm:space-y-4">
            @csrf
            <input type="text" name="phone" placeholder="Phone Number" required
                class="w-full p-2 sm:p-3 text-sm sm:text-base bg-gray-200 rounded dark:bg-gray-900 dark:text-white" />
            <input type="password" name="password" placeholder="Password" required
                class="w-full p-2 sm:p-3 text-sm sm:text-base bg-gray-200 rounded dark:bg-gray-900 dark:text-white" />

            <button type="submit" class="w-full bg-orange-400 text-white py-2 text-sm sm:text-base rounded hover:bg-[#0B1D51] transition">
                Log In
            </button>
        </form>

        <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300 mt-3 sm:mt-4 text-center">
            Don't have an account?
            <button type="button" class="text-blue-600 hover:underline open-register">Register</button>
        </p>

        <div class="text-center mt-3 sm:mt-4 text-xs sm:text-sm text-gray-400 dark:text-gray-300">or</div>

        <div class="flex justify-center gap-3 sm:gap-4 mt-3 sm:mt-4 text-xl sm:text-2xl">
            <a href="#" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-blue-700 transition">
                <i class="fa-brands fa-facebook-f text-white text-sm sm:text-base"></i>
            </a>
            <a href="#" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#00CAFF] flex items-center justify-center hover:bg-sky-500 transition">
                <i class="fa-brands fa-twitter text-white text-sm sm:text-base"></i>
            </a>
            <a href="#" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#FF6363] flex items-center justify-center hover:bg-red-600 transition">
                <i class="fa-brands fa-google-plus-g text-white text-sm sm:text-base"></i>
            </a>
        </div>
    </div>
</div>