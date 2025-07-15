@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
         style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-4">
            <p class="text-xl">
                Need Some <span class="text-4xl font-bold">Help?</span>
            </p>

            <p>
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">HELP</span>
            </p>
        </div>
    </div>

    <div class="min-h-[60vh] flex flex-col  px-16 py-20 bg-white dark:bg-gray-900">
        <h1 class="text-3xl md:text-4xl font-bold text-black dark:text-white mb-4">
            How can we help you?
        </h1>


        <div class="w-full">
            <input type="text" placeholder="Type keywords to find answers"
                class="w-full px-4 py-3 h-32 text-xl bg-white rounded shadow focus:outline-none  focus:ring-none" />
        </div>

        <div class="mt-10 w-full max-w-xs flex flex-col  gap-4">
            <a href="#"
                class="w-full bg-orange-400 hover:bg-[#0B1D51] text-white font-semibold py-3 px-6 rounded text-lg text-center">
                SUBMIT NOW
            </a>

            <p class="text-gray-600 font-medium">OR</p>

            <a href="{{ route('ContactUs') }}"
                class="w-full bg-[#0B1D51] hover:bg-orange-400 text-white font-semibold py-3 px-6 rounded text-lg text-center">
                CONTACT US
            </a>
        </div>
    </div>
    <section class="px-4 md:px-16 py-16 bg-white dark:bg-gray-900">
        <h2 class="text-3xl font-bold  text-black dark:text-white mb-10">
            Top 10 FAQ's
        </h2>

        <div class="max-w-full  space-y-8">
            @php
                $faqs = [
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ?' =>
                        'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',

                    'The standard Lorem Ipsum passage Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices ?' =>
                        'Tincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Consectetuer adipiscing elit Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices?' =>
                        'Dincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Sed diam nonummy nibh euismod Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices?' =>
                        'At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Euismod tincidunt laoreet Etiam faucibus viverra libero vel efficitur ?' =>
                        'At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Voluptas sit aspernatur aut Ut semper nisl ut laoreet ultrices ?' =>
                        'At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Donec ut quam ligula feugiat Ut semper nisl ut laoreet ultrices ?' =>
                        'At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'The standard Lorem Ipsum Ut semper nisl ut laoreet ultrices passage ?' =>
                        'Lorem ipsum dolor sit amet At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Consectetuer adipiscing Ut semper nisl ut laoreet ultrices elit ?' =>
                        'Lorem ipsum dolor sit amet At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente ab.',

                    'Sed diam nonummy Ut semper nisl ut laoreet ultrices nibh euismod ?' =>
                        'Consectetuer adipiscing elit, sed diam nonummy nibh euismodLorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate ipsam repellat ut itaque natus doloribus quo neque sapiente abLorem, ipsum dolor sit amet consectetur adipisicing elit.',
                ];
            @endphp

            @foreach ($faqs as $question => $answer)
                <div>
                    <h3 class="text-xl font-semibold text-black dark:text-white mb-2">
                        {{ $loop->iteration }}. {{ $question }}
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 text-base">
                        {{ $answer }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>


    <div class="relative w-full h-[500px] p-12 bg-fixed bg-center bg-cover"
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
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
    @endpush
@endsection
