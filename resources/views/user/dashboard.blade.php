@extends('front.layout.master')

@section('container')
@php
$id=auth()->id();
$admin=App\Models\User::find($id);
@endphp

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Dashboard</h2>
                        <p>Welcome to Your Dashboard, {{$admin->name}}  </p>
                          @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                    </div>
                </div>
           
       

            <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <span>Setting</span>
                        </div>
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Logout</a></li>
                         
                        </ul>
                    </div>
            </div>
            <div class="col-lg-9">
                <div>
                <form enctype="multipart/form-data" id="formAccountSettings" method="POST"  action="{{route('user.update_image')}}">
                   @csrf
                    <img src="{{  (!empty($admin->image)? url('upload/admin_images/'.$admin->image):asset('/admin/assets/img/avatars/1.png')  )}}" width="150px" style="border-radius:50%" alt="">
               
                    <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              name="image"
                              accept="image/png,image/jpeg,image/svg,image/jpg"
                            />
                          </label>
                          <button type="submit" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                           </div>
                    </form>
                </div>

                <div>
                <div class="card-body">
                      <form  id="formAccountSettings" method="POST" action="{{route('user.update')}}">
                      @csrf 
                      <div class="row">
                          <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="name"
                              value="{{ $admin->name}}"
                              placeholder="{{ $admin->name }}"
                              autofocus
                            />
                          </div>

                          <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="{{ $admin->email }}"
                              placeholder="{{ $admin->email }}"
                            />
                          </div>
                       
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="site-btn">Save changes</button>
                        </div>
                      </form>
                    </div>

           </div>


           <div>
                <div class="card-body">
                      <form  id="formAccountSettings" method="POST" action="{{route('user.user_password')}}">
                      @csrf 
                      <div class="row">
                          <div class="col-md-4">
                            <label for="password" class="form-label">Old Password</label>
                            <input
                              class="form-control"
                              type="password"
                              id="password"
                              name="old_password"
                         
                      
                            />
                          </div>

                          <div class="col-md-4">
                            <label for="password" class="form-label">New Password</label>
                            <input
                              class="form-control"
                              type="password"
                              id="password"
                              name="password"
                         
                      
                            />
                          </div>
                          <div class="col-md-4">
                            <label for="password" class="form-label">Confirm New Password</label>
                            <input
                              class="form-control"
                              type="password"
                              id="confirm_password"
                              name="confirm_password"
                         
                          
                            />
                          </div>
                       
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="site-btn">Save changes</button>
                        </div>
                      </form>
                    </div>

           </div>
           


                </div>
            </div>

         
        </div>
    </div>
    <!-- Contact Form End -->



@endsection
