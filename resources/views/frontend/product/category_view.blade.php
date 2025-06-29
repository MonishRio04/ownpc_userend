@extends('frontend.master_dashboard')

@section('title')
    {{ $breadcat->category_name }} Category
@endsection

@section('main')
<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-12">
                    <h5 class="mb-15">{{ $breadcat->category_name }}</h5>
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span>{{ $breadcat->category_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-9"> {{-- col-lg-9 instead of col-lg-4-5 --}}
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    {{-- Sort dropdowns here (unchanged) --}}
                </div>
            </div>

            <div class="row product-grid">
                @foreach($products as $product)
                    <x-product-card :product="$product" class="col-md-3 col-12 col-sm-6" />
                @endforeach
            </div>

            <div class="pagination-area mt-20 mb-20">
                {{-- Pagination (if needed use Laravel’s paginate) --}}
                {{ $products->links() }}
            </div>
        </div>

        <div class="col-lg-3"> {{-- col-lg-3 instead of col-lg-1-5 --}}
            {{-- Sidebar: Categories --}}
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Category</h5>
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">
                                <img src="{{ asset($category->category_image) }}" alt="" />
                                {{ $category->category_name }}
                            </a>
                            <span class="count">{{ $category->products_count ?? 0 }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Sidebar: New Products --}}
            {{-- <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">New products</h5>
                @foreach($newProduct as $np)
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="{{ asset($np->product_thambnail) }}" alt="{{ $np->product_name }}" />
                        </div>
                        <div class="content pt-10">
                            <p><a href="{{ url('product/details/' . $np->id . '/' . $np->product_slug) }}">{{ $np->product_name }}</a></p>
                            <p class="price mb-0 mt-5">
                                ₹{{ $np->discount_price ?? $np->selling_price }}
                            </p>
                            <div class="product-rate">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>             --}}
        </div>
    </div>
</div>
@endsection
