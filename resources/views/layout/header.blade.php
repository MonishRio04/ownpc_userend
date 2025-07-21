<div class="dark:bg-gray-800">
    <div class="container mx-auto text-gray-500 py-3 px-4 sm:px-8 md:px-16 flex justify-between items-center">
       <p class="text-xs sm:text-sm font-medium">WELCOME TO OUR SHOP!</p>

        <div class="flex items-center space-x-2 sm:space-x-4 text-xs sm:text-sm">
                      <div class="relative" id="locationDropdown">
                <button id="locationToggle" type="button" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-location-pin text-gray-400 group-hover:text-orange-500 text-sm"></i>
                    <span id="selectedLocationText" class="hidden sm:inline">Select Location</span>
                </button>
            </div>

            @auth
                <span class="hidden sm:flex items-center space-x-2 font-medium text-gray-500 dark:text-white">
                    <i class="fa-solid fa-user text-gray-400"></i>
                    <span>Welcome, {{ Auth::user()->name }}</span>
                </span>

                <form method="POST" action="{{ route('custom.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="group hover:text-orange-500 flex items-center gap-1">
                        <i class="fa-solid fa-right-from-bracket text-gray-400 group-hover:text-orange-500"></i>
                        <span class="hidden sm:inline">Logout</span>
                    </button>
                </form>
            @else
                <button type="button" id="loginToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i>
                    <span class="hidden sm:inline">Log In</span>
                </button>

                <button type="button" id="registerToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-user-plus text-gray-500 group-hover:text-orange-500"></i>
                    <span class="hidden sm:inline">Register</span>
                </button>
            @endauth
        </div>
    </div>
</div>

<hr class="dark:border-gray-700">

<div class="container mx-auto py-4 sm:py-8 px-4 sm:px-8 md:px-16 flex flex-wrap items-center justify-between gap-4">

    <h1 class="text-2xl md:text-4xl font-bold flex items-center">
        <a href="{{ url('/') }}" class="flex items-center">
            <span class="text-orange-400 text-3xl md:text-5xl">O</span>
            <span class="text-gray-800 dark:text-white">wn</span>
            <span class="text-orange-400 text-3xl md:text-5xl">P</span>
            <span class="text-gray-800 dark:text-white">c</span>
        </a>
    </h1>

    
    <div class="order-last sm:order-none w-full sm:w-auto sm:flex-grow sm:max-w-2xl">
        <form method="post" action="" class="relative flex">
            <input type="search" name="search" placeholder="Search for products..." required
                class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-white">
            <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded-r-md">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </div>

    <!-- User controls -->
    <div class="flex items-center space-x-3 sm:space-x-4 text-base sm:text-lg">
        <!-- Mobile search toggle -->
      
        <!-- Dark mode toggle -->
        <button id="toggleDark" aria-label="Toggle dark mode" class="text-xl dark:text-gray-300">
            <i class="fa-solid fa-moon dark:hidden"></i>
            <i class="fa-solid fa-sun hidden dark:inline"></i>
        </button>

        @auth
            <!-- User dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-1 px-2 py-1 dark:text-white">
                    <i class="fa-solid fa-circle-user text-xl"></i>
                    <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                    <i class="fa-solid fa-caret-down hidden sm:inline mt-1 text-sm"></i>
                </button>
                <div class="absolute right-0  w-48 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-lg hidden group-hover:block z-[999]">
                    <a href="{{ route('user.profile', Auth::user()->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-user-pen mr-2"></i> Profile
                    </a>
                    <a href="{{ route('user.wishlist', Auth::user()->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-heart mr-2"></i> Wishlist
                    </a>
                    <a href="{{ route('user.orders', Auth::user()->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-box mr-2"></i> Orders
                    </a>
                </div>
            </div>
        @else
            <!-- Auth buttons -->
            <button id="loginToggle" class="hidden sm:flex items-center gap-1 hover:text-orange-500">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Log In</span>
            </button>
        @endauth

        <!-- Cart -->
        <button id="cartToggle" class="flex items-center gap-1 hover:text-orange-500">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="hidden sm:inline">Cart</span>
        </button>
    </div>
</div>

<!-- Mobile search bar (hidden by default) -->


<!-- Main Navigation -->
<div class="w-full sticky top-0 z-50 bg-[#0B1D51] text-white shadow-md">
    <div class="container mx-auto px-4 sm:px-8 md:px-16 py-2 md:py-3">
        <!-- Mobile menu button -->
        <div class="flex items-center justify-between md:justify-start">
            <button id="mobileMenuToggle" class="md:hidden px-2 py-3">
                <i class="fa-solid fa-bars text-xl"></i>
                <span class="sr-only">Menu</span>
            </button>
<!-- Desktop Navigation -->
<div class="hidden md:flex justify-between items-center w-full">
    <!-- Left: All Categories -->
    <div class="relative mr-4">
        <button id="toggleAllCategories" class="font-medium flex items-center gap-2 py-2">
            All Categories <i class="fa-solid fa-caret-down"></i>
        </button>
        <div id="allCategoriesDropdown" class="absolute top-full left-0 mt-1 bg-white text-black rounded shadow-lg hidden min-w-[200px] z-50">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Electronics</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Fashion</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Books</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Home & Kitchen</a>
        </div>
    </div>

    <!-- Right: Main Links -->
    <nav class="flex items-center space-x-4">
        <a href="/" class="{{ Request::is('/') ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-3 py-2">
            HOME
        </a>
        @foreach ($menu_categories as $category)
            <div class="relative group">
                <a href="{{ route('category.product', $category->id) }}"
                   class="{{ isset($activeCategoryId) && $activeCategoryId == $category->id ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-3 py-2 flex items-center">
                    {{ $category->category_name }}
                    @if($category->subcategory->isNotEmpty())
                        <i class="fa-solid fa-caret-down ml-1 text-sm"></i>
                    @endif
                </a>
                @if($category->subcategory->isNotEmpty())
                    <div class="absolute top-full left-0 bg-white text-black rounded shadow-lg hidden group-hover:block min-w-[200px] z-50">
                        @foreach($category->subcategory as $sub)
                            <a href="{{ route('subcategory.product', $sub->id) }}" class="block px-4 py-2 hover:bg-gray-100">
                                {{ $sub->subcategory_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
        <a href="{{ route('ContactUs') }}"
           class="{{ request()->routeIs('ContactUs') ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-3 py-2">
            CONTACT US
        </a>
    </nav>
</div>
</div>
    </div>
</div>

<div id="mobileMenu" class="md:hidden hidden bg-[#0B1D51] text-white shadow-lg z-40">
    <div class="container mx-auto px-4 py-2">
           <div class="border-b border-gray-700 pb-2 mb-2">
            <button id="mobileCategoriesToggle" class="w-full text-left py-3 px-2 font-bold flex justify-between items-center">
                <span>All Categories</span>
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="mobileCategoriesDropdown" class="hidden pl-4">
                <a href="#" class="block py-2 px-2 hover:text-orange-400">Electronics</a>
                <a href="#" class="block py-2 px-2 hover:text-orange-400">Fashion</a>
                <a href="#" class="block py-2 px-2 hover:text-orange-400">Books</a>
                <a href="#" class="block py-2 px-2 hover:text-orange-400">Home & Kitchen</a>
            </div>
        </div>

        <a href="/" class="block py-3 px-2 {{ Request::is('/') ? 'text-orange-500' : '' }} hover:text-orange-400 border-b border-gray-700">
            HOME
        </a>
        
        @foreach($menu_categories as $category)
            <div class="border-b border-gray-700">
                <a href="{{ route('category.product', $category->id) }}" class="block py-3 px-2 {{ isset($activeCategoryId) && $activeCategoryId == $category->id ? 'text-orange-500' : '' }} hover:text-orange-400 flex justify-between items-center">
                    <span>{{ $category->category_name }}</span>
                    @if($category->subcategory->isNotEmpty())
                        <i class="fa-solid fa-caret-down"></i>
                    @endif
                </a>
                
                @if($category->subcategory->isNotEmpty())
                    <div class="hidden pl-4">
                        @foreach($category->subcategory as $sub)
                            <a href="{{ route('subcategory.product', $sub->id) }}" class="block py-2 px-2 hover:text-orange-400">
                                {{ $sub->subcategory_name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
        
        <a href="{{ route('ContactUs') }}" class="block py-3 px-2 {{ request()->routeIs('ContactUs') ? 'text-orange-500' : '' }} hover:text-orange-400">
            CONTACT US
        </a>
    </div>
</div>
<script>
$(document).ready(function() {
        $('#mobileMenuToggle').on('click', function() {
        $('#mobileMenu').toggleClass('hidden');
        $(this).find('i').toggleClass('fa-bars fa-xmark');
    });
    
    $('#mobileCategoriesToggle').on('click', function() {
        $('#mobileCategoriesDropdown').toggleClass('hidden');
        $(this).find('i').toggleClass('fa-caret-down fa-caret-up');
    });
  
    $('#toggleAllCategories').on('click', function(e) {
        e.stopPropagation();
        $('#allCategoriesDropdown').toggleClass('hidden');
    });
 
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#allCategoriesDropdown').length && 
            !$(e.target).closest('#toggleAllCategories').length) {
            $('#allCategoriesDropdown').addClass('hidden');
        }
    });
    
   
    $('#mobileMenu .fa-caret-down').parent().on('click', function(e) {
        if (!$(e.target).is('a')) {
            e.preventDefault();
            const dropdown = $(this).next();
            if (dropdown.length) {
                dropdown.toggleClass('hidden');
                $(this).find('.fa-caret-down').toggleClass('fa-caret-down fa-caret-up');
            }
        }
    });
});
</script>