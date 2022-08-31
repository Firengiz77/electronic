@extends('front.layout.master')

@section('container')

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Login Now</h2>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="row">
                  
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password" placeholder="Your Password">
                    </div>
                 
                        <button type="submit" class="site-btn">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->



@endsection
