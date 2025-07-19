@extends('layout.app')
@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
        style="background-image: url('{{ asset('images/payment.webp') }}');">
        <div class="z-10 max-w-xl text-black space-y-4">
            <p class="text-xl">
                <span class="text-4xl font-bold">Payment</span> Page
            </p>
            <p>
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-2 text-black">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">PAYMENT PAGE</span>
            </p>
        </div>
    </div>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Payment</h1>
        <form action="{{ route('place.order') }}" method="POST" onsubmit="return validatePaymentForm();">
            @csrf
            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
            <input type="hidden" name="phone" value="{{ $validated['phone'] }}">
            <input type="hidden" name="address" value="{{ auth()->user()->address ?? 'Not set yet.' }}">
            <input type="hidden" name="notes" value="{{ $notes }}">
            <input type="hidden" name="post_code" value="000000">
            <input type="hidden" id="payment_method" name="payment_method" value="COD">
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 px-10 bg-white dark:bg-black dark:text-white shadow rounded p-4">
                <a href="#cod"
                    class="tab-button block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200">Cash
                    on Delivery</a>
                <a href="#card"
                    class="tab-button block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200">Online
                    Payment</a>
            </div>
            <div id="cod" class="tab-content bg-white shadow rounded p-6 dark:bg-black dark:text-white">
                <h2 class="text-xl font-semibold mb-4">Cash on Delivery</h2>
                <label class="flex items-center gap-2 text-gray-700">
                    <input type="checkbox" class="w-5 h-5 accent-blue-500" data-required>
                    <span>I agree to pay by Cash on Delivery (COD).</span>
                </label>
                <button type="submit" class="mt-6 bg-orange-400 hover:bg-[#0B1D51] text-white px-6 py-3 rounded">
                    Place Order
                </button>
            </div>
            <div id="card" class="tab-content hidden bg-white shadow rounded p-6 dark:bg-black dark:text-white">
                <div class="space-y-5">
                    @foreach ([
            'card_name' => 'e.g., John Doe',
            'card_number' => 'xxxx-xxxx-xxxx-xxxx',
            'cvv' => '123',
            'expiry' => 'MM/YY',
        ] as $name => $placeholder)
                        <div>
                            <label class="block font-semibold text-xl text-gray-700 mb-1 capitalize">
                                {{ str_replace('_', ' ', $name) }}
                            </label>
                            <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}"
                                class="w-full px-4 py-3 rounded border border-gray-300 bg-gray-100 focus:outline-none card-field"
                                data-required>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="mt-6 bg-orange-400 hover:bg-[#0B1D51] text-white px-6 py-3 rounded">
                    Pay Now
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function showTab(tabId) {
            $('.tab-content').addClass('hidden');
            $('.tab-button').removeClass('bg-orange-400 text-white')
                .addClass('bg-gray-100 text-gray-700 dark:bg-black dark:text-white');

            $('#' + tabId).removeClass('hidden');
            $('.tab-button[href="#' + tabId + '"]').removeClass('bg-gray-100 text-gray-700 dark:bg-black dark:text-white')
                .addClass('bg-orange-400 text-white');

            $('#payment_method').val(tabId === 'card' ? 'Card' : 'COD');

            $('[data-required]').removeAttr('required');
            $('#' + tabId).find('[data-required]').attr('required', 'required');
        }

        function validatePaymentForm() {
            const visibleTab = $('.tab-content:visible');
            let valid = true;

            visibleTab.find('[data-required]').each(function() {
                if ($(this).is(':checkbox') && !$(this).is(':checked')) {
                    alert("Please accept the checkbox.");
                    $(this).focus();
                    valid = false;
                    return false;
                } else if ($(this).is(':text') && !$(this).val().trim()) {
                    alert("Please fill all required fields.");
                    $(this).focus();
                    valid = false;
                    return false;
                }
            });

            return valid;
        }

        const goTopBtn = document.getElementById('goTopBtn');
        window.addEventListener('scroll', () => {
            goTopBtn.classList.toggle('hidden', window.scrollY <= 300);
        });
        goTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        $(document).ready(function() {
            showTab('cod');

            $('.tab-button').click(function(e) {
                e.preventDefault();
                const tabId = $(this).attr('href').substring(1);
                showTab(tabId);
            });
        });
    </script>
@endpush
