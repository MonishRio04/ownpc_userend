<div id="locationOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex justify-center items-center">
    <div class="bg-white dark:bg-gray-800 text-black dark:text-white rounded-xl shadow-2xl w-full max-w-md p-6 relative">

        <button id="closeLocationModal"
            class="absolute -top-4 -right-4 bg-white dark:bg-gray-700 text-black dark:text-white rounded-full w-8 h-8 flex items-center justify-center shadow">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <h2 class="text-lg font-bold flex items-center gap-2 mb-4">
            <i class="fa-solid fa-location-pin "></i> Please Select Your Location
        </h2>

        <select id="citySelect"
            class="w-full border border-gray-200 dark:border-gray-600  rounded p-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 dark:bg-gray-900 dark:text-white">
            <option value=""> Select City </option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Chennai">Chennai</option>
            <option value="Kolkata">Kolkata</option>
        </select>
    </div>
</div>
