@extends('front.layout.master')

@section('container')


     <!-- Blog Details Hero Begin -->
     <section class="blog-details-hero set-bg" data-setbg="{{ asset('/front/img/blog/details/details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{!! json_decode($blog['name'])->{app()->getLocale()} !!} </h2>
                        <ul>
                            <li>By {!! json_decode($blog['author'])->{app()->getLocale()} !!} </li>
                            <li>{{ date('M m,Y', strtotime($blog->created_at)) }}</li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{  (!empty($blog->image)? url('upload/blog_images/'.$blog->image):asset('/admin/assets/img/avatars/1.png')  )}}"" alt="">
                     <p>{!! json_decode($blog['desc'])->{app()->getLocale()} !!}</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__text">
                                        <h6>{!! json_decode($blog['author'])->{app()->getLocale()} !!} </h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_blogs as $related )
                    
           
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{  (!empty($related->image)? url('upload/blog_images/'.$related->image):asset('/admin/assets/img/avatars/1.png')  )}}" alt="{!! json_decode($related['name'])->{app()->getLocale()} !!}">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ date('M m,Y', strtotime($related->created_at)) }}</li>
                            </ul>
                            <h5><a href="{{ route('front.blog_single',['slug' => $related->slug]) }}">{!! json_decode($related['name'])->{app()->getLocale()} !!}</a></h5>
                            <p>{!! json_decode($related['title'])->{app()->getLocale()} !!} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

 
@endsection