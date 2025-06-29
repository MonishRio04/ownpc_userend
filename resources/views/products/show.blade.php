@extends('layouts.app') {{-- Use your layout file name --}}

@section('title', $product->name)

@section('content')


<div class="max-w-5xl mx-auto px-4 py-10">
    <!-- Gaming PC (Now dynamic) -->
    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
        <div class="h-64 overflow-hidden">
            <img 
                src="{{ asset('storage/' . $product->image) }}" 
                alt="{{ $product->name }}" 
                class="w-full h-full object-cover"
            >
        </div>

        <div class="p-6">
            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 text-lg mb-4">{{ $product->description }}</p>
            <p class="text-2xl text-blue-600 font-semibold mb-6">₹{{ number_format($product->price) }}</p>

            <a href="{{ route('products.index') }}" class="inline-block text-indigo-600 hover:underline">← Back to Products</a>
        </div>
    </div>
</div>
@endsection
