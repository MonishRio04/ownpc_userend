<div id="loginOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-xl shadow-2xl w-full max-w-md p-6 relative">

        <button id="closeLoginModal"
            class="absolute -top-4 -right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-8 h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark"></i>
        </button>


        <h2 class="text-2xl font-bold mb-6">Log In</h2>


        <form action="#" method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Username"
                class="w-full p-3  bg-gray-200 rounded focus:outline-none focus:ring-none dark:bg-gray-900 dark:text-white" />
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3  bg-gray-200 rounded focus:outline-none focus:ring-none dark:bg-gray-900 dark:text-white" />
            <button type="submit" class="w-full bg-orange-400 text-white py-2 rounded hover:bg-[#0B1D51]">Log
                in</button>

            <div class="flex items-center gap-2 mt-2">
                <input type="checkbox" id="remember" />
                <label for="remember" class="text-sm">Remember me?</label>
            </div>
        </form>

        <p class="text-sm text-gray-600 mt-4">
            Don't have an account?
            <button class="open-register text-blue-600 hover:underline">Register</button>

        </p>

        <div class="text-center mt-4 text-sm">(Or)</div>


        <div class="flex justify-center gap-4 mt-4 text-2xl">
            <a href="#"
                class="w-10 h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-accent transition">
                <i class="fa-brands fa-facebook-f text-white"></i>
            </a>
            <a href="#"
                class="w-10 h-10 rounded-full bg-[#00CAFF] flex items-center justify-center hover:bg-accent transition">
                <i class="fa-brands fa-twitter text-white"></i>
            </a>
            <a href="#"
                class="w-10 h-10 rounded-full bg-[#FF6363] flex items-center justify-center hover:bg-accent transition">
                <i class="fa-brands fa-google-plus-g text-white"></i>
            </a>

        </div>
    </div>
</div>
