@extends('front.layout.master')
@section('container')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('/front/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('front.index')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="#">{!! json_decode($category['name'])->{app()->getLocale()} !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input value="{{ $max }}" id="max_value23" type="hidden">
                                        <input value="{{ $min }}" id="min_value23" type="hidden">

                                        <input type="text" id="minamount2" >
                                        <input type="text" id="maxamount2" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            @foreach($colors as $color)
                            <div class="sidebar__item__color sidebar__item__color--{!! strtolower(json_decode($color['name'])->{app()->getLocale()}) !!}">
                                <label for="{!! strtolower(json_decode($color['name'])->{app()->getLocale()}) !!}">
                                    {!! json_decode($color['name'])->{app()->getLocale()} !!}
                                    <input type="radio" id="{!! strtolower(json_decode($color['name'])->{app()->getLocale()}) !!}">
                                </label>
                            </div>
                            @endforeach


                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            @foreach($sizes as $size)
                            <div class="sidebar__item__size">
                                <label for="{!! strtolower(json_decode($size['size'])->{app()->getLocale()}) !!}">
                                    {!! json_decode($size['size'])->{app()->getLocale()} !!}
                                    <input type="radio" id="{!! strtolower(json_decode($size['size'])->{app()->getLocale()}) !!}">
                                </label>
                            </div>
                                @endforeach


                        </div>
                        <!-- <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($topproducts as $product)
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{  (!empty($product->thumbnail)? url('uploads/products/'.$product->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{!! json_decode($product['name'])->{app()->getLocale()} !!}</h6>
                                                <span>$ {{$product->price}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0" id="artan" > Qiymət artan</option>
                                        <option value="0" id="azalan">Qiymət azalan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($product_all as $product2)
                        
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{  (!empty($product2['products']['thumbnail'])? url('uploads/products/'.$product2['products']['thumbnail']):asset('/admin/assets/img/avatars/1.png')  )}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"> {{ count($product_all->product_id) }}    {!! json_decode($product2['products']['name'])->{app()->getLocale()} !!}</a></h6>
                                    <h5>$ {{$product2['products']['price']}}</h5>
                                    <p>{!! json_decode($product2['colors']['name'])->{app()->getLocale()} !!}</p>
                                    <p>{{ json_decode($product2['sizes']['size'])->{app()->getLocale()} }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


    <script src="{{asset('/admin/js/sort.js')}}"></script>



@endsection
