<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
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
        $blogs = Blog::orderBy('id','asc')->get();
        return view('front.page.index',compact('slider','blogs'));
    }
    public function contact(){
      
        return view('front.page.contact');
    }
    public function blog(){
        $blogs = Blog::orderBy('created_at','asc')->paginate(10);
        $related_blogs = Blog::orderBy('created_at','desc')->take(2)->get();
        return view('front.page.blog',compact('blogs','related_blogs'));
    }

    public function blog_single($slug){
        $blog = Blog::where('slug',$slug)->first();
        $related_blogs = Blog::orderBy('created_at','desc')->take(3)->get();
        return view('front.page.blog_single',compact('blog','related_blogs'));
    }

    public function shop(){
        return view('front.page.shop');
    }


}
