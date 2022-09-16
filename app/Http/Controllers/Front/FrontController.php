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
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function __construct()
    {
        $contact = Contact::first();
        \View::share('contact', $contact);

    }

    public function wishlist(){
        $wishlists = session()->get('wishlist');
        return view('front.page.wishlist',compact('wishlists'));
    }

    public function addtowishlist($id)
    {
        $product = Product::find($id);

        $cart = session()->get('wishlist', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "thumbnail" => $product->thumbnail,
            ];
        }

        session()->put('wishlist', $cart);
        $cartitems = session()->get('wishlist');

        return $cartitems;

    }

    public function remove_to_wishlist(Request $request){
        // if ($request->id) {
        //     $cart = session()->get('wishlist');
        //    session()->put('cart', $cart);
        // }
        $cart = session()->get('wishlist');
        unset($cart[$request->id]);
        \Session::put('wishlist', $cart);

        // $cartitems = session()->get('wishlist');
       // $view = view('front.component.cart', compact('cartitems'));

       // return $view->render();
       return response()->json(['message'=>'deleted wishlist']);
    }


    public function addToCart($id,Request $request)
    {
        $product = Product::all()->find($id);
        $carts = [];
        $data = Session::get('cart', []);


        if (isset($data[$id])) {
            $data[$id] = [
                'name' => $product->translate('name', app()->getLocale()),
                'price' => $product->price,
                'thumbnail' => $product->thumbnail,
            ];
        }
        Session::put('cart', $data);
        $carts = $data;

        return view('front.widget.cart')
            ->with('carts', $carts);
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
