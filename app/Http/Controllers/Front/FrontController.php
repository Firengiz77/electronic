<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.page.index');
    }
    public function contact(){
        return view('front.page.contact');
    }
    public function blog(){
        return view('front.page.blog');
    }
    public function shop(){
        return view('front.page.shop');
    }


}
