<div id="registerOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8 relative dark:bg-gray-900 dark:text-white">
 
        <button id="closeRegisterModal"
            class="absolute top-3 right-3 text-2xl font-bold text-gray-700 dark:text-white">
            &times;
        </button>

        <h2 class="text-2xl font-bold mb-6">Register</h2>

        <form method="POST" action="{{ route('custom.register') }}" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required
                class="w-full px-4 py-2 bg-gray-200 rounded dark:bg-gray-800 dark:text-white">

            <input type="text" name="phone" placeholder="Phone Number" required
                class="w-full px-4 py-2 bg-gray-200 rounded dark:bg-gray-800 dark:text-white">

            <input type="email" name="email" placeholder="Email (optional)"
                class="w-full px-4 py-2 bg-gray-200 rounded dark:bg-gray-800 dark:text-white">

            <input type="password" name="password" placeholder="Password" required
                class="w-full px-4 py-2 bg-gray-200 rounded dark:bg-gray-800 dark:text-white">

            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                class="w-full px-4 py-2 bg-gray-200 rounded dark:bg-gray-800 dark:text-white">

            <label class="flex items-center space-x-2 text-sm dark:text-white">
                <input type="checkbox" required>
                <span>I Accept the Terms & Conditions</span>
            </label>

            <button type="submit"
                class="w-full bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold py-2 rounded transition">
                Register
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-400 dark:text-gray-300">or</div>

        <div class="flex justify-center gap-4 mt-4 text-xl">
            <button class="bg-blue-600 hover:bg-blue-700 text-white w-10 h-10 rounded-full flex items-center justify-center">
                <i class="fab fa-facebook-f"></i>
            </button>
            <button class="bg-sky-400 hover:bg-sky-500 text-white w-10 h-10 rounded-full flex items-center justify-center">
                <i class="fab fa-twitter"></i>
            </button>
            <button class="bg-red-600 hover:bg-red-700 text-white w-10 h-10 rounded-full flex items-center justify-center">
                <i class="fab fa-google"></i>
            </button>
        </div>
    </div>
</div>
