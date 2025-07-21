
   @extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[300px] sm:h-[350px] md:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
        style="background-image: url('{{ asset('images/pc.png') }}');">
        <div class="z-10 max-w-xl text-white dark:text-white space-y-2 sm:space-y-4">
            <p class="text-base sm:text-lg">
                <span class="text-2xl sm:text-3xl md:text-4xl font-bold">Terms</span> of use
            </p>
            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">TERMS</span>
            </p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto space-y-6 sm:space-y-10 text-gray-800 dark:text-gray-200 text-justify leading-relaxed py-8 sm:py-16 px-4 sm:px-8 md:px-16">
        <p class="text-xl sm:text-2xl md:text-3xl font-bold">Please read these terms and conditions carefully.</p>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">Personal Information</h2>
            <ol class="list-decimal list-inside space-y-1 sm:space-y-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                <li>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
            </ol>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">License & Site Access</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">Eligibility</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                embarrassing</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">It uses a dictionary of over 200 Latin words to generate Lorem Ipsum</p>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">Account & Registration</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">Latin professor at Hampden-Sydney College in Virginia looked up one of the obscure words
            </p>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">Cancellation by Site / Customer</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
                websites still in their infancy</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">Latin words, combined with a handful of model sentence structures</p>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">You Agree and Confirm</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                alteration</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                embarrassing hidden in the middle</p>
        </div>

        <div>
            <h2 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-4">Copyright & Trademark</h2>
            <p class="pl-4 sm:pl-6 md:pl-12 lg:pl-24">You need to be sure there isn't anything embarrassing hidden in the middle of text</p>
            <p class="mt-1 sm:mt-2 pl-4 sm:pl-6 md:pl-12 lg:pl-24">It uses a dictionary of over 200 Latin words, combined with a handful of model sentence
                structures</p>
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
