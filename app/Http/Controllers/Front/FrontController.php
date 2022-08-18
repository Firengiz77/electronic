<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __construct()
    {
        $contact = Contact::first();
        \View::share('contact', $contact);
       
    }
    public function index(){
        $slider = Slider::first();
        return view('front.page.index',compact('slider'));
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
