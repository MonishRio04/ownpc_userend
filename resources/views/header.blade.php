
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between ">
                <!-- Logo -->
                <a href="#" class="font-['Pacifico'] text-2xl text-primary">
                   <img class="h-[70px]" src="{{asset( \App\Models\SiteSetting::find(1)->logo)}}" alt=""> 
                </a>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-primary font-medium">Home</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-primary transition-colors">PC Builder</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-primary transition-colors">Pre-Built PCs</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-primary transition-colors">Components</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-primary transition-colors">Deals</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-primary transition-colors">Support</a>
                </nav>
                
                <!-- Right Icons -->
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-primary">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-search-line ri-lg"></i>
                        </div>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-primary">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-user-line ri-lg"></i>
                        </div>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-primary relative">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-shopping-cart-line ri-lg"></i>
                        </div>
                        <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </a>
                    <button class="md:hidden text-gray-700">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-menu-line ri-lg"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </header>

