<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// admin panel's routes


Route::prefix('admin')->name('admin.')->group(function () {
    // admin user routes

    Route::get('/index',[AdminController::class,'index'])->middleware('admin')->name('index');
    Route::get('/login',function(){ return view('admin.user.login');})->name('login');
    Route::get('/register',function(){return view('admin.user.register'); })->name('register');
    Route::get('/account',[AdminController::class,'account'])->name('account');
    Route::post('/admin-register',[AuthController::class,'register'])->name('admin-register');
    Route::post('/admin-login',[AuthController::class,'login'])->name('admin-login');
    Route::get('/admin-logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/admin-logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/admin-image',[AuthController::class,'update_image'])->name('update_image');
    Route::post('/admin-update',[AuthController::class,'admin_update'])->name('update');
    Route::post('/admin-password',[AuthController::class,'admin_password'])->name('admin_password');

    // slider routes
    Route::get('/slider',[SliderController::class,'index'])->name('slider');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider_edit');
    Route::post('/slider/add',[SliderController::class,'create'])->name('slider_add');
    Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider_update');
    Route::get('/slider/delete/{id}',[SliderController::class,'destroy'])->name('slider_delete');

  // Contact routes
  Route::get('/contact',[ContactController::class,'index'])->name('contact');
  Route::post('/contact/add',[ContactController::class,'create'])->name('contact_add');
  Route::post('/contact/update/{id}',[ContactController::class,'update'])->name('contact_update');
  Route::get('/contact/delete/{id}',[ContactController::class,'destroy'])->name('contact_delete');

   // Blog routes
   Route::get('/blog',[BlogController::class,'index'])->name('blog');
   Route::get('/blogs/add',[BlogController::class,'show'])->name('blogs_add');
   Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog_edit');
   Route::post('/blog/add',[BlogController::class,'create'])->name('blog_add');
   Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog_update');
   Route::get('/blog/delete/{id}',[BlogController::class,'destroy'])->name('blog_delete');
 






});


// front routes
Route::name('front.')->group(function () {

// pages routes

    Route::get('/',[FrontController::class,'index'])->name('index');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');
    Route::get('/blog',[FrontController::class,'blog'])->name('blog');
    Route::get('/shop',[FrontController::class,'shop'])->name('shop');

});

