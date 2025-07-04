@extends("layout.app")

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-indigo-600">Checkout Page</h2>
        <p class="text-gray-600 mt-2">Review your cart and provide shipping details to complete your order.</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cart Items --}}
    @if($cartItems && count($cartItems) > 0)
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Your Cart Items</h3>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="hidden md:grid grid-cols-5 font-semibold text-gray-500 border-b pb-3 mb-3 uppercase text-sm">
                <div>Product</div>
                <div>Price</div>
                <div>Quantity</div>
                <div>Total</div>
                <div>Action</div>
            </div>

            @foreach($cartItems as $item)
            <div class="grid grid-cols-1 md:grid-cols-5 items-center border-b py-3 gap-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-12 h-12 rounded object-cover">
                    <span class="text-gray-800">{{ $item['name'] }}</span>
                </div>
                <div class="text-gray-600">${{ number_format($item['price'], 2) }}</div>
                <div class="text-gray-600">{{ $item['quantity'] }}</div>
                <div class="text-gray-800 font-semibold">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                <div>
                    <button class="text-red-500 hover:text-red-700 text-lg">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 mb-8">
        <div class="flex items-center">
            <i class="ri-shopping-cart-line text-2xl mr-2"></i>
            <p>Your cart is empty. Please add items before checking out.</p>
        </div>
    </div>
    @endif

    <!-- Shipping Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
            @csrf
            <h3 class="text-xl font-bold text-indigo-600 mb-2">Shipping Information</h3>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="phone" class="block font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" id="phone" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div>
                <label for="address" class="block font-medium text-gray-700 mb-1">Shipping Address</label>
                <textarea name="address" id="address" rows="3" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <!-- Payment Method -->
            <div>
                <h4 class="text-lg font-medium text-gray-700 mb-2">Payment Method</h4>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" name="payment_method" value="cod" checked>
                        <span class="ml-2 text-gray-700">Cash on Delivery</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" name="payment_method" value="online">
                        <span class="ml-2 text-gray-700">Online Payment</span>
                    </label>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold text-lg shadow-md transition">
                    ✅ Place Order Now
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
