<div class="{{$class??'col-lg-1-5 col-md-4 col-12 col-sm-6'}}">
    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
        data-wow-delay=".1s">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a
                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                    <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                        alt="" />
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}"
                    onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                {{-- <a aria-label="Compare" class="action-btn" id="{{ $product->id }}"
                    onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a> --}}
                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                    data-bs-target="#quickViewModal" id="{{ $product->id }}"
                    onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
            </div>
            @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount / $product->selling_price) * 100;
            @endphp
            <div class="product-badges product-badges-position product-badges-mrg">
                @if ($product->discount_price == null)
                    <span class="new">New</span>
                @else
                    <span class="hot">{{ round($discount) }} %</span>
                @endif

            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a
                    href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
            </div>
            <h2><a
                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
            </h2>
            @php
                $average = App\Models\Review::where('product_id', $product->id)
                    ->where('status', 1)
                    ->avg('rating');
                $reviewcount = App\Models\Review::where('product_id', $product->id)
                    ->where('status', 1)
                    ->latest()
                    ->get();
            @endphp
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    @if ($average == 0)
                    @elseif($average == 1 || $average < 2)
                        <div class="product-rating" style="width: 20%">
                        </div>
                    @elseif($average == 2 || $average < 3)
                        <div class="product-rating" style="width: 40%">
                        </div>
                    @elseif($average == 3 || $average < 4)
                        <div class="product-rating" style="width: 60%">
                        </div>
                    @elseif($average == 4 || $average < 5)
                        <div class="product-rating" style="width: 80%">
                        </div>
                    @elseif($average == 5 || $average < 5)
                        <div class="product-rating" style="width: 100%">
                        </div>
                    @endif
                </div>
                <span class="font-small ml-5 text-muted">
                    ({{ count($reviewcount) }})
                </span>
            </div>
            <div>
                @if ($product->vendor_id == null)
                    <span class="font-small text-muted">By <a
                            href="vendor-details-1.html">Owner</a></span>
                @else
                    <span class="font-small text-muted">By <a
                            href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                @endif


            </div>
            <div class="product-card-bottom">
                @if ($product->discount_price == null)
                    <div class="product-price">
                        <span>₹{{ $product->selling_price }}</span>
                    </div>
                @else
                    <div class="product-price">
                        <span>₹{{ $product->discount_price }}</span>
                        <span class="old-price">₹{{ $product->selling_price }}</span>
                    </div>
                @endif

                <div class="add-cart">
                    <a class="add" href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><i
                            class="fi-rs-shopping-cart mr-5"></i>Add to cart</a>
                </div>
            </div>
        </div>
    </div>
</div>