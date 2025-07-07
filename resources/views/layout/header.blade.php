 <p class="text-sm font-medium">WELCOME TO OUR SHOP!</p>

        <div class="flex items-center space-x-4 text-sm">

            <a href="#" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-location-pin text-gray-500 group-hover:text-orange-500"></i>
                Select Location
            </a>

            <a href="#" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i>
                Log In
            </a>

            <a href="#" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-right-from-bracket text-gray-500 group-hover:text-orange-500"></i>
                Register
            </a>

        </div>
    </div>

    <hr>
    <div class="container mx-auto py-8 px-19 flex items-center space-x-6">

        <h1 class="text-3xl font-bold">
            <a href="#" class="flex items-center space-x-1">
                <span class="text-orange-400 text-5xl">O</span><span class="text-gray-800">wn</span>
                <span class="text-orange-400 text-5xl">P</span><span class="text-gray-800">c</span>
            </a>
        </h1>

        </h1>

        <form method="post" action="" class="flex flex-grow max-w-2xl h-12">
            <input type="search"name="search" placeholder="Search for products, brands and more" required
                class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400" />
            <button
                type="submit"class="bg-orange-400 text-white px-8 py-2 rounded-r-md hover:bg-orange-600 transition">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="flex items-center space-x-4 text-sm gap-4 pl-6">
            <label class="flex items-center gap-4 cursor-pointer">
                <input type="hidden" name="dark" class="accent-orange-500 w-4 h-4">
                <span class="text-2xl"><i class="fa-solid fa-moon"></i></span>
            </label>

            <a href="#" class="flex items-center gap-1 text-2xl text-gray-700 hover:text-orange-500 pl-4">
                <i class="fa-regular fa-heart"></i>

            </a>

            <button type="button"
                class="flex items-center gap-1  text-lg px-3 py-1 rounded  transition">
                <i class="fa-solid fa-cart-shopping"></i>
                Cart
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

      <a href="/" class="hover:text-orange-400 font-bold">HOME</a>

      <div class="relative inline-block group">
        <a href="#"
          class="bg-[#0B1D51] font-bold text-white px-3 py-1 rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
          ELECTRONICS
        </a>
        <ul
          class="absolute left-0 mt-2 w-48 bg-white text-black rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Electronics')}}">All Computers</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Electronics')}}">Laptops</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Electronics')}}">Monitors</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Electronics')}}">Printers</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Electronics')}}">Tablets</a></li>
        </ul>
      </div>

      <div class="relative inline-block group">
        <a href="#"
          class="bg-[#0B1D51] font-bold text-white px-3 py-1 rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
          APPLIANCES
        </a>
        <ul
          class="absolute left-0 mt-2 w-48 bg-white text-black rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Appliances')}}">Fridge</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Appliances')}}">Washing Machine</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Appliances')}}">Oven</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Appliances')}}">Heaters</a></li>
        </ul>
      </div>

      <a href="{{route('AboutUs')}}" class="hover:text-orange-400 font-bold">ABOUT US</a>

      <a href="{{route('Electronics')}}" class="hover:text-orange-400 font-bold">NEW ARRIVALS</a>

      <div class="relative inline-block group">
        <a href="#"
          class="bg-[#0B1D51] font-bold text-white px-3 py-1 rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
          PAGES
        </a>
        <ul
          class="absolute left-0 mt-2 w-48 bg-white text-black rounded-xl shadow-xl origin-top scale-y-0 opacity-0 invisible group-hover:scale-y-100 group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-out z-50">
          <li class="px-4 py-2 hover:text-orange-400"><a href="{{route('Checkout')}}">Checkout</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="#">Terms of Use</a></li>
          <li class="px-4 py-2 hover:text-orange-400"><a href="#">Privacy Policy</a></li>
        </ul>
      </div>

      <a href="{{route('ContactUs')}}" class="hover:text-orange-400 font-bold">CONTACT US</a>
    </nav>
  </div>
</div>