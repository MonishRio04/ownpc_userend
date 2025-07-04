@extends('layout.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="grid md:grid-cols-2 gap-8 bg-white rounded-lg shadow p-6">

        <!-- Product Images -->
        <div>
            <div class="relative w-full overflow-hidden rounded-lg">
                <img src="{{ asset('upload/product-2.jpg') }}" alt="Office PC" class="w-full object-cover">
            </div>
            <div class="mt-4 flex space-x-3">
                <img src="{{ asset('upload/product-2.jpg') }}" class="w-16 h-16 object-cover border rounded" />
                <img src="{{ asset('upload/product-2.jpg') }}" class="w-16 h-16 object-cover border rounded" />
                <img src="{{ asset('upload/product-2.jpg') }}" class="w-16 h-16 object-cover border rounded" />
            </div>
        </div>

        <!-- Product Info -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Smart Office PC</h1>
            <p class="text-gray-600 mb-4">Perfect for productivity, remote work, and daily use with excellent performance.</p>

            <div class="text-xl text-indigo-700 font-bold mb-3">₹69,999</div>

            <div class="mb-4">
                <span class="inline-block bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full">
                    In Stock
                </span>
            </div>

            <ul class="list-disc list-inside text-gray-700 space-y-1 mb-6">
                <li>Processor: Intel Core i5 12th Gen</li>
                <li>RAM: 16GB DDR4 3200MHz</li>
                <li>Storage: 512GB NVMe SSD</li>
                <li>Graphics: Integrated Intel UHD</li>
                <li>WiFi + Bluetooth Built-in</li>
                <li>Power-efficient build</li>
            </ul>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="2">
                <input type="hidden" name="name" value="Smart Office PC - Intel i5 Setup">
                <input type="hidden" name="price" value="69999">
                <input type="hidden" name="image" value="{{ asset('upload/product-2.jpg') }}">

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow">
                     Add to Cart
                </button>
            </form>

            <p class="text-sm text-gray-500 mt-4">Ships in 2-3 days</p>
        </div>
    </div>

    <!-- Description -->
    <div class="mt-10 bg-gray-50 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-800 mb-2"> Detailed Description</h2>
        <p class="text-gray-600">
            This office PC is built for professionals who need smooth multitasking, stable video conferencing, and a clutter-free setup. Its compact and efficient design makes it ideal for small desks, home offices, or corporate environments.
        </p>
    </div>
</div>
@endsection
