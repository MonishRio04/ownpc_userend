@extends('frontend.master_dashboard')
@section('main')
@section('title')
    {{ $blogdetails->post_title }}
@endsection
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="shop-grid-right.html">
                @foreach ($breadcat as $cat)
                    {{ $cat->blog_category_name }}
                @endforeach
            </a>
            <span></span> {{ $blogdetails->post_title }}
        </div>
    </div>
</div>
<div class="page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-11 col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-page pt-50 pr-30">
                            <div class="single-header style-2">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12">
                                        <h2 class="mb-10">{{ $blogdetails->post_title }}</h2>
                                        <div class="single-header-meta">
                                            <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                <a class="author-avatar" href="#">
                                                    <img class="img-circle" src="assets/imgs/blog/author-1.png"
                                                        alt="" />
                                                </a>
                                                <span class="post-by">By <a href="#">Pink Cheeks</a></span>
                                                <span
                                                    class="post-on has-dot">{{ Carbon\Carbon::parse($blogdetails->created_at)->diffForHumans() }}</span>
                                            </div>
                                            <div class="social-icons single-share">
                                                <ul class="text-grey-5 d-inline-block">
                                                    <li class="mr-5">
                                                        <a href="#"><img
                                                                src="{{ asset('frontend/assets/imgs/theme/icons/icon-bookmark.svg') }}"
                                                                alt="" /></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figure class="single-thumbnail">
                                <img src="{{ asset($blogdetails->post_image) }}" alt=""
                                    style="width:500px;height:400px;" />
                            </figure>
                            <div class="single-content">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12">
                                        <p class="single-excerpt">{!! $blogdetails->post_long_description !!}</p>
                                        <!--Entry bottom-->
                                        {{-- <div class="entry-bottom mt-50 mb-30">
                                            <div class="tags w-50 w-sm-100">
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">deer</a>
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">nature</a>
                                                <a href="blog-category-big.html" rel="tag"
                                                    class="hover-up btn btn-sm btn-rounded mr-10">conserve</a>
                                            </div>
                                            <div class="social-icons single-share">
                                                <ul class="text-grey-5 d-inline-block">
                                                    <li><strong class="mr-10">Share this:</strong></li>
                                                    <li class="social-facebook">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-facebook.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-twitter">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-twitter.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-instagram">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-instagram.svg"
                                                                alt="" /></a>
                                                    </li>
                                                    <li class="social-linkedin">
                                                        <a href="#"><img
                                                                src="assets/imgs/theme/icons/icon-pinterest.svg"
                                                                alt="" /></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                        <!--Author box-->
                                        <div class="author-bio p-30 mt-50 border-radius-15 bg-white">
                                            <div class="author-image mb-30">
                                                <a href="author.html"><img src="assets/imgs/blog/author-1.png"
                                                        alt="" class="avatar" /></a>
                                                <div class="author-infor">
                                                    <h5 class="mb-5">{{$blogdetails->post_short_description}}</h5>
                                                    <p class="mb-0 text-muted font-xs">
                                                        {{-- <span class="mr-10">306 posts</span>
                                                        <span class="has-dot">Since 2012</span> --}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="author-des">
                                                <p>{!! $blogdetails->post_long_description !!}</p>
                                            </div>
                                        </div>
                                        <!--Comment form-->
                                        <div class="comment-form">
                                            <h3 class="mb-15">Leave a Comment</h3>
                                            <div class="product-rate d-inline-block mb-30"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="form-contact comment_form mb-50" action="{{ url('blog/comment/store') }}"
                                                        method="post" enctype="multipart/form-data"
                                                        id="commentForm">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                        placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name"
                                                                        id="name" type="text"
                                                                        placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email"
                                                                        id="email" type="email"
                                                                        placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website"
                                                                        id="website" type="text"
                                                                        placeholder="Website" />
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <input type="hidden" name="blog_post_id" value="{{ $blogdetails->id }}">
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="button button-contactForm">Post Comment</button>
                                                        </div>
                                                    </form>
                                                    <div class="comments-area">
                                                        <h3 class="mb-30">Comments</h3>
                                                        <div class="comment-list">
                                                            @foreach ($comments as $comment)
                                                            <div
                                                                class="single-comment justify-content-between d-flex mb-30">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-2.png"
                                                                            alt="" />
                                                                        @if($comment->user_id)
                                                                        <a href="javascript:void(0)"
                                                                            class="font-heading text-brand">{{$comment->user->name}}</a>
                                                                        @endif
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">{{date('M d, Y h:i a',strtotime($comment->created_at))}}</span> </div>
                                                                                {{-- <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating"
                                                                                        style="width: 80%"></div>
                                                                                </div> --}}
                                                                        </div>
                                                                        <p class="mb-10">{{$comment->comment}}
                                                                            {{-- <a href="#"    class="reply">Reply</a> --}}
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>             
                                                            @endforeach
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
                    <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
                        <div class="widget-area">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search…" />
                                        <button type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget widget-category-2 mb-50">
                                <h5 class="section-title style-1 mb-30">Category</h5>
                                <ul>
                                    @foreach ($blogcategories as $category)
                                        @php
                                            $posts = App\Models\BlogPost::where('category_id', $category->id)->get();
                                        @endphp
                                        <li>
                                            <a
                                                href="{{ url('post/category/' . $category->id . '/' . $category->blog_category_slug) }}">
                                                <img src="{{ asset('frontend/assets/imgs/theme/icons/category-1.svg') }}"
                                                    alt="" />{{ $category->blog_category_name }}</a><span
                                                class="count">{{ count($posts) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="banner-img wow fadeIn mb-50 animated d-lg-block d-none">
                                <img src="{{ asset('frontend/assets/imgs/banner/banner-11.png') }}" alt="" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
