@php
    $products = App\Models\Product::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();
    $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> New Products </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                        type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <a href="#category{{ $category->id }}" class="nav-link" id="nav-tab-two" data-bs-toggle="tab"
                            type="button" role="tab" aria-controls="tab-two"
                            aria-selected="false">{{ $category->category_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                    <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>

            <!--En tab one-->
            @foreach ($categories as $category)
                <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @php
                            $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                ->orderBy('id', 'DESC')
                                ->get();
                        @endphp
                        @forelse($catwiseProduct as $product)
                            <x-product-card :product="$product" />
                        @empty
                            <h5 class="text-danger">No Product Found</h5>
                        @endforelse
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
            @endforeach
            <!--En tab two-->
        </div>
        <!--End tab-content-->
    </div>
</section>
