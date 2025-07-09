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
            <span class="text-4xl font-bold">Terms</span> of use
        </p>

        <p>
            <a href="/" class="text-orange-400 font-bold">HOME</a>
            <span class="mx-2 text-white dark:text-gray-300">
                <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
            </span>
            <span class="font-bold">TERMS</span>
        </p>
    </div>
</div>

<div class="max-w-5xl space-y-10 text-gray-800 dark:text-gray-200 text-justify leading-relaxed py-16">
    <p class="text-3xl font-bold pl-16">Please read these terms and conditions carefully.</p>
    
    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">Personal Information</h2>
        <ol class="list-decimal list-inside space-y-2 pl-24">
            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</li>
            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
        </ol>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">License & Site Access</h2>
        <p class="pl-24">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
        <p class="mt-2 pl-24">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
        <p class="mt-2 pl-24">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">Eligibility</h2>
        <p class="pl-24">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing</p>
        <p class="mt-2 pl-24">It uses a dictionary of over 200 Latin words to generate Lorem Ipsum</p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">Account & Registration</h2>
        <p class="pl-24">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"</p>
        <p class="mt-2 pl-24">Latin professor at Hampden-Sydney College in Virginia looked up one of the obscure words</p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">Cancellation by Site / Customer</h2>
        <p class="pl-24">Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many websites still in their infancy</p>
        <p class="mt-2 pl-24">Latin words, combined with a handful of model sentence structures</p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pr-10 pl-16">You Agree and Confirm</h2>
        <p class="pl-24">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <p class="mt-2 pl-24">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle</p>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4 pl-16">Copyright & Trademark</h2>
        <p class="pl-24">You need to be sure there isn't anything embarrassing hidden in the middle of text</p>
        <p class="mt-2 pl-24">It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures</p>
    </div>
</div>

<div class="relative w-full h-[500px] bg-fixed bg-center bg-cover"
     style="background-image: url('{{ asset('images/logo.jpg') }}');">

    <div class="flex h-full p-18">
        <div class="w-1/2 flex justify-center items-center">
            <img src="{{ asset('images/pc.png') }}" alt="PC 1" class="w-[90%] h-auto rounded shadow-lg" />
        </div>

        <div class="w-1/2 flex justify-center items-center">
            <img src="{{ asset('images/pc2.jpg') }}" alt="PC 2" class="w-[90%] h-auto rounded shadow-lg" />
        </div>
    </div>
</div>

<div class="px-16">
    <p class="font-bold text-black dark:text-white text-2xl p-2 pt-12">Electronics:</p>
    <p class="p-2 text-black dark:text-gray-300">
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
