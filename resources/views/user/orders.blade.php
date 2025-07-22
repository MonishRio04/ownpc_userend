@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-8 md:py-10">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center text-gray-800">My Orders</h2>
       
        <div class="space-y-3 sm:space-y-4">
            @forelse($orders as $order)
                <div onclick="window.location='{{ route('user.order.details', $order->id) }}';"
                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md transform hover:-translate-y-1 transition duration-300 cursor-pointer p-3 sm:p-4">

                    <div class="grid grid-cols-1 sm:grid-cols-5 gap-3 sm:gap-4 items-center">

                        <div>
                            <div class="text-xs sm:text-sm text-gray-400">Order ID</div>
                            <div class="font-semibold text-sm sm:text-base text-gray-800 dark:text-white">{{ $order->id }}</div>
                        </div>

                        <div class="sm:col-span-2">
                            <div class="flex overflow-x-auto space-x-2 sm:space-x-3 scrollbar-hide">
                                @foreach ($order->items as $item)
                                    <div class="min-w-[80px] sm:min-w-[100px]">
                                        <img src="{{ asset($item->product->product_thambnail) }}"
                                            alt="{{ $item->product->name }}"
                                            class="w-full h-12 sm:h-16 object-contain rounded mb-1" />
                                        <div class="text-xs text-gray-600 dark:text-gray-300 truncate">
                                            {{ \Illuminate\Support\Str::limit($item->product->name, 30) }}
                                        </div>
                                        <div class="text-[10px] sm:text-[11px] text-gray-500 dark:text-gray-400 text-center">
                                            Qty: {{ $item->qty }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div class="text-xs sm:text-sm text-gray-400">Amount</div>
                            <div class="text-green-600 font-bold text-sm sm:text-base">₹{{ number_format($order->amount, 2) }}</div>
                        </div>

                        <div class="text-center">
                            <div class="text-xs sm:text-sm text-gray-400">Status</div>
                            <div class="mb-1">
                                <span
                                    class="inline-block px-2 py-0.5 sm:px-3 sm:py-1 text-xs font-medium rounded-full
                                @if ($order->status === 'delivered') bg-green-100 text-green-800
                                @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                   @elseif($order->status === 'processing') bg-green-100 text-green-800
                                      @elseif($order->status === 'confirmed') bg-green-100 text-green-800
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-700 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <div class="text-gray-500 dark:text-gray-300 text-xs sm:text-sm">
                                {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 sm:py-20 text-gray-400 text-sm sm:text-base">
                    You haven't placed any orders yet.
                </div>
            @endforelse
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