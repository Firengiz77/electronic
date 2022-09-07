<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Color;
use App\Models\Product_size;
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
        $products = Product::orderBy('id','asc')->take(8)->get();
        $topproducts = Product::orderBy('id','asc')->take(3)->get();
        $categories = Category::orderBy('id','asc')->get();
        return view('front.page.index',compact('slider','blogs','products','categories','topproducts'));
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
    public function product_single($category,$product){
        $category = Category::where('slug',$category)->first();
        $product = Product::where('slug',$product)->first();
        $related_product = Product::where('cat_id',$category->id)->orderBy('created_at','desc')->take(3)->get();
        return view('front.page.product_single',compact('category','related_product','product'));
    }

    public function sort_by(){

    }

    public function shop(){
        $categories = Category::orderBy('id','asc')->get();
        $products = Product::orderBy('id','asc')->get();
        $colors =Product_Color::orderBy('id','asc')->get();
        $sizes =Product_size::orderBy('id','asc')->get();
        $topproducts=Product::orderBy('id','asc')->take(4)->get();
        $min=Product::min('price');
        $max=Product::max('price');
        return view('front.page.shop',compact('categories','products','colors','sizes','topproducts','min','max'
        ));
    }


}
