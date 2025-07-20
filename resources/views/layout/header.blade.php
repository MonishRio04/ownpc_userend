<div class="dark:bg-gray-800">
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

            @auth
                <span class="flex items-center space-x-2 text-sm font-medium text-gray-500 dark:text-white">
                    <i class="fa-solid fa-user text-gray-400"></i>
                    <span>Welcome, {{ Auth::user()->name }}</span>
                </span>

                <form method="POST" action="{{ route('custom.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="group hover:text-orange-500 flex items-center gap-1">
                        <i class="fa-solid fa-right-from-bracket text-gray-400 group-hover:text-orange-500"></i>
                        Logout
                    </button>
                </form>
            @else
                <button type="button" id="loginToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i>
                    Log In
                </button>

                <button type="button" id="registerToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-user-plus text-gray-500 group-hover:text-orange-500"></i>
                    Register
                </button>
            @endauth
        </div>
    </div>
</div>

<hr>

<div class="container mx-auto py-8 px-16 flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
    <h1 class="text-4xl font-bold flex items-center space-x-1">
        <a href="{{ url('/') }}" class="flex items-center space-x-1">
            <span class="text-orange-400 text-5xl">O</span><span class="text-gray-800 dark:text-white">wn</span>
            <span class="text-orange-400 text-5xl">P</span><span class="text-gray-800 dark:text-white">c</span>
        </a>
    </h1>

    <form method="post" action="" class="flex flex-grow max-w-2xl h-12">
        @csrf
        <input type="search" name="search" placeholder="Search for products, brands and more" required
            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-none" />
        <button type="submit" class="bg-orange-400 text-white px-8 py-2 rounded-r-md transition">
            <i class="fa-solid fa-magnifying-glass hover:text-black text-xl font-bold"></i>
        </button>
    </form>

    <div class="flex items-center space-x-4 text-lg gap-4 pl-6">
        <button id="toggleDark" aria-label="Toggle dark mode" class="text-2xl dark:text-gray-300 transition">
            <i class="fa-solid fa-moon dark:hidden"></i>
            <i class="fa-solid fa-sun hidden dark:inline"></i>
        </button>


        @auth
            <div class="relative group inline-block z-[999]">
                <button class="flex items-center gap-1 text-lg px-2 py-1 dark:text-white">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>{{ Auth::user()->name }} <i class="fa-solid fa-caret-down"></i></span>
                </button>

                <div
                    class="absolute right-0 mt-0 w-48 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                    rounded-md shadow-lg hidden group-hover:block z-[999]">
                    <a href="{{ route('user.profile', Auth::user()->id) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-white">
                        <i class="fa-solid fa-user-pen mr-2"></i> Profile
                    </a>

                    <a href="{{ route('user.wishlist', Auth::user()->id) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-white">
                        <i class="fa-solid fa-heart mr-2"></i> Wishlist
                    </a>
                    <a href="{{ route('user.orders', Auth::user()->id) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-800 dark:text-white">
                        <i class="fa-solid fa-box mr-2"></i> Orders
                    </a>
                </div>
            </div>
        @endauth

        <button id="cartToggle" type="button" class="flex items-center gap-1 text-lg px-2 py-1 rounded transition">
            <i class="fa-solid fa-cart-shopping"></i> Cart
        </button>
    </div>
</div>

<div class="w-full sticky top-0 z-50 bg-[#0B1D51] text-white shadow-md">
    <div class="container mx-auto px-16 py-5">
        <nav class="flex justify-between items-center relative">
       
            <div class="relative">
                <button id="toggleAllCategories" class="font-bold flex items-center gap-2">
                    All Categories <i class="fa-solid fa-caret-down"></i>
                </button>
                <div id="allCategoriesDropdown"
                    class="absolute top-full left-0 mt-2 bg-white text-black rounded shadow-md hidden min-w-[200px] z-50">
        
                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white hover:rounded">Electronics</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white hover:rounded">Fashion</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white hover:rounded">Books</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white hover:rounded">Home & Kitchen</a>
                </div>
            </div>
           <div class="flex gap-5">
            <a href="/"
                class="{{ Request::is('/') ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-4 py-2 flex items-center gap-1 ">HOME</a>

           @foreach ($menu_categories as $category)
    <div class="relative group">
        <a href="{{ route('category.product', $category->id) }}"
            class="{{ isset($activeCategoryId) && $activeCategoryId == $category->id ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-4 py-2 flex items-center gap-1">
            {{ $category->category_name }}
            @if ($category->subcategory->isNotEmpty())
                <i class="fa-solid fa-caret-down mt-[2px] text-sm"></i>
            @endif
        </a>

        @if ($category->subcategory->isNotEmpty())
            <div class="absolute top-full left-0 bg-white text-black rounded shadow-md hidden group-hover:block z-50 min-w-[200px]">
                @foreach ($category->subcategory as $sub)
                    <a href="{{ route('subcategory.product', $sub->id) }}"
                        class="block px-4 py-2 hover:text-orange-500 hover:rounded">
                        {{ $sub->subcategory_name }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endforeach

            <a href="{{ route('ContactUs') }}"
                class="{{ request()->routeIs('ContactUs') ? 'text-orange-500 font-bold' : 'text-white' }} hover:text-orange-400 font-medium px-4 py-2 flex items-center gap-1">
                CONTACT US
            </a>
        </div>
        </nav>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggleAllCategories');
        const dropdown = document.getElementById('allCategoriesDropdown');

        toggleBtn.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent closing immediately
            dropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target) && !toggleBtn.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
</script>