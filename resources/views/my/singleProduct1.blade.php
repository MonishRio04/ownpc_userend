@extends('layout.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-lg shadow">

        <!-- Product Image -->
        <div>
            <img src="{{ asset('upload/sample-product.jpg') }}" alt="Gaming PC" class="w-full h-auto rounded-lg shadow-md">
        </div>

        <!-- Product Details -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Ultimate Gaming Beast</h2>
            <p class="text-gray-600 mb-4">Built for pro gamers and content creators who demand top performance.</p>

            <div class="text-2xl text-indigo-700 font-semibold mb-4">₹1,49,999</div>

            <ul class="list-disc list-inside text-gray-700 mb-6 space-y-1">
                <li>Processor: AMD Ryzen 7 5800X</li>
                <li>Graphics: NVIDIA RTX 4070 12GB</li>
                <li>RAM: 32GB DDR4 3600MHz</li>
                <li>Storage: 1TB NVMe SSD</li>
                <li>Power Supply: 750W Gold Rated</li>
                <li>Cabinet: Lian Li RGB Chassis</li>
            </ul>

            <div class="flex items-center space-x-4">
               <!-- Add to Cart Form -->
<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="name" value="Ultimate Gaming Beast - RTX 4070 Build">
    <input type="hidden" name="price" value="149999">
    <input type="hidden" name="image" value="{{ asset('upload/sample-product.jpg') }}">

    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow">
         Add to Cart
    </button>
</form>

                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-medium">
                     Add to Wishlist
                </button>
            </div>
        </div>
    </div>

    <!-- Description Section -->
    <div class="mt-12 bg-gray-50 p-6 rounded-lg shadow">
        <h3 class="text-2xl font-semibold text-gray-800 mb-3"> Product Description</h3>
        <p class="text-gray-600 leading-relaxed">
            This PC is engineered for high-end gaming with ultra settings and smooth 1440p/4K performance. Perfect for streamers and video editors too, with ample memory and high-speed SSD storage.
        </p>
    </div>
</div>
@endsection
