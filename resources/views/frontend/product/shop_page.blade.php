@extends('frontend.master_dashboard')
@section('main')
@section('title')
Shop Page
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h5 class="mb-15">Shop Page</h5>
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span>Shop Page
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Show:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid">
                @foreach($products as $product)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                    <img class="default-img" src="{{asset($product->product_thambnail)}}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" id="{{$product->id}}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" id="{{$product->id}}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{$product->id}}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                            </div>
                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if($product->discount_price == NULL)
                                <span class="new">New</span>
                                @else
                                <span class="hot">{{round($discount)}} %</span>
                                @endif

                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop-grid-right.html">{{$product['category']['category_name']}}</a>
                            </div>
                            <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div>
                                @if($product->vendor_id == NULL)
                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                @else
                                <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$product['vendor']['name']}}</a></span>
                                @endif


                            </div>
                            <div class="product-card-bottom">
                                @if($product->discount_price == NULL)
                                <div class="product-price">
                                    <span>₹{{$product->selling_price}}</span>
                                </div>
                                @else
                                <div class="product-price">
                                    <span>₹{{$product->discount_price}}</span>
                                    <span class="old-price">₹{{$product->selling_price}}</span>
                                </div>
                                @endif

                                <div class="add-cart">
                                    <a class="add" href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}"><i class="fi-rs-shopping-cart mr-5"></i>Details </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--end product card-->
            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!--End Deals-->


        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <form action="{{route('shop.filter')}}" method="post">
                @csrf
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" class="price-filter-range" data-min=0 data-max="2000"></div>
                            <input type="hidden" id="price_range" name="price_range" value="">
                            <input type="text" id="amount" value="₹0 - ₹2000" readonly="">
                            <br><br>
                            <button type="submit" class="btn tbn-sm btn-default"><i class="fi-rs-filter mr-5"></i>Filter</button>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            @if(!empty($_GET['category']))
                            @php
                            $filterCat = explode(',',$_GET['category']);
                            @endphp
                            @endif
                            <label class="fw-900">Category</label>
                            @foreach($categories as $category)
                            @php
                            $products = App\Models\Product::where('category_id',$category->id)->get();
                            @endphp
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="category[]" id="exampleCheckbox{{$category->id}}" value="{{$category->category_slug}}" @if(!empty($filterCat) && in_array($category->category_slug,$filterCat)) checked @endif onchange="this.form.submit()" />
                                <label class="form-check-label" for="exampleCheckbox{{$category->id}}"><span>{{$category->category_name}} ({{count($products)}})</span></label>
                            </div>
                            @endforeach
                            <label class="fw-900 mt-15">Item Condition</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                    <h5 class="section-title style-1 mb-30">New products</h5>
                    @foreach($newProduct as $product)
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="{{asset($product->product_thambnail)}}" alt="#" />
                        </div>
                        <div class="content pt-10">
                            <p><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></p>
                            @if($product->discount_price == NULL)
                            <p class="price mb-0 mt-5">₹{{$product->selling_price}}</p>
                            @else
                            <p class="price mb-0 mt-5">₹{{$product->discount_price}}</p>
                            @endif

                            <div class="product-rate">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="{{asset($product->product_thambnail)}}" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        if ($('#slider-range').length > 0) {
            const max_price = parseInt($('#slider-range').data('max'));
            const min_price = parseInt($('#slider-range').data('min'));
            let price_range = min_price+"-"+max_price;
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_price,
                max: max_price,
                values: price,

                slide: function(event, ui) {
                    

                    $("#amount").val('₹'+ui.values[0]+"-"+'₹'+ui.values[1]);
                    $("#price_range").val(ui.values[0]+"-"+ui.values[1]);
                }
            });
        }
    })
</script>

@endsection