@extends('layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 py-12 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Your Shopping Cart
                </span>
            </h1>
            <p class="text-lg text-gray-600 max-w-xl mx-auto">
                Review your selected components and accessories before checkout
            </p>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded-lg mb-8 animate-pulse">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if(count($cartItems) > 0)
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Your Cart Items</h2>
                    <span class="text-indigo-600 font-semibold">{{ count($cartItems) }} items</span>
                </div>
            </div>
            
            <div class="divide-y divide-gray-100">
                @php $total = 0; @endphp
                
                @foreach($cartItems as $item)
                    @php 
                        $itemTotal = $item['price'] * $item['quantity'];
                        $total += $itemTotal;
                    @endphp
                    <div class="p-6 flex flex-col md:flex-row items-start md:items-center gap-6 hover:bg-indigo-50 transition-all duration-200">
                        <div class="w-full md:w-24 flex-shrink-0">
                            <div class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="object-cover w-full h-full">
                            </div>
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <div class="min-w-0">
                                    <h3 class="text-lg font-bold text-gray-900 truncate">
                                        {{ $item['name'] }}
                                    </h3>
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-bold text-indigo-600">₹{{ number_format($item['price']) }}</span>
                                        <span class="mx-2 text-gray-400">•</span>
                                        <div class="flex items-center bg-gray-100 rounded-md px-2 py-1">
                                            <button class="text-gray-500 hover:text-indigo-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                </svg>
                                            </button>
                                            <span class="mx-2 font-medium">{{ $item['quantity'] }}</span>
                                            <button class="text-gray-500 hover:text-indigo-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" class="text-gray-400 hover:text-red-500 p-2 rounded-full transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="mt-4">
                                <span class="text-lg font-bold text-gray-900">₹{{ number_format($itemTotal) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="p-6 bg-gradient-to-r from-indigo-50 to-purple-50 border-t border-gray-200">
                <div class="max-w-md ml-auto">
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="text-gray-700 font-medium">Subtotal</div>
                        <div class="text-right text-gray-900 font-medium">₹{{ number_format($total) }}</div>
                        
                        <div class="text-gray-700 font-medium">Shipping</div>
                        <div class="text-right text-green-600 font-medium">FREE</div>
                        
                        <div class="text-gray-700 font-medium">Tax (18%)</div>
                        <div class="text-right text-gray-900 font-medium">₹{{ number_format($total * 0.18) }}</div>
                        
                        <div class="text-xl font-bold text-gray-900 mt-2 pt-2 border-t border-gray-300">Total</div>
                        <div class="text-right text-xl font-bold text-indigo-600 mt-2 pt-2 border-t border-gray-300">
                            ₹{{ number_format($total + ($total * 0.18)) }}
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 mt-6">
                        <a href={{url('/')}} class="flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 py-3 px-6 rounded-lg font-medium text-center shadow-sm transition-all flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                            Continue Shopping
                        </a>
                        <a href="{{ route('checkout') }}" class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-3 px-6 rounded-lg font-medium text-center shadow-md transition-all transform hover:-translate-y-0.5 flex items-center justify-center">
                            Proceed to Checkout
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-xl p-10 text-center">
            <div class="inline-block bg-indigo-100 rounded-full p-5 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Your cart is empty</h3>
            <p class="text-gray-600 max-w-md mx-auto mb-8">
                Looks like you haven't added anything to your cart yet. Explore our premium PC components and build your dream system!
            </p>
            <a href="#" class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-8 rounded-lg font-medium shadow-md hover:shadow-lg transition-all">
                Browse Products
            </a>
        </div>
        @endif

        <!-- Featured Products -->
        
    </div>
</div>
@endsection