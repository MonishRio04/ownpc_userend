
<div class=" dark:bg-gray-800">
    <div class="container mx-auto py-3 px-16 flex justify-between items-center">
        <p class="text-sm font-medium">WELCOME TO OUR SHOP!</p>
        <div class="flex items-center space-x-4 text-sm">
  
<div class="relative" id="locationDropdown">
  <button id="locationToggle" type="button" class="group hover:text-orange-500 flex items-center gap-1">
    <i class="fa-solid fa-location-pin text-gray-500 group-hover:text-orange-500"></i>
    <span id="selectedLocationText">Select Location</span>
  </button>
</div>


            <a href="javascript:void(0);" id="loginToggle" class="group hover:text-orange-500 flex items-center gap-1">
  <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i>
  Log In
</a>

            <a href="#"  id="registerToggle" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-right-from-bracket text-gray-500 group-hover:text-orange-500"></i>
                Register
            </a>
        </div>
    </div>
</div>


<hr>
<div class="container mx-auto py-8 px-16 flex flex-wrap items-center justify-between space-y-4 md:space-y-0">

    <h1 class="text-3xl font-bold flex items-center space-x-1">
        <a href="#" class="flex items-center space-x-1">
            <span class="text-orange-400 text-5xl">O</span><span class="text-gray-800 dark:text-white">wn</span>
            <span class="text-orange-400 text-5xl">P</span><span class="text-gray-800 dark:text-white">c</span>
        </a>
    </h1>


    <form method="post" action="" class="flex flex-grow max-w-2xl h-12">
        <input type="search" name="search" placeholder="Search for products, brands and more" required
            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400" />
        <button type="submit"
            class="bg-orange-400 text-white px-8 py-2 rounded-r-md  transition">
            <i class="fa-solid fa-magnifying-glass hover:text-black text-xl font-bold"></i>
        </button>
    </form>

 
    <div class="flex items-center space-x-4 text-sm gap-4 pl-6">
 
        <button id="toggleDark" aria-label="Toggle dark mode"
            class="text-2xl text-gray-700 dark:text-gray-300  transition">
            <i class="fa-solid fa-moon dark:hidden"></i>
            <i class="fa-solid fa-sun hidden dark:inline"></i>
        </button>

        <a href="#" class="flex items-center gap-1 text-2xl text-gray-700 dark:text-white">
            <i class="fa-regular fa-heart"></i>
        </a>

   
        <button id="cartToggle" type="button" class="flex items-center gap-1 text-lg px-3 py-1 rounded transition">
  <i class="fa-solid fa-cart-shopping"></i> Cart
</button>

    </div>
</div>


<div class="w-full sticky top-0 z-50 bg-[#0B1D51] text-white shadow-md">
    <div class="container mx-auto px-10 py-5">
        <nav class="flex flex-wrap items-center justify-between gap-4 text-sm font-medium">

        
            <select name="categories"
                class="bg-[#0B1D51] text-white px-10 py-3 border rounded focus:outline-none focus:ring-1">
                <option disabled selected>All Categories</option>
                <option>Television</option>
                <option>Headphone</option>
                <option>Computer</option>
                <option>Mobile</option>
                <option>Appliances</option>
            </select>

            <a href="/" class="{{ Request::is('/') ? 'text-orange-500 font-bold' : 'text-white' }} hover:text-orange-400 font-bold">HOME</a>

       
            <div class="relative inline-block group">
                <a href="{{ route('Electronics') }}"
                    class="{{ request()->routeIs('Electronics') ? 'text-orange-500 font-bold' : 'text-white' }} bg-[#0B1D51] px-3 py-1 rounded hover:text-orange-400 font-bold focus:outline-none focus:ring-1 focus:ring-orange-400">
                    ELECTRONICS <i class="fa-solid fa-caret-down"></i> 
                </a>
                <ul class="absolute left-0 mt-2 w-48 bg-white text-black dark:bg-gray-800 dark:text-white rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">All Computers</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">Laptops</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">Monitors</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">Printers</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">Tablets</a></li>
                </ul>
            </div>

          
            <div class="relative inline-block group">
                <a href="{{ route('Appliances') }}"
                    class="{{ request()->routeIs('Appliances') ? 'text-orange-500 font-bold' : 'text-white' }} bg-[#0B1D51] px-3 py-1 rounded hover:text-orange-400 font-bold focus:outline-none focus:ring-1 focus:ring-orange-400">
                    APPLIANCES <i class="fa-solid fa-caret-down"></i> 
                </a>
                <ul class="absolute left-0 mt-2 w-48 bg-white text-black dark:bg-gray-800 dark:text-white rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Appliances') }}">Fridge</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Appliances') }}">Washing Machine</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Appliances') }}">Oven</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Appliances') }}">Heaters</a></li>
                </ul>
            </div>

        
            <a href="{{ route('AboutUs') }}"
                class="{{ request()->routeIs('AboutUs') ? 'text-orange-500 font-bold' : 'text-white' }} hover:text-orange-400 font-bold">
                ABOUT US
            </a>

            <a href="{{ route('Electronics') }}" class="hover:text-orange-400 font-bold">
                NEW ARRIVALS
            </a>

    
            <div class="relative inline-block group">
                <a href="#"
                    class="{{ request()->routeIs('Checkout') ? 'text-orange-500 font-bold' : 'text-white' }} bg-[#0B1D51] font-bold px-3 py-1 rounded hover:text-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
                    PAGES <i class="fa-solid fa-caret-down"></i> 
                </a>
                <ul class="absolute left-0 mt-2 w-48 bg-white text-black dark:bg-gray-800 dark:text-white rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Electronics') }}">Product 1</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Appliances') }}">Product 2</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('SingleProduct1') }}">Single Product 1</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('SingleProduct2') }}">Single Product 2</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Checkout') }}">Checkout</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Payment') }}">Payment Page</a></li>
                    <li class="px-4 py-2 hover:text-orange-400"><a href="{{ route('Terms') }}">Terms of Use</a></li>
                </ul>
            </div>

            <a href="{{ route('ContactUs') }}"
                class="{{ request()->routeIs('ContactUs') ? 'text-orange-500 font-bold' : 'text-white' }} hover:text-orange-400 font-bold">
                CONTACT US
            </a>

        </nav>
    </div>
</div>

