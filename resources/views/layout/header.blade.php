<header class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <!-- Top Row: Logo, Search, User Icons -->
            <div class="flex flex-col md:flex-row items-center justify-between py-4 gap-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="font-cormorant text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">OWNPC</a>
                </div>

                <!-- Search Bar -->
                <div class="w-full md:max-w-lg flex-1">
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Search components, builds, accessories..."
                            class="header-search w-full border border-gray-300 rounded-full px-5 py-2.5 focus:border-blue-500 text-gray-800"
                        >
                        <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
                            <i class="ri-search-line ri-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-user-line ri-lg"></i>
                        </div>
                    </a>
                    <a href={{route('cart.index')}} class="text-gray-700 hover:text-blue-600 relative transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-shopping-cart-line ri-lg"></i>
                        </div>
                        <span class="cart-badge absolute top-0 -right-2 bg-orange-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </a>
                    <button id="mobileMenuButton" class="md:hidden text-gray-700">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-menu-line ri-lg"></i>
                        </div>
                    </button>
                </div>
            </div>
            
           
<nav class="hidden md:flex justify-center py-3 border-t border-gray-200 bg-gray-100 shadow-sm">



    <div class="flex space-x-6 items-center">

        <!-- Home -->
        <a href={{url('/')}} class="text-blue-600 font-semibold hover:text-indigo-700 transition-colors">Home</a>

        <!-- Category Dropdown -->
        <select id="categoryDropdown"
            class="border border-gray-300 rounded px-3 py-1 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option disabled selected>All Categories</option>
            <option value="{{ url('/category/gaming') }}">Gaming</option>
            <option value="{{ url('/category/office') }}">Office</option>
            <option value="{{ url('/category/budget-build') }}">Budget Build</option>
            <option value="{{ url('/category/editing') }}">Editing</option>
            <option value="{{ url('/category/student') }}">Student</option>
            <option value="{{ url('/category/custom') }}">Custom Build</option>
        </select>

        <!-- Other Links -->
        <a href="#" class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">PC Builder</a>
        <a href="#" class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">Pre-Built PCs</a>
        <a href="#" class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">Components</a>
        <a href="#" class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">New Arrivals</a>

        <!-- Pages Dropdown -->
        <select id="pagesDropdown"
            class="border border-gray-300 rounded px-3 py-1 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option disabled selected>All Pages</option>
            <option value="{{ route('single.product.1') }}">Single Product 1</option>
            <option value="{{ url('/single-product-2') }}">Single Product 2</option>
            <option value="{{ route('checkout') }}">Checkout Page</option>
            <option value="{{ route('payment') }}">Payment Page</option>
            <option value="{{ route('terms') }}">Terms of Use</option>
            <option value="{{ route('about') }}">About Us</option>
        </select>

        <a href={{route('support')}} class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">Support</a>
        <a href={{route('contact')}} class="text-gray-700 font-medium hover:text-indigo-600 transition-colors">Contact Us</a>
    </div>
</nav>

<script>
    
    

    document.getElementById('categoryDropdown').addEventListener('change', function () {
        const selectedUrl = this.value;
        if (selectedUrl) window.location.href = selectedUrl;
    });

    document.getElementById('pagesDropdown').addEventListener('change', function () {
        const selectedUrl = this.value;
        if (selectedUrl) window.location.href = selectedUrl;
    });
</script>

<!-- JavaScript Redirect for Dropdowns -->


            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="mobile-menu md:hidden">
                <div class="py-4 flex flex-col space-y-4">
                    <a href="#" class="nav-link text-blue-600 font-medium px-4 py-2 bg-blue-50 rounded-lg">Home</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">PC Builder</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">Pre-Built PCs</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">Components</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">New Arrivals</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">Deals</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">Support</a>
                    <a href="#" class="nav-link text-gray-700 font-medium px-4 py-2 hover:bg-gray-100 rounded-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
   