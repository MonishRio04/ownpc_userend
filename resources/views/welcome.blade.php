<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @keyframes scroll-up {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
            }
        }

        .animate-scroll {
            animation: scroll-up 5s linear infinite;
        }
    </style>

    <title>Shopping Mart</title>
</head>

<body class="bg-white text-gray-800">

    <div class="container mx-auto py-3 px-19 flex justify-between items-center">

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
                class="flex items-center gap-1  text-lg px-3 py-1 rounded hover:bg-orange-600 transition">
                <i class="fa-solid fa-cart-shopping"></i>
                Cart
            </button>


        </div>

    </div>
    <div class=" w-full sticky top-0 z-50 container mx-auto px-19 py-5 bg-[#0B1D51] text-white shadow-md">
        <nav class="flex flex-wrap items-center justify-between gap-4 text-sm font-medium">


            <select name="categories"
                class="bg-[#0B1D51] text-white px-10 py-3 border rounded  focus:outline-none focus:ring-1 ">
                <option disabled selected>All Categories</option>
                <option>Television</option>
                <option>Headphone</option>
                <option>Computer</option>
                <option>Mobile</option>
                <option>Appliances</option>
            </select>


            <a href="#" class="text-orange-400 font-bold pl-8">HOME</a>

            <select name="ELECTRONICS"
                class="bg-[#0B1D51] font-bold text-white px-3 py-1  rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
                <option disabled selected>ELECTRONICS</option>
                <option>All Computers</option>
                <option>Laptops</option>
                <option>Monitor</option>
                <option>Printers</option>
                <option>Tablets</option>
            </select>

            <select name="APPLIANCES"
                class="bg-[#0B1D51] font-bold text-white px-3 py-1  rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
                <option disabled selected>APPLIANCES</option>
                <option>Television</option>
                <option>Headphone</option>
                <option>Speaker</option>
                <option>Air Conditioner</option>
                <option>Cameras</option>
            </select>

            <a href="#" class="hover:text-orange-400 font-bold">ABOUT US</a>


            <a href="#" class="hover:text-orange-400 font-bold">NEW ARRIVALS</a>

            <select name="PAGES" id="select"
                class="bg-[#0B1D51] font-bold text-white px-3 py-1   rounded hover:border-orange-400 focus:outline-none focus:ring-1 focus:ring-orange-400">
                <option disabled selected>PAGES</option>
                <option>Product 1</option>
                <option>Product 2</option>
                <option>Checkout</option>
                <option>Payment</option>
                <option>Terms of Use</option>
            </select>

            <a href="#" class="hover:text-orange-400 font-bold">CONTACT US</a>

        </nav>
    </div>

    <div class="relative w-full h-[400px] bg-white overflow-hidden flex items-center justify-between px-16">

        <div class="z-10 max-w-xl text-black space-y-4">
            <p class="text-lg">Get <span class="text-2xl font-bold">25%</span> offer</p>
            <h2 class="text-4xl font-bold">Upgrade Your Tech</h2>
            <p class="text-lg">Best deals on custom PCs and gadgets</p>
            <a href="#" class="bg-orange-500 hover:bg-[#0B1D51] text-white px-6 py-3 rounded shadow transition">
                Shop Now
            </a>
        </div>

        <div class="w-1/2 h-full py-6">
            <img src="{{ asset('images/pc2.jpg') }}" alt="Sale Banner" class="w-full h-auto object-contain" />
        </div>

    </div>

    <h1 class="text-center text-4xl pt-18">Our <span class="font-bold">New Products</span></h1>
    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row gap-8">

            <div class="md:w-1/4 bg-blue-50 p-4 rounded shadow text-left space-y-6">

                <div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4 text-center">Customer Ratings</h3>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black text-sm">5.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black text-sm">4.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-black text-sm">3.5</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-black text-sm">3.0</span>
                    </div>

                    <div class="flex items-center gap-2 text-yellow-400 text-lg mb-2">
                        <div>
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="text-black text-sm">2.5</span>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900">Price</h4>
                    <ul class="space-y-1 text-sm text-gray-700">
                        <li><input type="checkbox"> Under ₹1,000</li>
                        <li><input type="checkbox"> ₹1,000 - ₹5,000</li>
                        <li><input type="checkbox"> ₹5,000 - ₹10,000</li>
                        <li><input type="checkbox"> ₹10,000 - ₹20,000</li>
                        <li><input type="checkbox"> ₹20,000 - ₹30,000</li>
                        <li><input type="checkbox"> Over ₹30,000</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900">Discount</h4>
                    <ul class="space-y-1 text-sm text-gray-700">
                        <li><input type="checkbox"> 5% or More</li>
                        <li><input type="checkbox"> 10% or More</li>
                        <li><input type="checkbox"> 20% or More</li>
                        <li><input type="checkbox"> 30% or More</li>
                        <li><input type="checkbox"> 50% or More</li>
                        <li><input type="checkbox"> 60% or More</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900">Electronics</h4>
                    <ul class="space-y-1 text-sm text-gray-700 ">
                        <li><input type="checkbox"> Accessories</li>
                        <li><input type="checkbox"> Cameras & Photography</li>
                        <li><input type="checkbox"> Car & Vehicle Electronics</li>
                        <li><input type="checkbox"> Computers & Accessories</li>
                        <li><input type="checkbox"> GPS & Accessories</li>
                        <li><input type="checkbox"> Headphones</li>
                        <li><input type="checkbox"> Home Audio</li>
                        <li><input type="checkbox"> Home Theater, TV & Video</li>
                        <li><input type="checkbox"> Mobiles & Accessories</li>
                        <li><input type="checkbox"> Portable Media Players</li>
                        <li><input type="checkbox"> Tablets</li>
                        <li><input type="checkbox"> Telephones & Accessories</li>
                        <li><input type="checkbox"> Wearable Technology</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900">Cash On Delivery</h4>
                    <label class="text-sm text-gray-700">
                        <input type="checkbox"> Eligible for Cash On Delivery
                    </label>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-2 text-blue-900">New Arrivals</h4>
                    <ul class="space-y-1 text-sm text-gray-700">
                        <li><input type="checkbox"> Last 30 days</li>
                        <li><input type="checkbox"> Last 90 days</li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-3 text-blue-900">Best Seller</h4>


                    <div class="overflow-hidden h-64 relative">
                        <div class="animate-scroll space-y-4">


                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/pc.png') }}" alt="Product"
                                    class="w-14 h-14 object-contain">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 leading-tight">Gaming Mouse</p>
                                    <p class="text-xs text-gray-500">₹799</p>
                                </div>
                            </div>


                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/pc.png') }}" alt="Product"
                                    class="w-14 h-14 object-contain">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 leading-tight">Mechanical Keyboard</p>
                                    <p class="text-xs text-gray-500">₹2,499</p>
                                </div>
                            </div>


                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/pc.png') }}" alt="Product"
                                    class="w-14 h-14 object-contain">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 leading-tight">RGB Cabinet</p>
                                    <p class="text-xs text-gray-500">₹4,999</p>
                                </div>
                            </div>


                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/pc.png') }}" alt="Product"
                                    class="w-14 h-14 object-contain">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 leading-tight">Gaming Mouse</p>
                                    <p class="text-xs text-gray-500">₹799</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <div class="md:w-3/4  grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition ">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Gaming Mouse</h4>
                    <p class="text-sm text-gray-600 mb-2">₹799</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Mechanical Keyboard</h4>
                    <p class="text-sm text-gray-600 mb-2">₹2,499</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>

                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>
                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Gaming Mouse</h4>
                    <p class="text-sm text-gray-600 mb-2">₹799</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Mechanical Keyboard</h4>
                    <p class="text-sm text-gray-600 mb-2">₹2,499</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>

                <div class="col-span-3 m-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Mid Section Banner"
                        class="w-full h-auto rounded shadow-md object-cover">
                </div>

                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Gaming Mouse</h4>
                    <p class="text-sm text-gray-600 mb-2">₹799</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">Mechanical Keyboard</h4>
                    <p class="text-sm text-gray-600 mb-2">₹2,499</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>


                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>

                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>
                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>
                <div class="bg-white  rounded shadow p-4 text-center hover:shadow-lg transition">
                    <img src="{{ asset('images/pc.png') }}" alt="Product Image" class="mx-auto mb-3">
                    <h4 class="font-semibold text-gray-800 mb-1">RGB Cabinet</h4>
                    <p class="text-sm text-gray-600 mb-2">₹4,999</p>
                    <button
                        class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition">
                        Add to Cart
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div class="relative w-full h-[500px] bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/logo.jpg') }}');">

        <div class="flex h-full p-18">

            <div class="w-1/2 flex justify-center items-center ">
                <img src="{{ asset('images/pc.png') }}" alt="PC 1" class="w-[90%] h-auto rounded shadow-lg" />
            </div>

            <div class="w-1/2 flex justify-center items-center">
                <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2" class="w-[90%] h-auto rounded shadow-lg" />
            </div>

        </div>
    </div>

    <div class="px-18">
        <p class="font-bold text-black text-2xl p-2 pt-12">Electronics:</p>
        <p class="p-2">
            If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
            make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
            laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
            video and more.
        </p>

        <div class="flex justify-between gap-6 text-center mt-6 pb-12">

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Free Shipping</h1>
                <p>on orders over $100</p>
            </div>

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Fast Delivery</h1>
                <p>World Wide</p>
            </div>

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Big Choice</h1>
                <p>of Products</p>
            </div>

        </div>
    </div>

    <div class="bg-[#021526] text-white pt-16 px-19 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h5 class="text-xl font-bold mb-4">Categories</h5>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Smartphones</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Laptops &
                                Tablets</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Cameras</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Audio Devices</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Home
                                Appliances</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-xl font-bold mb-4">Quick Links</h5>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Home</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Products</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">Deals &
                                Offers</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">New Arrivals</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Get in Touch</h4>
                    <ul class="space-y-2">
                        <li>
                            <p class="text-gray-300 ">Mkc, 123 Sebastian, USA</p>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">77 5566 8899</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-orange-400 transition">+11 2234 9865</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-orange-400 transition">mail1@gmail.com</a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-orange-400 transition">mail2@gmail.com</a></li>
                    </ul>

                </div>

                <div>
                    <h5 class="text-xl font-bold mb-4">Newsletter</h5>
                    <p class="text-gray-300 mb-4">Free Delivery on your first order</p>
                    <form class="flex">
                        <input type="email" placeholder="Email"
                            class="px-4 py-2 bg-white rounded w-full text-gray-800 focus:outline-none">
                        <button class="bg-orange-400 text-white px-4 py-2 rounded-r-lg transition">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                    <p class="text-2xl py-4 font-bold text-white">Follow Us on</p>
                    <div class="flex space-x-4 p-2">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-[#456882] flex items-center justify-center hover:bg-accent transition">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-[#00CAFF] flex items-center justify-center hover:bg-accent transition">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-[#FF6363] flex items-center justify-center hover:bg-accent transition">
                            <i class="fa-brands fa-google-plus-g"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-white text-sm space-y-6 px-19 py-8">

        <div class="space-y-2 ">
            <h4 class="font-bold text-2xl text-black">Mobile & Tablets</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Android Phones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Smartphones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Feature Phones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Unboxed Phones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Refurbished Phones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Tablets</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">CDMA Phones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Value Added
                    Services</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Sell Old Used
                    Mobiles</a>
            </div>


        </div>


        <div class="space-y-2">
            <h4 class="font-bold text-2xl text-black">Computers</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Laptops</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Printers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Routers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Ink & Toner
                    Cartridges</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Monitors</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Video Games</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Unboxed & Refurbished
                    Laptops</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Assembled Desktops</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Data Cards</a>
            </div>
        </div>

        <div class="space-y-2">
            <h4 class="font-bold text-2xl text-black">TV, Audio & Large Appliances</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">TVs & DTH</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Home Theatre
                    Systems</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Hidden Cameras &
                    CCTVs</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Refrigerators</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Washing Machines</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Air Conditioners</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Cameras</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Speakers</a>
            </div>
        </div>

        <div class="space-y-2">
            <h4 class="font-bold text-2xl text-black">Mobile & Laptop Accessories</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Headphones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Power Banks</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Backpacks</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Mobile Cases &
                    Covers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Pen Drives</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">External Hard
                    Disks</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Mouse</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Smart Watches &
                    Fitness Bands</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">MicroSD Cards</a>
            </div>
        </div>

        <div class="space-y-2">
            <h4 class="font-bold text-2xl text-black">Appliances</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Trimmers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Hair Dryers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Emergency Lights</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Water Purifiers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Electric Kettles</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Hair Straighteners</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Induction Cooktops</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Sewing Machines</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Geysers</a>
            </div>
        </div>
        <div class="space-y-2">
            <h4 class="font-bold text-2xl text-black">Popular on Electronics Mart</h4>
            <div class="flex flex-wrap gap-2">
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Offers & Coupons</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Couple Watches</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Gas Stoves</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Air Coolers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Air Purifiers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Headphones</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Headsets</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Pressure Cookers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Sandwich Makers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Air Friers</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">Irons</a>
                <a href="#" class="px-2 py-1 rounded text-gray-700 hover:text-orange-400">LED TV</a>
            </div>
        </div>

        <div>
            <h4 class="font-bold text-2xl text-black mb-2">Payment Method</h4>
            <a href="#" class="text-sm text-gray-700 hover:underline">All Payment Options</a>
        </div>

    </div>

    <div class=" p-4 text-center text-gray-400 bg-[#021526]">
        <p>© 2023 Electronics Mart. All rights reserved.</p>
    </div>
</body>
</html>
