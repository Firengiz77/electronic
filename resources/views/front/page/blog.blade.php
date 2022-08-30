@extends('front.layout.master')

@section('container')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('/front/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('front.index')}}">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                   
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($related_blogs as $related )
                                    
                             
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img width="150px" src="{{  (!empty($related->image)? url('upload/blog_images/'.$related->image):asset('/admin/assets/img/avatars/1.png')  )}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{!! json_decode($related['name'])->{app()->getLocale()} !!}</h6>
                                        <span>{{ date('M m,Y', strtotime($related->created_at)) }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                     
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach ($blogs as $blog )
                            
                        <div class="col-lg-6 col-md-6 col-sm-6">
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
                        <div class="col-lg-12">
  
                            {{ $blogs->links('vendor.custom1') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

 
@endsection