<div id="registerOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8 relative dark:bg-gray-900">
    <button id="closeRegisterModal" class="absolute top-3 right-3 text-2xl font-bold text-gray-700 dark:text-white">
      &times;
    </button>

    <h2 class="text-2xl font-bold mb-6 dark:text-white">Register</h2>

    <form>
      <input type="text" placeholder="Your Name" class="w-full mb-4 px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">
      <input type="email" placeholder="Email" class="w-full mb-4 px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">
      <input type="password" placeholder="Password" class="w-full mb-4 px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">
      <input type="password" placeholder="Confirm Password" class="w-full mb-4 px-4 py-2 border rounded dark:bg-gray-800 dark:text-white">

      <label class="flex items-center space-x-2 mb-4 text-sm dark:text-white">
        <input type="checkbox">
        <span>I Accept to the Terms & Conditions</span>
      </label>

      <button type="submit" class="w-full bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold py-2 rounded">
        Register
      </button>
    </form>

    <div class="mt-6 text-center text-gray-500 dark:text-gray-300">or</div>

    <div class="flex justify-center space-x-4 mt-4">
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
