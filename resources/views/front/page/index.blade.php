@extends('front.layout.master')
@section('container')


    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="#">{!! json_decode($category['name'])->{app()->getLocale()} !!} </a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="hero__item set-bg" data-setbg="{{  (!empty($slider->image)? url('upload/slider_images/'.$slider->image):asset('/admin/assets/img/avatars/1.png')  )}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="{{ $slider->alt }}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($categories as $category)
                            <li data-filter=".{{$category->slug}}">{!! json_decode($category['name'])->{app()->getLocale()} !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product['category']['slug']}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{  (!empty($product->thumbnail)? url('uploads/products/'.$product->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}" >
                            <ul class="featured__item__pic__hover">
                                <li><a  onclick="addtowishlist({{$product->id}})" ><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a class="btn-addto-cart" href="{{route('front.addtocart',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ route('front.product_single',['category'=>$product['category']['slug'],'product'=>$product->slug]) }}">{!! json_decode($product['name'])->{app()->getLocale()} !!}</a></h6>
                            <h5>$ {{$product->price}} sdsd</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('/front/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('/front/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($topproducts as $top)
                                <a href="{{ route('front.product_single',['category'=>$top['category']['slug'],'product'=>$top->slug]) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{  (!empty($top->thumbnail)? url('uploads/products/'.$top->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{!! json_decode($top['name'])->{app()->getLocale()} !!}</h6>
                                        <span>$ {{$top->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($topproducts as $top)
                                <a href="{{ route('front.product_single',['category'=>$top['category']['slug'],'product'=>$top->slug]) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{  (!empty($top->thumbnail)? url('uploads/products/'.$top->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{!! json_decode($top['name'])->{app()->getLocale()} !!}</h6>
                                        <span>$ {{$top->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($blogs as $blog )
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{  (!empty($blog->image)? url('upload/blog_images/'.$blog->image):asset('/admin/assets/img/avatars/1.png')  )}}" alt=" {!! json_decode($blog['name'])->{app()->getLocale()} !!}">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ date('M m,Y', strtotime($blog->created_at)) }}</li>
                            </ul>
                            <h5><a href="#">{!! json_decode($blog['name'])->{app()->getLocale()} !!}</a></h5>
                            <p>{!! json_decode($blog['title'])->{app()->getLocale()} !!} </p>
                            <a href="{{ route('front.blog_single',['slug'=>$blog->slug]) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Section End -->



<script src="{{asset('/admin/js/sort.js')}}"></script>

@endsection
