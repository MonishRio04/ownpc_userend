<div id="locationOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center p-4 sm:p-6">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-xl shadow-2xl w-full max-w-xs sm:max-w-sm md:max-w-md p-4 sm:p-6 relative">

        <button id="closeLocationModal"
            class="absolute -top-3 -right-3 sm:-top-4 sm:-right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-7 h-7 sm:w-8 sm:h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark text-sm sm:text-base"></i>
        </button>

        <h2 class="text-base sm:text-lg font-bold flex items-center gap-1 sm:gap-2 mb-3 sm:mb-4">
            <i class="fa-solid fa-location-pin text-sm sm:text-base"></i> Please Select Your Location
        </h2>

        <select id="citySelect"
            class="w-full border border-gray-200 dark:border-gray-600 rounded p-2 sm:p-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 dark:bg-gray-900 dark:text-white">
            <option value=""> Select City </option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Chennai">Chennai</option>
            <option value="Kolkata">Kolkata</option>
        </select>
    </div>
</div>