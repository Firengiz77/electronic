<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSizeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Front\UserController;


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
    Route::get('/all_admin',[AdminController::class,'all_admin'])->name('all_admin');
    Route::post('/admin-register',[AuthController::class,'register'])->name('admin-register');
    Route::post('/admin-login',[AuthController::class,'login'])->name('admin-login');
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

 // Message routes
 Route::get('/messages',[MessageController::class,'index'])->name('message');
 Route::post('/messages/add',[MessageController::class,'create'])->name('message_add');
 Route::get('/messages/delete/{id}',[MessageController::class,'destroy'])->name('message_delete');



//category routes
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category_edit');
    Route::post('/category/add',[CategoryController::class,'create'])->name('category_add');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category_update');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category_delete');

    // Product Size routes
    Route::get('/product_size',[ProductSizeController::class,'index'])->name('product_size');
    Route::post('/product_size/add',[ProductSizeController::class,'create'])->name('product_size_add');
    Route::post('/product_size/update/{id}',[ProductSizeController::class,'update'])->name('product_size_update');
    Route::get('/product_size/delete/{id}',[ProductSizeController::class,'destroy'])->name('product_size_delete');


    // Product Color routes
    Route::get('/product_color',[ProductColorController::class,'index'])->name('product_color');
    Route::post('/product_color/add',[ProductColorController::class,'create'])->name('product_color_add');
    Route::post('/product_color/update/{id}',[ProductColorController::class,'update'])->name('product_color_update');
    Route::get('/product_color/delete/{id}',[ProductColorController::class,'destroy'])->name('product_color_delete');

// Product routes
    Route::get('/products',[ProductController::class,'index'])->name('products');
    Route::get('/products/add',[ProductController::class,'show'])->name('products_add');
    Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('products_edit');
    Route::post('/products/add',[ProductController::class,'create'])->name('products_add');
    Route::post('/products/update/{id}',[ProductController::class,'update'])->name('products_update');
    Route::get('/products/delete/{id}',[ProductController::class,'destroy'])->name('products_delete');
    Route::post('/product/delete_images/{id}',[ProductController::class,'delete_images_product'])->name('delete_images_product');

});


// front routes
Route::name('front.')->group(function () {

// pages routes

    Route::get('/',[FrontController::class,'index'])->name('index');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');
    Route::get('/blog',[FrontController::class,'blog'])->name('blog');
    Route::get('/shop',[FrontController::class,'shop'])->name('shop');
    Route::get('/blog_single/{slug}',[FrontController::class,'blog_single'])->name('blog_single');
    Route::get('/product/{category}/{product}',[FrontController::class,'product_single'])->name('product_single');
    Route::get('/add-to-cart/{id}', [FrontController::class, 'addToCart'])->name('addtocart');
});


// user routes

Route::name('user.')->group(function () {
      Route::get('/register',[UserController::class,'index'])->name('index');
      Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
      Route::post('/register1',[UserController::class,'register'])->name('register');
      Route::get('/login',[UserController::class,'login_index'])->name('login_index');
      Route::post('/login1',[UserController::class,'login'])->name('login');
      Route::get('/logout',[UserController::class,'logout'])->name('logout');
      Route::post('/user-image',[UserController::class,'update_image'])->name('update_image');
      Route::post('/user-update',[UserController::class,'user_update'])->name('update');
      Route::post('/user-password',[UserController::class,'user_password'])->name('user_password');
  });
