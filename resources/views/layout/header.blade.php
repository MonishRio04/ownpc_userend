<div class=" dark:bg-gray-800">
    <div class="container mx-auto text-gray-500 py-3 px-16 flex justify-between items-center">
        <p class="text-sm font-medium">WELCOME TO OUR SHOP!</p>
        <div class="flex items-center space-x-4 text-sm">

            <div class="relative" id="locationDropdown">
                <button id="locationToggle" type="button"
                    class="group hover:text-orange-500 text-sm flex items-center gap-1">
                    <i class="fa-solid fa-location-pin text-gray-400 group-hover:text-orange-500"></i>
                    <span id="selectedLocationText">Select Location</span>
                </button>
            </div>


            <a href="#" id="loginToggle" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i>
                Log In
            </a>

            <a href="#" id="registerToggle" class="group hover:text-orange-500 flex items-center gap-1">
                <i class="fa-solid fa-right-from-bracket text-gray-500 group-hover:text-orange-500"></i>
                Register
            </a>
        </div>
    </div>
</div>


<hr>
<div class="container mx-auto py-8 px-16 flex flex-wrap items-center justify-between space-y-4 md:space-y-0">

    <h1 class="text-4xl font-bold flex items-center space-x-1">
        <a href="#" class="flex items-center space-x-1">
            <span class="text-orange-400 text-5xl">O</span><span class="text-gray-800 dark:text-white">wn</span>
            <span class="text-orange-400 text-5xl">P</span><span class="text-gray-800 dark:text-white">c</span>
        </a>
    </h1>


    <form method="post" action="" class="flex flex-grow max-w-2xl h-12">
        <input type="search" name="search" placeholder="Search for products, brands and more" required
            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none  focus:ring-none" />
        <button type="submit" class="bg-orange-400 text-white px-8 py-2 rounded-r-md  transition">
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
        <nav class="flex flex-wrap items-center justify-between gap-4 text-base font-light">

            <div class="mr-6 font-medium">
                <select name="categories"
                    class="bg-[#0B1D51] text-white px-10 py-3 border rounded focus:outline-none focus:ring-1">
                    <option disabled selected>All Categories</option>
                    <option>Television</option>
                    <option>Headphone</option>
                    <option>Computer</option>
                    <option>Mobile</option>
                    <option>Appliances</option>
                </select>
            </div>
            <a href="/"
                class="{{ Request::is('/') ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium">HOME</a>


     @foreach($menu_categories as $category)
    <div class="relative group">
        <a href="{{ route('category.product', $category->id) }}"
           class="hover:text-orange-500 font-medium block px-4 py-2 flex items-center gap-1">
            {{ $category->category_name }}
            @if($category->subcategory->count())
                <i class="fa-solid fa-caret-down"></i>
            @endif
        </a>

        @if($category->subcategory->count())
            <div
                class="absolute top-full left-0 bg-white text-black rounded shadow-md hidden group-hover:block z-50 min-w-[200px]">
                @foreach($category->subcategory as $sub)
                    <a href="{{ route('subcategory.product', $sub->id) }}"
                       class="block px-4 py-2 hover:text-orange-500 hover:bg-gray-100">
                        {{ $sub->subcategory_name }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endforeach





            <a href="{{ route('ContactUs') }}"
                class="{{ request()->routeIs('ContactUs') ? 'text-orange-500 font-bold' : 'text-white' }} hover:text-orange-400 font-medium">
                CONTACT US
            </a>

        </nav>
    </div>
</div>
