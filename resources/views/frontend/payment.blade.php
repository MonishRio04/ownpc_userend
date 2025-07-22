@extends('layout.app')
@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
    <div class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
        style="background-image: url('{{ asset('images/payment.webp') }}');">
        <div class="z-10 max-w-xl text-black space-y-2 sm:space-y-4">
            <p class="text-base sm:text-xl">
                <span class="text-2xl sm:text-3xl md:text-4xl font-bold">Payment</span> Page
            </p>
            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-black">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">PAYMENT PAGE</span>
            </p>
        </div>
    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-6 sm:py-10">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">Payment</h1>
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
                class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 mb-4 sm:mb-6 px-4 sm:px-6 md:px-10 bg-white dark:bg-black dark:text-white shadow rounded p-3 sm:p-4">
                <a href="#cod"
                    class="tab-button block text-center rounded-lg shadow px-3 py-4 sm:px-4 sm:py-6 font-semibold cursor-pointer transition duration-200 text-sm sm:text-base">Cash
                    on Delivery</a>
                <a href="#card"
                    class="tab-button block text-center rounded-lg shadow px-3 py-4 sm:px-4 sm:py-6 font-semibold cursor-pointer transition duration-200 text-sm sm:text-base">Online
                    Payment</a>
            </div>
            <div id="cod" class="tab-content bg-white shadow rounded p-4 sm:p-6 dark:bg-black dark:text-white">
                <h2 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Cash on Delivery</h2>
                <label class="flex items-center gap-2 text-gray-700 text-sm sm:text-base">
                    <input type="checkbox" class="w-4 h-4 sm:w-5 sm:h-5 accent-blue-500" data-required>
                    <span>I agree to pay by Cash on Delivery (COD).</span>
                </label>
                <button type="submit" class="mt-4 sm:mt-6 bg-orange-400 hover:bg-[#0B1D51] text-white px-4 py-2 sm:px-6 sm:py-3 rounded text-sm sm:text-base">
                    Place Order
                </button>
            </div>
            <div id="card" class="tab-content hidden bg-white shadow rounded p-4 sm:p-6 dark:bg-black dark:text-white">
                <div class="space-y-3 sm:space-y-5">
                    @foreach ([
            'card_name' => 'e.g., John Doe',
            'card_number' => 'xxxx-xxxx-xxxx-xxxx',
            'cvv' => '123',
            'expiry' => 'MM/YY',
        ] as $name => $placeholder)
                        <div>
                            <label class="block font-semibold text-lg sm:text-xl text-gray-700 mb-1 capitalize">
                                {{ str_replace('_', ' ', $name) }}
                            </label>
                            <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}"
                                class="w-full px-3 py-2 sm:px-4 sm:py-3 rounded border border-gray-300 bg-gray-100 focus:outline-none card-field text-sm sm:text-base"
                                data-required>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="mt-4 sm:mt-6 bg-orange-400 hover:bg-[#0B1D51] text-white px-4 py-2 sm:px-6 sm:py-3 rounded text-sm sm:text-base">
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

    visibleTab.find('[data-required]').each(function () {
        const $field = $(this);

        if ($field.is(':checkbox') && !$field.is(':checked')) {
            alert("Please accept the checkbox.");
            $field.focus();
            valid = false;
            return false;
        }

        if ($field.is(':text') && !$field.val().trim()) {
            alert("Please fill all required fields.");
            $field.focus();
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