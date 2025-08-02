<!-- TOP BAR -->
<div class="bg-white text-center sm:text-left text-gray-600 text-xs sm:text-sm py-2 dark:bg-gray-800 dark:text-gray-400">
    <div class="container mx-auto px-4 sm:px-6 md:px-10 flex flex-col sm:flex-row justify-between items-center gap-2">
        <p class="whitespace-nowrap">WELCOME TO OUR SHOP!</p>

        <div class="flex flex-wrap justify-center sm:justify-end items-center gap-2 sm:gap-3 text-xs sm:text-sm">
            <!-- Location -->
            <div class="flex items-center gap-1 cursor-pointer hover:text-orange-500" id="locationDropdown">
                <button id="locationToggle" type="button" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-location-pin text-gray-500 group-hover:text-orange-500"></i>
                    <span>Select Location</span>
                </button>
            </div>

            @auth
                <span class="flex items-center gap-1 font-medium text-gray-500 dark:text-white">
                    <i class="fa-solid fa-user"></i>
                    <span>Welcome, {{ Auth::user()->name }}</span>
                </span>
                <form method="POST" action="{{ route('custom.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="group hover:text-orange-500 flex items-center gap-1">
                        <i class="fa-solid fa-right-from-bracket text-gray-500 group-hover:text-orange-500"></i> Logout
                    </button>
                </form>
            @else
                <button id="loginToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-right-to-bracket text-gray-500 group-hover:text-orange-500"></i> Log In
                </button>
                <button id="registerToggle" class="group hover:text-orange-500 flex items-center gap-1">
                    <i class="fa-solid fa-user-plus text-gray-500 group-hover:text-orange-500"></i> Register
                </button>
            @endauth
        </div>
    </div>
</div>

<hr class="border-gray-200 dark:border-gray-700">

<!-- LOGO + SEARCH + ICONS -->
<div class="container mx-auto py-3 px-4 sm:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
    <a href="/" class="text-2xl sm:text-3xl font-bold flex items-center gap-2">
        <img src="{{ asset('logo/logo_rectangle1.png') }}" alt="Logo" class="h-14 object-contain" />
    </a>

    <form class="w-full sm:w-[50%] flex border border-gray-300 rounded overflow-hidden dark:border-gray-700">
        <input type="search"
               placeholder="Search for products, brands and more"
               class="flex-grow px-4 py-2 text-sm focus:outline-none dark:bg-gray-800 dark:text-white" />
        <button type="submit" class="bg-orange-400 text-white px-4">
            <i class="fa fa-search"></i>
        </button>
    </form>

    <div class="flex items-center space-x-4 text-lg">
        <!-- Dark mode toggle -->
        <button id="toggleDark" class="dark:text-orange-500 hover:text-orange-500">
            <i class="fa-solid fa-moon dark:hidden"></i>
            <i class="fa-solid fa-sun hidden dark:inline"></i>
        </button>

        <!-- Authenticated or not -->
        @auth
            <div class="relative sm:hidden block" id="mobileUserWrapper">
                <button id="mobileUserToggle" class="flex items-center gap-1 px-2 py-1 text-gray-800 dark:text-white">
                    <i class="fa-solid fa-circle-user text-lg"></i>
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fa-solid fa-caret-down text-sm mt-1"></i>
                </button>
                <div id="mobileUserDropdown"
                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 text-black dark:text-white border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden z-[999]">
                    <a href="{{ route('user.profile', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-user-pen mr-2"></i> Profile
                    </a>
                    <a href="{{ route('user.wishlist', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-heart mr-2"></i> Wishlist
                    </a>
                    <a href="{{ route('user.orders', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-box mr-2"></i> Orders
                    </a>
                    <form method="POST" action="{{ route('custom.logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Desktop User -->
            <div class="relative group hidden sm:block">
                <button class="flex items-center gap-1 px-2 py-1 dark:text-white hover:text-orange-400">
                    <i class="fa-solid fa-circle-user text-xl"></i>
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fa-solid fa-caret-down mt-1 text-sm"></i>
                </button>
                <div class="absolute right-0 w-48 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-lg hidden group-hover:block z-[999]">
                    <a href="{{ route('user.profile', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 hover:text-orange-400 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-user-pen mr-2"></i> Profile
                    </a>
                    <a href="{{ route('user.wishlist', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 hover:text-orange-400 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-heart mr-2"></i> Wishlist
                    </a>
                    <a href="{{ route('user.orders', Auth::user()->id) }}"
                       class="block px-4 py-2 hover:bg-gray-100 hover:text-orange-400 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-box mr-2"></i> Orders
                    </a>
                    <form method="POST" action="{{ route('custom.logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('user.wishlist', Auth::user()?->id) }}"
               class="block px-4 py-2 hover:text-orange-500 dark:hover:text-orange-500">
                <i class="fa-solid fa-heart mr-2"></i> Wishlist
            </a>
        @endauth

        <button id="cartToggle" class="flex items-center gap-1 hover:text-orange-500">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Cart</span>
        </button>
    </div>
</div>


<!-- Sticky Navbar -->
<div class="w-full sticky top-0 z-50 bg-[#196490] text-white shadow-md">
    <div class="container mx-auto px-4 sm:px-8 md:px-16 py-2 md:py-3">
        <div class="flex items-center justify-between md:justify-start">
            <button id="mobileMenuToggle" class="md:hidden px-2 py-3">
                <i class="fa-solid fa-bars text-xl"></i>
                <span class="sr-only">Menu</span>
            </button>

            <div class="hidden md:flex justify-between items-center w-full">
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

                <nav class="flex items-center space-x-4">
                    <a href="/" class="{{ Request::is('/') ? 'text-orange-500' : 'text-white' }} hover:text-orange-400 font-medium px-3 py-2">HOME</a>
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
                                        <a href="{{ route('subcategory.product', $sub->id) }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-orange-400">
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

<!-- Mobile Menu -->
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

        <a href="/" class="block py-3 px-2 {{ Request::is('/') ? 'text-orange-500' : '' }} hover:text-orange-400 border-b border-gray-700">HOME</a>

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

        <a href="{{ route('ContactUs') }}" class="block py-3 px-2 {{ request()->routeIs('ContactUs') ? 'text-orange-500' : '' }} hover:text-orange-400">CONTACT US</a>
    </div>
</div>

<!-- Scripts -->
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
        if (!$(e.target).closest('#allCategoriesDropdown, #toggleAllCategories').length) {
            $('#allCategoriesDropdown').addClass('hidden');
        }
    });

    $('#mobileMenu .fa-caret-down').parent().on('click', function(e) {
        if (!$(e.target).is('a')) {
            e.preventDefault();
            const dropdown = $(this).next();
            dropdown.toggleClass('hidden');
            $(this).find('i').toggleClass('fa-caret-down fa-caret-up');
        }
    });

    $('#mobileUserToggle').on('click', function (e) {
        e.stopPropagation();
        $('#mobileUserDropdown').toggleClass('hidden');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('#mobileUserWrapper').length) {
            $('#mobileUserDropdown').addClass('hidden');
        }
    });
});
</script>
