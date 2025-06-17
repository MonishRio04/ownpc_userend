



     
@extends('default')
@section('content')
    
    <!-- Hero Section -->
    <section class="hero-section relative">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-gray-900/40"></div>
        <div class="container mx-auto px-4 py-24 relative z-10">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-bold text-white mb-6">Build Your Dream PC</h1>
                <p class="text-white/90 text-lg mb-8">Customize every component to create the perfect PC for your needs. From gaming rigs to workstations, we've got you covered with premium parts and expert guidance.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#pc-builder" class="bg-primary text-white px-6 py-3 rounded-button font-medium hover:bg-primary/90 transition-colors !rounded-button whitespace-nowrap cursor-pointer">Start Building</a>
                    <a href="#" class="bg-white text-gray-900 px-6 py-3 rounded-button font-medium hover:bg-gray-100 transition-colors !rounded-button whitespace-nowrap cursor-pointer">Explore Pre-Built PCs</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Builds Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Featured Custom Builds</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Gaming PC -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://img.freepik.com/premium-photo/new-modern-powerful-gaming-computer-with-beautiful-rgb-lights-different-color-glass-case-table-dark_63762-7255.jpg?uid=R201714687&ga=GA1.1.1841090616.1748199341&semt=ais_hybrid&w=740" alt="Gaming PC" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-xl font-semibold">Ultimate Gaming Rig</h3>
                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">Gaming</span>
                        </div>
                        <p class="text-gray-600 mb-4">Dominate every game with this high-performance build featuring the latest RTX 4080 GPU and Intel Core i9 processor.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-primary">$2,499</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                                <span class="text-gray-500 ml-1">(128)</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors flex-1 !rounded-button whitespace-nowrap cursor-pointer">View Build</button>
                            <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-button font-medium hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-heart-line"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Workstation PC -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://img.freepik.com/premium-psd/gaming-monitor-mockup_358279-2128.jpg?uid=R201714687&ga=GA1.1.1841090616.1748199341&semt=ais_items_boosted&w=740" alt="Workstation PC" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-xl font-semibold">Pro Workstation</h3>
                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">Workstation</span>
                        </div>
                        <p class="text-gray-600 mb-4">Engineered for content creators and professionals with AMD Ryzen Threadripper and NVIDIA RTX A5000.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-primary">$3,799</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <span class="text-gray-500 ml-1">(86)</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors flex-1 !rounded-button whitespace-nowrap cursor-pointer">View Build</button>
                            <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-button font-medium hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-heart-line"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Budget PC -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="h-64 overflow-hidden">
                        <img src="https://img.freepik.com/premium-photo/purple-computer-tower-with-number-1-it_872198-10.jpg?uid=R201714687&ga=GA1.1.1841090616.1748199341&semt=ais_items_boosted&w=740" alt="Budget PC" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-xl font-semibold">Budget Gamer</h3>
                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Budget</span>
                        </div>
                        <p class="text-gray-600 mb-4">Perfect entry-level gaming PC with AMD Ryzen 5 and RTX 3060, offering excellent performance at an affordable price.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-primary">$899</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                                <span class="text-gray-500 ml-1">(215)</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition-colors flex-1 !rounded-button whitespace-nowrap cursor-pointer">View Build</button>
                            <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-button font-medium hover:bg-gray-50 transition-colors !rounded-button whitespace-nowrap cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-heart-line"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PC Builder Section -->
    <section id="pc-builder" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-2 text-center">Custom PC Builder</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Select each component to build your perfect PC. Our configurator ensures all parts are compatible and optimized for your needs.</p>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Component Selection -->
                <div class="lg:col-span-2">
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-xl font-semibold mb-4">Select Components</h3>
                        
                        <!-- CPU Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-cpu-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Processor (CPU)</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=AMD%20Ryzen%20processor%20in%20packaging%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20CPU%20chip&width=80&height=80&seq=127&orientation=squarish" alt="AMD Ryzen 7 7800X3D" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">AMD Ryzen 7 7800X3D</h5>
                                    <p class="text-sm text-gray-600">8 Cores, 16 Threads, 4.2GHz Base, 5.0GHz Boost</p>
                                </div>
                                <span class="font-semibold">$399.99</span>
                            </div>
                        </div>
                        
                        <!-- Motherboard Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-dashboard-3-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Motherboard</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=ASUS%20ROG%20motherboard%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20motherboard%20with%20RGB%20lighting&width=80&height=80&seq=128&orientation=squarish" alt="ASUS ROG X670E-E Gaming WiFi" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">ASUS ROG X670E-E Gaming WiFi</h5>
                                    <p class="text-sm text-gray-600">AMD X670E, DDR5, PCIe 5.0, WiFi 6E</p>
                                </div>
                                <span class="font-semibold">$349.99</span>
                            </div>
                        </div>
                        
                        <!-- GPU Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-gpu-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Graphics Card (GPU)</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=NVIDIA%20RTX%204070%20graphics%20card%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20GPU%20with%20RGB%20lighting&width=80&height=80&seq=129&orientation=squarish" alt="NVIDIA GeForce RTX 4070" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">NVIDIA GeForce RTX 4070</h5>
                                    <p class="text-sm text-gray-600">12GB GDDR6X, Ray Tracing, DLSS 3</p>
                                </div>
                                <span class="font-semibold">$599.99</span>
                            </div>
                        </div>
                        
                        <!-- RAM Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-ram-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Memory (RAM)</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=Corsair%20Vengeance%20RGB%20RAM%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20memory%20sticks%20with%20RGB%20lighting&width=80&height=80&seq=130&orientation=squarish" alt="Corsair Vengeance RGB 32GB" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">Corsair Vengeance RGB 32GB</h5>
                                    <p class="text-sm text-gray-600">DDR5-6000, CL36, 2x16GB</p>
                                </div>
                                <span class="font-semibold">$149.99</span>
                            </div>
                        </div>
                        
                        <!-- Storage Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-hard-drive-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Storage</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=Samsung%20980%20Pro%20SSD%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20M.2%20SSD&width=80&height=80&seq=131&orientation=squarish" alt="Samsung 980 Pro 2TB" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">Samsung 980 Pro 2TB</h5>
                                    <p class="text-sm text-gray-600">PCIe 4.0 NVMe M.2 SSD, 7000MB/s Read</p>
                                </div>
                                <span class="font-semibold">$179.99</span>
                            </div>
                        </div>
                        
                        <!-- Case Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-computer-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Case</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=Lian%20Li%20PC-O11%20Dynamic%20case%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20PC%20case%20with%20glass%20panel&width=80&height=80&seq=132&orientation=squarish" alt="Lian Li PC-O11 Dynamic" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">Lian Li PC-O11 Dynamic</h5>
                                    <p class="text-sm text-gray-600">Mid Tower, Tempered Glass, Black</p>
                                </div>
                                <span class="font-semibold">$149.99</span>
                            </div>
                        </div>
                        
                        <!-- Power Supply Selection -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-plug-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Power Supply</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=Corsair%20RM850x%20power%20supply%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20PSU&width=80&height=80&seq=133&orientation=squarish" alt="Corsair RM850x" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">Corsair RM850x</h5>
                                    <p class="text-sm text-gray-600">850W, 80+ Gold, Fully Modular</p>
                                </div>
                                <span class="font-semibold">$129.99</span>
                            </div>
                        </div>
                        
                        <!-- Cooling Selection -->
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-windy-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">CPU Cooling</h4>
                                </div>
                                <button class="text-primary hover:text-primary/80 text-sm font-medium cursor-pointer">Change</button>
                            </div>
                            <div class="flex items-center">
                                <img src="https://readdy.ai/api/search-image?query=NZXT%20Kraken%20X63%20AIO%20cooler%2C%20professional%20product%20photography%20on%20white%20background%2C%20detailed%20liquid%20cooler%20with%20RGB&width=80&height=80&seq=134&orientation=squarish" alt="NZXT Kraken X63" class="w-16 h-16 object-contain mr-4">
                                <div class="flex-1">
                                    <h5 class="font-medium">NZXT Kraken X63</h5>
                                    <p class="text-sm text-gray-600">280mm AIO Liquid Cooler, RGB</p>
                                </div>
                                <span class="font-semibold">$149.99</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Options -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Additional Options</h3>
                        
                        <!-- Operating System -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-windows-fill"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Operating System</h4>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                                        <option>Windows 11 Home (+$139.99)</option>
                                        <option>Windows 11 Pro (+$199.99)</option>
                                        <option>No Operating System</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Warranty -->
                        <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-shield-check-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Warranty</h4>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                                        <option>Standard 2-Year Warranty (Included)</option>
                                        <option>Extended 3-Year Warranty (+$99.99)</option>
                                        <option>Premium 5-Year Warranty (+$199.99)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Assembly Service -->
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                                            <i class="ri-tools-line"></i>
                                        </div>
                                    </div>
                                    <h4 class="font-medium">Assembly & Testing</h4>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary">
                                        <option>Standard Assembly & Testing (Included)</option>
                                        <option>Premium Assembly with Cable Management (+$49.99)</option>
                                        <option>Deluxe Assembly with Overclocking (+$99.99)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-6 sticky top-24">
                        <h3 class="text-xl font-semibold mb-6">Build Summary</h3>
                        
                        <!-- PC Preview Image -->
                        <div class="bg-white rounded-lg overflow-hidden mb-6 shadow-sm">
                            <img src="https://img.freepik.com/premium-photo/professsional-gaming-empty-room-studio-with-neon-lights-rgb-powerful-computer-keyboard-mouse-fps-shooter-video-game-pc-display-stream-chat-television_482257-12418.jpg?uid=R201714687&ga=GA1.1.1841090616.1748199341&semt=ais_items_boosted&w=740" alt="Your Custom PC" class="w-full h-48 object-cover">
                        </div>
                        
                        <!-- Performance Metrics -->
                        <div class="mb-6">
                            <h4 class="font-medium mb-3">Estimated Performance</h4>
                            
                            <div class="mb-3">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Gaming</span>
                                    <span class="font-medium">Excellent</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-primary h-2 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Content Creation</span>
                                    <span class="font-medium">Very Good</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-primary h-2 rounded-full" style="width: 80%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Productivity</span>
                                    <span class="font-medium">Excellent</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-primary h-2 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Breakdown -->
                        <div class="border-t border-gray-200 pt-4 mb-6">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Components</span>
                                <span>$2,109.92</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Operating System</span>
                                <span>$139.99</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Assembly & Testing</span>
                                <span>Included</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Warranty</span>
                                <span>Included</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Shipping</span>
                                <span>Free</span>
                            </div>
                        </div>
                        
                        <!-- Total -->
                        <div class="border-t border-gray-200 pt-4 mb-6">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold">Total</span>
                                <span class="text-2xl font-bold text-primary">$2,249.91</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">or as low as $187/mo with financing</p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-primary/90 transition-colors !rounded-button whitespace-nowrap cursor-pointer">Add to Cart</button>
                            <button class="w-full bg-secondary text-white py-3 rounded-button font-medium hover:bg-secondary/90 transition-colors !rounded-button whitespace-nowrap cursor-pointer">Save Configuration</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center">Why Choose Our Custom PC Building Service</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 flex items-center justify-center text-primary">
                            <i class="ri-check-line ri-lg"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Quality Components</h3>
                    <p class="text-gray-600">We use only premium, brand-name components with full manufacturer warranties for reliability and performance.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 flex items-center justify-center text-primary">
                            <i class="ri-tools-fill ri-lg"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Expert Assembly</h3>
                    <p class="text-gray-600">Our technicians have years of experience building custom PCs with meticulous attention to detail.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 flex items-center justify-center text-primary">
                            <i class="ri-customer-service-2-line ri-lg"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Lifetime Support</h3>
                    <p class="text-gray-600">Get technical assistance for the lifetime of your PC with our dedicated customer support team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center">What Our Customers Say</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-700 mb-6">"The custom PC I ordered exceeded all my expectations. The build quality is exceptional, and the performance is incredible. I'm now able to play all my favorite games at max settings without any issues."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-medium">Michael Rodriguez</h4>
                            <p class="text-sm text-gray-600">Gaming Enthusiast</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-700 mb-6">"As a video editor, I needed a powerful workstation that could handle 4K video editing without breaking a sweat. The custom PC I built with their help has cut my rendering times in half. Worth every penny!"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-medium">Samantha Wilson</h4>
                            <p class="text-sm text-gray-600">Professional Video Editor</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                    <p class="text-gray-700 mb-6">"I was hesitant to build a custom PC, but their configurator made it so easy. The customer service was outstanding, and they helped me choose components that fit my budget while still delivering great performance."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-medium">David Thompson</h4>
                            <p class="text-sm text-gray-600">First-time PC Builder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-12 text-center">Frequently Asked Questions</h2>
            
            <div class="max-w-3xl mx-auto">
                <div class="mb-6">
                    <button class="flex justify-between items-center w-full text-left font-semibold p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors cursor-pointer" onclick="toggleFAQ(1)">
                        <span>How long does it take to build and ship my custom PC?</span>
                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                            <i class="ri-arrow-down-s-line" id="faq-arrow-1"></i>
                        </div>
                    </button>
                    <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-1">
                        <p class="text-gray-600">Most custom PC builds are completed within 7-10 business days from the time of order. After thorough testing, your PC will be carefully packaged and shipped, with delivery typically taking an additional 2-5 business days depending on your location.</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <button class="flex justify-between items-center w-full text-left font-semibold p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors cursor-pointer" onclick="toggleFAQ(2)">
                        <span>What if I receive my PC and it doesn't work?</span>
                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                            <i class="ri-arrow-down-s-line" id="faq-arrow-2"></i>
                        </div>
                    </button>
                    <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-2">
                        <p class="text-gray-600">All our PCs undergo extensive testing before shipping, but if you encounter any issues, our technical support team is available 24/7. We'll troubleshoot remotely, and if necessary, arrange for repairs or replacement under our comprehensive warranty.</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <button class="flex justify-between items-center w-full text-left font-semibold p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors cursor-pointer" onclick="toggleFAQ(3)">
                        <span>Can I upgrade my PC in the future?</span>
                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                            <i class="ri-arrow-down-s-line" id="faq-arrow-3"></i>
                        </div>
                    </button>
                    <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-3">
                        <p class="text-gray-600">Absolutely! We design our custom PCs with future upgrades in mind. All components use standard form factors and connections, making it easy to upgrade individual parts as technology advances or your needs change.</p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <button class="flex justify-between items-center w-full text-left font-semibold p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors cursor-pointer" onclick="toggleFAQ(4)">
                        <span>Do you offer international shipping?</span>
                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                            <i class="ri-arrow-down-s-line" id="faq-arrow-4"></i>
                        </div>
                    </button>
                    <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-4">
                        <p class="text-gray-600">Yes, we ship to many countries worldwide. International shipping costs and delivery times vary by location. Please note that customers are responsible for any import duties or taxes required by their country.</p>
                    </div>
                </div>
                
                <div>
                    <button class="flex justify-between items-center w-full text-left font-semibold p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition-colors cursor-pointer" onclick="toggleFAQ(5)">
                        <span>What payment methods do you accept?</span>
                        <div class="w-5 h-5 flex items-center justify-center text-primary">
                            <i class="ri-arrow-down-s-line" id="faq-arrow-5"></i>
                        </div>
                    </button>
                    <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-5">
                        <p class="text-gray-600">We accept all major credit cards (Visa, Mastercard, American Express), PayPal, and various financing options. For large orders, we also accept bank transfers. All payments are processed securely through encrypted connections.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
                <p class="mb-8">Subscribe to our newsletter for the latest tech news, exclusive deals, and custom PC building tips.</p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Your email address" class="flex-1 px-4 py-3 rounded-button text-gray-800 focus:outline-none">
                    <button class="bg-white text-primary px-6 py-3 rounded-button font-medium hover:bg-gray-100 transition-colors !rounded-button whitespace-nowrap cursor-pointer">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
@endsection
