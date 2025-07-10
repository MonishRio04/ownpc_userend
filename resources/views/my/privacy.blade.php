@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[400px] bg-cover bg-center flex items-center px-16"
        style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-4">
            <p class="text-lg">
                <span class="text-4xl font-bold">Privacy</span> policy
            </p>

            <p>
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">PRIVACY POLICY</span>
            </p>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8 ">
        <h2 class="text-2xl font-bold mb-6 text-black">Privacy Policy</h2>

        <p class="mb-4 pl-2 text-gray-500 text-xl">
            We value the trust you place in us. That's why we insist upon the highest standards for secure transactions and
            customer information privacy. Please read the following statement to learn about our information gathering and
            dissemination practices.
        </p>

        <p class="mb-4 pl-2 text-gray-500 text-xl">
            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </p>

        <h3 class="text-2xl font-bold mt-8 mb-4">Personally Identifiable Information and Other Information</h3>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
            in the middle of the text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
            necessary.
        </p>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            The first true generator on the Internet uses a dictionary of over 200 Latin words, combined with a handful of
            model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is
            therefore always free from repetition and injected humour.
        </p>

        <h3 class="text-2xl font-bold mt-8 mb-4">Security Precautions</h3>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of <i>"de Finibus Bonorum et Malorum"</i> (The Extremes of
            Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during
            the Renaissance.
        </p>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet...", comes from a line in section 1.10.32. A Latin
            professor at Hampden-Sydney College in Virginia identified this source while researching the classical usage of
            words like <i>consectetur</i>.
        </p>

        <h3 class="text-2xl font-bold mt-8 mb-4">What Information Can I Access?</h3>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            Many websites still use Lorem Ipsum as their default model text. Various versions have evolved over the years,
            sometimes by accident, sometimes intentionally (injected humour, etc.).
        </p>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic
            words.
        </p>

        <h3 class="text-2xl font-bold mt-8 mb-4">Statistical Information</h3>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
            some form. If you are going to use a passage, you need to ensure there isn't anything embarrassing hidden in the
            middle of the text.
        </p>

        <h3 class="text-2xl font-bold mt-8 mb-4">User Consent</h3>
        <ul class="list-disc pl-6 mb-4 space-y-2 text-gray-500 text-xl">
            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has a more-or-less normal
                distribution of letters.</li>
            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                aperiam.</li>
            <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
        </ul>

        <h3 class="text-2xl font-bold mt-8 mb-4">Policy Updates</h3>
        <p class="mb-4 pl-2 text-gray-500 text-xl">
            Be assured that no sensitive or personal content is hidden within this generated placeholder text. All Lorem
            Ipsum generators repeat predefined chunks to ensure safety and consistency.
        </p>
    </div>



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
