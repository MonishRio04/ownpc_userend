@extends('layout.app')

@section('content')
<button id="goTopBtn" 
        class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
<i class="fa-solid fa-arrow-up-from-bracket"></i>
</button>
    <div class="relative w-full h-[400px] bg-white overflow-hidden flex items-center justify-between px-16">

 
    <div class="z-10 max-w-xl text-black space-y-4 transform -translate-y-16">
        <p class="text-lg">
            The Best <span class="text-4xl font-bold">Deals</span> on Electronics
        </p>

        <p>
            <a href="/" class="text-orange-400 font-bold">HOME</a>
            <span class="mx-2 text-gray-500"><i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i></span>
            <span class=" font-bold">ELECTRONICS</span>
        </p>
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
@push('scripts')
<script>
    const goTopBtn = document.getElementById('goTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            goTopBtn.classList.remove('hidden');
        } else {
            goTopBtn.classList.add('hidden');
        }
    });

    goTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush
@endsection