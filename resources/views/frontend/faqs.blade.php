@extends('layout.app')

@section('content')
    <button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-2xl sm:text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <div class="relative w-full h-[300px] sm:h-[400px] bg-cover bg-center flex items-center px-4 sm:px-8 md:px-16"
        style="background-image: url('{{ asset('images/pc.png') }}');">
        <div class="z-10 max-w-xl text-white dark:text-white space-y-2 sm:space-y-4">
            <p class="text-base sm:text-lg">
                <span class="text-2xl sm:text-3xl md:text-4xl font-bold">Frequently</span> asked questions
            </p>
            <p class="text-sm sm:text-base">
                <a href="/" class="text-orange-400 font-bold">HOME</a>
                <span class="mx-1 sm:mx-2 text-white dark:text-gray-300">
                    <i class="fa-solid fa-greater-than text-xs font-bold leading-none"></i>
                </span>
                <span class="font-bold">FAQS</span>
            </p>
        </div>
    </div>
    
    <section class="px-4 sm:px-8 md:px-16 py-8 sm:py-12 md:py-16 bg-white dark:bg-gray-900">
        <h2 class="text-2xl sm:text-3xl font-bold text-black dark:text-white mb-6 sm:mb-10">
            Top 10 FAQ's
        </h2>

        <div class="max-w-full space-y-4 sm:space-y-6 md:space-y-8">
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
                    <h3 class="text-lg sm:text-xl font-semibold text-black dark:text-white mb-1 sm:mb-2">
                        {{ $loop->iteration }}. {{ $question }}
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 text-sm sm:text-base">
                        {{ $answer }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

   
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