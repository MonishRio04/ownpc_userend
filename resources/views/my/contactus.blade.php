@extends('layout.app')

@section('content')

<button id="goTopBtn" 
        class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
    <i class="fa-solid fa-arrow-up-from-bracket"></i>
</button>

<div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
     style="background-image: url('{{ asset('images/pc.png') }}');">

    <div class="z-10 max-w-xl text-white dark:text-white space-y-4">
        <p class="text-lg">
            Contact with <span class="text-4xl font-bold">us</span> 
        </p>

        <p>
            <a href="/" class="text-orange-400 font-bold">HOME</a>
            <span class="mx-2 text-white dark:text-gray-300">
                <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
            </span>
            <span class="font-bold">CONTACT US</span>
        </p>
    </div>
</div>

<section class="p-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-black dark:text-white">Connect Us</h2>

            <div>
                <h4 class="text-lg font-semibold dark:text-white">Company Address</h4>
                <p class="text-gray-600 dark:text-gray-300">10001, 5th Avenue, 12202 street, USA.</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold dark:text-white">Call Us</h4>
                <p class="text-gray-600 dark:text-gray-300">+1(21) 112 7368</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold dark:text-white">Email Us</h4>
                <p class="text-gray-600 dark:text-gray-300">example@mail.com</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold dark:text-white">Customer Support</h4>
                <p class="text-gray-600 dark:text-gray-300">info@support.com</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-lg">
            <form action="#" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="name" placeholder="Your Name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                <input type="email" name="email" placeholder="Your Email"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                <input type="text" name="subject" placeholder="Subject"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                <input type="url" name="website" placeholder="Website URL"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white">

                <textarea name="message" rows="4" placeholder="Type your message here"
                          class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white"></textarea>

                <button type="submit"
                        class="bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold px-6 py-2 rounded-md transition">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

<div class="px-6 md:px-16">
    <p class="font-bold text-black dark:text-white text-2xl p-2 pt-12">Electronics:</p>
    <p class="p-2 text-gray-700 dark:text-gray-300">
        If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
        make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
        laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
        video and more.
    </p>

    <div class="flex justify-between gap-6 text-center mt-6 pb-12">
        <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-2xl p-2">
                <i class="fa-solid fa-cart-shopping text-3xl p-2 font-bold text-orange-400"></i>Free Shipping
            </h1>
            <p>on orders over $100</p>
        </div>

        <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-2xl p-2">
                <i class="fa-solid fa-truck-fast text-3xl p-2 font-bold text-orange-400"></i>Fast Delivery
            </h1>
            <p>World Wide</p>
        </div>

        <div class="flex-1 bg-white dark:bg-gray-900 p-4 rounded shadow text-black dark:text-white">
            <h1 class="font-bold text-2xl p-2">
                <i class="fa-regular fa-thumbs-up text-3xl p-2 font-bold text-orange-400"></i>Big Choice
            </h1>
            <p>of Products</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const goTopBtn = document.getElementById('goTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            goTopBtn.classList.remove('hidden');
        } else {
            goTopBtn.classList.add('hidden');
        }
    });

    goTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush

@endsection
