@extends('layout.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="bg-white rounded-lg shadow p-6 text-center">
        <h2 class="text-2xl font-bold text-indigo-600 mb-4">Thank You, {{ $orderInfo['name'] }}!</h2>

        <p class="text-gray-700 text-lg mb-2">
            Your payment method is:
            <span class="font-semibold text-green-600 uppercase">
                {{ $orderInfo['payment_method'] === 'cod' ? 'Cash on Delivery' : 'Online Payment' }}
            </span>
        </p>

        <p class="text-gray-600 mb-6">
            Your total amount: <span class="font-bold text-gray-900">${{ number_format($orderInfo['amount'], 2) }}</span>
        </p>

        <a href="{{ url('/') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700 transition">
             Go Back to Home
        </a>
    </div>
</div>
@endsection
