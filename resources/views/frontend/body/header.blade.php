<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top d-none d-lg-block">
        <div class="">
            <div class="row align-items-center bg-blue p-2 px-5">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="{{ route('mycart') }}">My Cart</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('user.track.order') }}">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li class="text-dark">Need help? Call Us: <strong class="mx-2 ">+91 8870001797</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp
    <div class="header-middle d-none d-lg-block sticky-bar px-2">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" style="height:56;width:180"
                            alt="logo" /></a>
                </div>
                @php
                    $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                @endphp
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active select2-hidden-accessible" id="category-select" data-select2-id="1" tabindex="-1"
                                aria-hidden="true">
                                <option data-select2-id="3" value="{{null}}">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>                            
                            <input type="text" id="search" placeholder="Search for items...">
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>

                            {{-- <div class="header-action-icon-2">
                                <a href="{{route('compare')}}">
                                    <img class="svgInject" alt="Nest" src="{{asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                                    <span class="pro-count blue" id=""></span>
                                </a>
                                <a href="{{route('compare')}}"><span class="lable ml-0"></span></a>
                            </div> --}}
                            <div class="header-action-icon-2">

                                @auth
                                    <a href="javascript:void(0)">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('dashboard') }}"><i class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard') }}"><i
                                                        class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard') }}"><i class="fi fi-rs-label mr-10"></i>My
                                                    Voucher</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard') }}"><i class="fi fi-rs-heart mr-10"></i>My
                                                    Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard') }}"><i
                                                        class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.logout') }}"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{url('login')}}">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    {{-- <span class="lable" style="margin-left: 2px; margin-right: 2px;">|</span>
                                <a href="{{route('mobileregister')}}"><span class="lable ml-0">Register</span></a> --}}
                                @endauth

                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist') }}">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue" id="wishQty">0</span>
                                </a>
                                <a href="{{ route('wishlist') }}"><span class="lable"></span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('mycart') }}">
                                    <img alt="Nest"
                                        src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty">0</span>
                                </a>
                                <a href="{{ route('mycart') }}"><span class="lable"></span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                    <!-- Mini Cart Start with Ajax -->
                                    <div id="miniCart">

                                    </div>
                                    <!-- Mini Cart end with Ajax -->

                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="cartSubTotal"></span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('mycart') }}" class="outline">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @php
        $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();

    @endphp


    <div class="header-bottom header-bottom-bg-color px-2">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($categories as $item)
                                        @if ($loop->index < 3)
                                            <li>
                                                <a
                                                    href="{{ url('product/category/' . $item->id . '/' . $item->category_slug) }}">
                                                    <img src="{{ asset($item->category_image) }}"
                                                        alt="" />{{ $item->category_name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul class="end">
                                    @foreach ($categories as $item)
                                        @if ($loop->index > 2)
                                            <li>
                                                <a
                                                    href="{{ url('product/category/' . $item->id . '/' . $item->category_slug) }}">
                                                    <img src="{{ asset($item->category_image) }}"
                                                        alt="" />{{ $item->category_name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}"
                                                    alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}"
                                                    alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}"
                                                    alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}"
                                                    alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                                    more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>

                                <li>
                                    <a class="active" href="{{ url('/') }}">Home </a>

                                </li>
                                @php
                                    $categories = App\Models\Category::orderBy('category_name', 'ASC')
                                        ->where('status', 1)
                                        ->limit(4)
                                        ->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}
                                            <i class="fi-rs-angle-down"></i></a>
                                        @php
                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                ->orderBy('subcategory_name', 'ASC')
                                                ->get();
                                        @endphp
                                        <ul class="sub-menu">
                                            @foreach ($subcategories as $subcategory)
                                                <li><a
                                                        href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                {{-- <li>
                                    <a href="{{ route('home.blog') }}">About Us</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('home.blog') }}">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop.page') }}">Games</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>{{ $setting->support_phone }}<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('wishlist') }}">
                                <img class="svgInject" alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count blue" id="wishQty">0</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('mycart') }}">
                                <img alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count blue" id="cartQty">0</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div id="miniCart">
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span id="cartSubTotal"></span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('mycart') }}" class="outline">View cart</a>
                                        <a href="{{ route('checkout') }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>
    function search_result_show() {
        $("#searchProducts").slideDown();
    }

    function search_result_hide() {
        $("#searchProducts").slideUp();
    }
</script>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}"
                        alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Home</a>

                        </li>
                        @php
                            $categories = App\Models\Category::orderBy('category_name', 'ASC')->limit(4)->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="menu-item-has-children">
                                <a
                                    href="{{ url('product/category/' . $category->id . '/' . $category->category_slug) }}">{{ $category->category_name }}</i></a>
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name', 'ASC')
                                        ->get();
                                @endphp
                                <ul class="dropdown">
                                    @foreach ($subcategories as $subcategory)
                                        <li><a
                                                href="{{ url('product/subcategory/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <li>
                            <a href="{{ route('shop.page') }}">Shop</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <div class="site-copyright">©2023 Pink Cheeks - All Rights Reserved</div>
        </div>
    </div>
</div>
