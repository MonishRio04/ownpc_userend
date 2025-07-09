@extends('layout.app')

@section('content')

<button id="goTopBtn" 
        class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
    <i class="fa-solid fa-arrow-up-from-bracket"></i>
</button>

<div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
     style="background-image: url('{{ asset('images/pc.png') }}');">
    <div class="z-10 max-w-xl text-white space-y-4">
        <p class="text-lg">
             <span class="text-4xl font-bold">Payment</span> Page
        </p>
        <p>
            <a href="/" class="text-orange-400 font-bold">HOME</a>
            <span class="mx-2 text-white">
                <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
            </span>
            <span class="font-bold">PAYMENT PAGE</span>
        </p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Payment</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6 px-10 bg-white dark:bg-black dark:text-white shadow rounded p-4">
    <a href="#cod" class="tab-button active-tab block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200" onclick="showTab(event, 'cod')">Cash on Delivery</a>
    <a href="#card" class="tab-button block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200" onclick="showTab(event, 'card')">Credit/Debit Card</a>
    <a href="#netbanking" class="tab-button block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200" onclick="showTab(event, 'netbanking')">Net Banking</a>
    <a href="#paypal" class="tab-button block text-center rounded-lg shadow px-4 py-6 font-semibold cursor-pointer transition duration-200" onclick="showTab(event, 'paypal')">PayPal Account</a>
</div>


    <div id="cod" class="tab-content bg-white shadow rounded p-6 dark:bg-black dark:text-white">
        <h2 class="text-xl font-semibold mb-4">COD</h2>
       <label class="flex items-center gap-2 text-gray-700">
    <input type="checkbox" class="w-5 h-5 accent-blue-500">
    <span>We also accept Credit/Debit card on delivery. Please check with the agent.</span>
</label>

    </div>

    <div id="card" class="tab-content hidden bg-white shadow rounded p-6 dark:bg-black dark:text-white">
        <div class="space-y-5">
            @foreach (['Name on Card' => 'e.g., John Doe', 'Card Number' => 'xxxx-xxxx-xxxx-xxxx', 'CVV' => 'e.g., 123', 'Expiration Date' => 'MM/YY'] as $label => $placeholder)
            <div>
                <label class="block font-semibold text-xl text-gray-700 mb-1">{{ $label }}</label>
                <input type="text" placeholder="{{ $placeholder }}"
                       class="w-full px-4 py-3 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            @endforeach
        </div>
        <button class="mt-6 bg-orange-400 hover:bg-[#0B1D51] text-white px-6 py-3 rounded">Make Payment</button>
    </div>

    <div id="netbanking" class="tab-content hidden bg-white shadow rounded p-6 dark:bg-black dark:text-white">
    <h2 class="text-xl font-bold mb-4">Select From Popular Banks</h2>
    <div class="space-y-2">
        @foreach (['Syndicate Bank', 'Bank of Baroda', 'Canara Bank', 'ICICI Bank', 'State Bank Of India'] as $bank)
            <label class="block"><input type="radio" name="bank" class="mr-2"> {{ $bank }}</label>
        @endforeach

        <label class="block font-bold text-gray-700 mt-2 text-xl">Or select other banks:</label>
        <select name="other_bank" class="w-full mt-1  border-gray-300 rounded px-4 py-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-none">
            <option value="">===Other Banks===</option>
            <option value="HDFC Bank">HDFC Bank</option>
            <option value="Axis Bank">Axis Bank</option>
            <option value="Union Bank">Union Bank</option>
            <option value="Yes Bank">Yes Bank</option>
            <option value="Federal Bank">Federal Bank</option>
            <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
            <option value="IndusInd Bank">IndusInd Bank</option>
        </select>
    </div>

    <button class="mt-4 bg-orange-400 hover:bg-[#0B1D51] text-white px-6 py-2 rounded">Pay Now</button>
</div>


    <div id="paypal" class="tab-content hidden bg-white shadow rounded p-6 dark:bg-black dark:text-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            <div>
                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal Logo" class="mb-4 w-28">
                <p class="text-gray-600 text-sm">
                    <strong>Important:</strong> You will be redirected to PayPal's website to securely complete your payment.
                </p>
                <button class="mt-4 bg-[#0B1D51] text-white px-6 py-2 rounded">Checkout via PayPal</button>
            </div>
            <div class="space-y-5">
                @foreach (['Card Holder' => 'e.g., John Doe', 'Card Number' => 'xxxx-xxxx-xxxx-xxxx', 'CVV' => 'e.g., 123', 'Valid Thru' => 'MM/YY'] as $label => $placeholder)
                <div>
                    <label class="block font-semibold text-xl text-gray-700 mb-1">{{ $label }}</label>
                    <input type="text" placeholder="{{ $placeholder }}"
                           class="w-full px-4 py-3 rounded border border-gray-300 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                @endforeach
                <button class="w-full mt-4 hover:bg-[#0B1D51] bg-orange-400 text-white px-6 py-3 rounded">Proceed Payment</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function showTab(e, tabId) {
        e.preventDefault();

        document.querySelectorAll('.tab-content').forEach(div => div.classList.add('hidden'));

        
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('bg-orange-400', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700', 'dark:bg-black', 'dark:text-white');
        });

        document.getElementById(tabId).classList.remove('hidden');

        const target = e.currentTarget;
        target.classList.remove('bg-gray-100', 'text-gray-700', 'dark:bg-black', 'dark:text-white');
        target.classList.add('bg-orange-400', 'text-white');
    }

    const goTopBtn = document.getElementById('goTopBtn');
    window.addEventListener('scroll', () => {
        goTopBtn.classList.toggle('hidden', window.scrollY <= 300);
    });
    goTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.querySelector('.tab-button')?.click();
</script>
@endpush
@endsection