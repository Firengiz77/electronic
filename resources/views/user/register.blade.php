@extends('front.layout.master')

@section('container')

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Register Now</h2>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                            <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password" placeholder="Your Password">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <input type="hidden" name="superadmin" placeholder="admin" value="3">
                
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                    
                        <button type="submit" class="site-btn">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->



@endsection
