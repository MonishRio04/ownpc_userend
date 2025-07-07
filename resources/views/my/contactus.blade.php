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
            Contact with <span class="text-4xl font-bold">us</span> 
        </p>

        <p>
            <a href="/" class="text-white font-bold">HOME</a>
            <span class="mx-2 text-white">
                <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
            </span>
            <span class="font-bold">CONTACT US</span>
        </p>
    </div>
</div>

<section class="p-19">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

        
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-black">Connect Us</h2>

            <div>
                <h4 class="text-lg font-semibold">Company Address</h4>
                <p class="text-gray-600">10001, 5th Avenue, 12202 street, USA.</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold">Call Us</h4>
                <p class="text-gray-600">+1(21) 112 7368</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold">Email Us</h4>
                <p class="text-gray-600">example@mail.com</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold">Customer Support</h4>
                <p class="text-gray-600">info@support.com</p>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <form action="#" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="name" placeholder="Your Name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>

                <input type="email" name="email" placeholder="Your Email"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>

                <input type="text" name="subject" placeholder="Subject"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">

                <input type="url" name="website" placeholder="Website URL"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">

                <textarea name="message" rows="4" placeholder="Type your message here"
                          class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200"></textarea>

                <button type="submit"
                        class="bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold px-6 py-2 rounded-md transition">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>
<div class="px-6 md:px-18">
    <p class="font-bold text-black text-2xl p-2 pt-12">Electronics:</p>
    <p class="p-2 text-gray-700">
        If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
        make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
        laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
        video and more.
    </p>

    <div class="flex flex-col md:flex-row justify-between gap-6 text-center mt-6 pb-12">
        <div class="flex-1 p-4 rounded shadow">
            <h1 class="font-bold text-2xl p-2">Free Shipping</h1>
            <p>on orders over $100</p>
        </div>

        <div class="flex-1 p-4 rounded shadow">
            <h1 class="font-bold text-2xl p-2">Fast Delivery</h1>
            <p>World Wide</p>
        </div>

        <div class="flex-1 p-4 rounded shadow">
            <h1 class="font-bold text-2xl p-2">Big Choice</h1>
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
