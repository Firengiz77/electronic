<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Front\FrontController;
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


});


// front routes
Route::name('front.')->group(function () {

// pages routes

    Route::get('/',[FrontController::class,'index'])->name('index');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');
    Route::get('/blog',[FrontController::class,'blog'])->name('blog');
    Route::get('/shop',[FrontController::class,'shop'])->name('shop');



});

