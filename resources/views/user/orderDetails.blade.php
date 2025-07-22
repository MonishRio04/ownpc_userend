@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <div class="max-w-7xl mx-auto px-4 sm:px-8 md:px-16 py-6 sm:py-8 md:py-10">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-6 md:mb-8">Order {{ $order->invoice_no }}</h2>

        <div class="bg-gradient-to-r from-blue-50 to-white border border-blue-100 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
            <p class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">Order placed on
                <span class="font-semibold text-gray-800">
                    {{ \Carbon\Carbon::parse($order->order_date)->format('F d, Y') }}
                </span>
            </p>
            <p class="text-xs sm:text-sm text-gray-600 whitespace-nowrap">Current Status:
                <span
                    class="inline-block px-2 py-0.5 sm:px-3 sm:py-1 rounded-full font-semibold text-xs sm:text-sm
                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>

        <div class="bg-white border rounded-xl shadow-sm overflow-hidden mb-6 sm:mb-8 md:mb-10">
            <div class="px-4 sm:px-6 py-3 sm:py-4 border-b">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Products in this Order</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs sm:text-sm text-gray-700">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Image</th>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Product</th>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Color / Size</th>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Qty</th>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Price</th>
                            <th class="p-2 sm:p-3 md:p-4 text-left">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-2 sm:p-3 md:p-4">
                                    <img src="{{ asset($item->product->product_thambnail) }}" alt="Product"
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 object-cover rounded-md">
                                </td>
                                <td class="p-2 sm:p-3 md:p-4">
                                    <p class="font-medium">{{ $item->product->product_name }}</p>
                                    <p class="text-xs text-gray-500">Code: {{ $item->product->product_code }}</p>
                                </td>
                                <td class="p-2 sm:p-3 md:p-4">{{ $item->color ?? '-' }} / {{ $item->size ?? '-' }}</td>
                                <td class="p-2 sm:p-3 md:p-4">{{ $item->qty }}</td>
                                <td class="p-2 sm:p-3 md:p-4">₹{{ number_format($item->price, 2) }}</td>
                                <td class="p-2 sm:p-3 md:p-4 font-semibold text-gray-800">
                                    ₹{{ number_format($item->price * $item->qty, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8 md:mb-10">
            <div class="bg-white border rounded-xl shadow-sm p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">Payment Summary</h3>
                <ul class="text-xs sm:text-sm text-gray-700 space-y-1 sm:space-y-2">
                    <li><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</li>
                    <li><strong>Payment Type:</strong> {{ ucfirst($order->payment_type) }}</li>
                    <li><strong>Transaction ID:</strong> {{ $order->transaction_id ?? '-' }}</li>
                    <li><strong>Currency:</strong> {{ strtoupper($order->currency) }}</li>
                    <li><strong>Total Paid:</strong> <span
                            class="font-semibold text-green-600">₹{{ number_format($order->amount, 2) }}</span></li>
                </ul>
            </div>

            <div class="bg-white border rounded-xl shadow-sm p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-3 sm:mb-4">Shipping Information</h3>
                <ul class="text-xs sm:text-sm text-gray-700 space-y-1 sm:space-y-2">
                    <li><strong>Name:</strong> {{ $order->name }}</li>
                    <li><strong>Email:</strong> {{ $order->email }}</li>
                    <li><strong>Phone:</strong> {{ $order->phone }}</li>
                    <li><strong>Address:</strong> {{ $order->address }}, {{ $order->post_code }}</li>
                    <li><strong>Division / District / State:</strong> {{ $order->division_id }} /
                        {{ $order->district_id }} / {{ $order->state_id }}</li>
                    <li><strong>Order Notes:</strong> {{ $order->notes ?? '-' }}</li>
                </ul>
            </div>
        </div>

        <div class="text-right mt-4 sm:mt-6">
            <a href="{{ route('user.invoice.download', $order->id) }}"
                class="inline-flex items-center gap-1 sm:gap-2 bg-[#0B1D51] hover:bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm font-medium shadow">
                <i class="fa-solid fa-file-invoice text-xs sm:text-sm"></i> Download Invoice
            </a>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                const goTopBtn = $('#goTopBtn');

                $(window).scroll(function() {
                    goTopBtn.toggleClass('hidden', $(window).scrollTop() <= 300);
                });

                goTopBtn.click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'slow');
                });
            });
        </script>
    @endpush
@endsection