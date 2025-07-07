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
            Few Words about <span class="text-4xl font-bold">us</span> 
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
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-6xl w-full bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        
      
        <div class="w-full md:w-1/2 flex flex-col justify-center">
            
          
            <div class="p-8 md:p-12 text-center md:text-left">
                <h1 class="text-2xl md:text-3xl font-semibold text-black tracking-wide leading-snug">
                    <span class="text-3xl md:text-4xl font-bold">We Work</span> for your best Success
                </h1>
            </div>

            <div class="px-8 md:px-12 pb-8 md:pb-12">
                <p class="text-gray-700 mb-6 leading-relaxed">
                    We specialize in crafting high-performance custom PCs tailored to your needs. <br>Whether you're a gamer, creator, or professional, we deliver optimized machines built with precision and care.
                </p>

        
                <div class="space-y-4 mb-8">
                    <div class="flex items-start">
                        <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-3 text-lg"></i>
                        <span class="text-gray-700">Expert-built systems for gamers, designers, and developers</span>
                    </div>

                    <div class="flex items-start">
                        <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-3 text-lg"></i>
                        <span class="text-gray-700">Trusted support and guidance throughout your journey</span>
                    </div>

                    <div class="flex items-start">
                        <i class="fa-solid fa-square-check text-orange-400 mt-1 mr-3 text-lg"></i>
                        <span class="text-gray-700">Fast delivery and easy upgrade options at your fingertips</span>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <a href="{{ route('Appliances') }}" class="inline-block bg-orange-400 text-white font-bold py-3 px-6 rounded-full text-lg shadow-lg hover:bg-[#0B1D51] transition transform hover:-translate-y-1 duration-300">
                        VIEW OUR PRODUCTS
                    </a>
                </div>
            </div>
        </div>

    
        <div class="w-full md:w-1/2 flex justify-center items-center bg-white p-6">
            <img src="{{ asset('images/28.png') }}" alt="Custom PC" class="max-w-full h-auto rounded-xl shadow-lg">
        </div>
    </div>
</div>

<div class="relative w-full h-[600px] bg-fixed bg-center bg-cover"
     style="background-image: url('{{ asset('images/review.webp') }}');">

 
    <div class="absolute top-10 left-1/2 transform -translate-x-1/2  z-10">
        <h2 class="text-4xl font-semibold text-white">Our <span class="text-5xl font-bold">Customer </span>Say</h2>
        <p class="text-white mt-2">Real feedback from our happy clients</p>
    </div>

  <div class="flex flex-col md:flex-row justify-center items-center gap-6 h-full px-10 pt-32 z-10 relative">

    <div class="bg-white rounded-xl shadow-lg p-6 h-56 w-full md:w-1/3 flex flex-col justify-between">
        
    
        <p class="text-xl font-semibold text-gray-700 leading-snug mb-4">
            "Amazing PC builder site! I built my dream rig in minutes and got it delivered fast."
        </p>

        <div class="flex items-center space-x-5">

            <img src="{{ asset('images/shreya.jpg') }}" alt="S" class="w-10 h-10 rounded-full object-cover shadow">

            <div>
                <h3 class="text-lg font-bold text-gray-800">Shreya P.</h3>
                <span class="text-xs text-gray-500">Software Engineer</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 h-56 w-full md:w-1/3 flex flex-col justify-between">
        <p class="text-xl font-semibold text-gray-700 leading-snug mb-4">
            "Great support and value for money. Their team really helped me with choosing the right parts."
        </p>
        <div class="flex items-center space-x-5">
            <img src="{{ asset('images/rahul.jpg') }}" alt="R" class="w-10 h-10 rounded-full object-cover shadow">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Rahul M.</h3>
                <span class="text-xs text-gray-500">Tech Enthusiast</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 h-56 w-full md:w-1/3 flex flex-col justify-between">
        <p class="text-xl font-semibold text-gray-700 leading-snug mb-4">
            "Highly recommended. Super clean UI and very smooth experience."
        </p>
        <div class="flex items-center space-x-5">
            <img src="{{ asset('images/anita.jpg') }}" alt="A" class="w-10 h-10 rounded-full object-cover shadow">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Anita R.</h3>
                <span class="text-xs text-gray-500">Gamer & Streamer</span>
            </div>
        </div>
    </div>

</div>


</div>
<div class="px-18">
        <p class="font-bold text-black text-2xl p-2 pt-12">Electronics:</p>
        <p class="p-2">
            If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
            make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs,
            laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio,
            video and more.
        </p>

        <div class="flex justify-between gap-6 text-center mt-6 pb-12">

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Free Shipping</h1>
                <p>on orders over $100</p>
            </div>

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Fast Delivery</h1>
                <p>World Wide</p>
            </div>

            <div class="flex-1  p-4 rounded shadow">
                <h1 class="font-bold text-2xl p-2">Big Choice</h1>
                <p>of Products</p>
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
