@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
         style="background-image: url('{{ asset('images/pc.png') }}');">

        <div class="z-10 max-w-xl text-white dark:text-white space-y-2 sm:space-y-4">
            <p class="text-base sm:text-lg">
                <span class="text-2xl sm:text-3xl md:text-4xl font-bold">Privacy</span> policy
            </p>

            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">PRIVACY POLICY</span>
            </p>
        </div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 py-6 sm:py-8">
        <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-black">Privacy Policy</h2>

        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            We value the trust you place in us. That's why we insist upon the highest standards for secure transactions and
            customer information privacy. Please read the following statement to learn about our information gathering and
            dissemination practices.
        </p>

        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
            numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
        </p>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">Personally Identifiable Information and Other Information</h3>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
            in the middle of the text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
            necessary.
        </p>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            The first true generator on the Internet uses a dictionary of over 200 Latin words, combined with a handful of
            model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is
            therefore always free from repetition and injected humour.
        </p>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">Security Precautions</h3>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of <i>"de Finibus Bonorum et Malorum"</i> (The Extremes of
            Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during
            the Renaissance.
        </p>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet...", comes from a line in section 1.10.32. A Latin
            professor at Hampden-Sydney College in Virginia identified this source while researching the classical usage of
            words like <i>consectetur</i>.
        </p>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">What Information Can I Access?</h3>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            Many websites still use Lorem Ipsum as their default model text. Various versions have evolved over the years,
            sometimes by accident, sometimes intentionally (injected humour, etc.).
        </p>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic
            words.
        </p>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">Statistical Information</h3>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
            some form. If you are going to use a passage, you need to ensure there isn't anything embarrassing hidden in the
            middle of the text.
        </p>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">User Consent</h3>
        <ul class="list-disc pl-4 sm:pl-6 mb-3 sm:mb-4 space-y-1 sm:space-y-2 text-gray-500 text-base sm:text-xl">
            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has a more-or-less normal
                distribution of letters.</li>
            <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                aperiam.</li>
            <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
        </ul>

        <h3 class="text-xl sm:text-2xl font-bold mt-6 sm:mt-8 mb-3 sm:mb-4">Policy Updates</h3>
        <p class="mb-3 sm:mb-4 pl-2 text-gray-500 text-base sm:text-xl">
            Be assured that no sensitive or personal content is hidden within this generated placeholder text. All Lorem
            Ipsum generators repeat predefined chunks to ensure safety and consistency.
        </p>
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