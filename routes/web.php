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
      Route::get('/wishlist',[FrontController::class,'wishlist'])->name('wishlist');
  });

Route::get('/add_to_wishlist/{id}',[FrontController::class,'addtowishlist'])->name('addtowishlist') ; 
Route::get('/remove_to_wishlist',[FrontController::class,'remove_to_wishlist'])->name('remove_to_wishlist');
Route::post('/open_modal',[FrontController::class,'open_modal'])->name('open_modal') ;  