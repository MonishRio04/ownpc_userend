@extends('default_user')

@section('content')
<main class="bg-gray-100 h-screen py-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">{{ $category->product_name }}</h2>
            <p class="text-gray-500 mt-2">{{ $category->description }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 relative group overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}" class="w-full h-56 object-cover">
                        @if($product->discount_price)
                            <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">-{{ $product->discount_price }}</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-md font-semibold text-gray-800 truncate">{{ $product->product_name }}</h3>
                        <p class="text-blue-600 text-lg font-bold mt-1">₹{{ number_format($product->selling_price, 2) }}</p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ url('product/' . $product->slug) }}" class="text-sm text-blue-600 hover:underline">View</a>
                            <form action="{{ url('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-lg text-red-500">No products found in this category.</p>
                </div>
            @endforelse
        </div>
    </div>
</main>
@endsection
