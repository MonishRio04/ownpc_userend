@extends('layout.app')

@section('content')

<button id="goTopBtn" class="fixed bottom-6 right-6 text-orange-400 text-3xl font-bold z-50 hidden">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>
<h1 class="text-2xl font-bold mb-4 text-center mt-10">{{ $subcategory->subcategory_name }}</h1>


<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-10 pb-10">
    @forelse($subcategory->products as $product)
       <div class="bg-white dark:bg-gray-900 rounded shadow p-4 text-center hover:shadow-lg transition group relative">
                        <div class="relative">
                            <img src="{{ asset($product->product_thambnail ?: 'images/pc.png') }}" alt="Product Image" class="mx-auto mb-3 w-full h-[180px] object-contain">
                                                 </div>
                        <h4 class="font-semibold text-gray-800 dark:text-white mb-1 truncate">{{ $product->product_name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">₹{{ number_format($product->selling_price) }}</p>
                        <a href="{{route('showproduct',$product->id)}}">
                        
                        <button class="mt-2 bg-[#0B1D51] hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition w-1/2">Quick View</button>
                        </a>
                    </div>
    @empty
        <p class="col-span-full text-center text-gray-500">No products found in this subcategory.</p>
    @endforelse
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


