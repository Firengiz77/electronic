<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Crud;
use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Product_Color;
use App\Models\Product_size;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{

    protected $crud;
    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::get();
       return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'slug'=>'required',
            'cat_id'=>'required',
            'color_id'=>'required',
            'size_id'=>'required',
            'images'=>'required',
            'price'=>'required',
            'thumbnail'=>'required',
            'on_stock'=>'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Lütfən bütün məlumatları düzgün formatda daxil edin!');
            return redirect()->back();
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = FileManager::fileUpload($request->file('thumbnail'), 'products');
        }

        if ($request->hasFile('images')) {
            $data['images'] = [];
            foreach ($request->file('images') as $key => $file) {
                $data['images'][$key] = FileManager::fileUpload($file, 'products');
            }
        }

        if(isset($request->on_stock)){
            $request->on_stock = 1;
        }

        Product::create([
            'name' => $data['name'],
            'desc' => $data['desc'],
            'price' => $data['price'],
            'cat_id' => $data['cat_id'],
            'color_id' => $data['color_id'],
            'size_id' => $data['size_id'],
            'images' => $data['images'],
            'slug' => $data['slug'],
            'thumbnail'=>$data['thumbnail'],
            'on_stock'=>$data['on_stock'],

        ]);

        return redirect()->route('admin.products')->with('message','Product has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::get();
        $colors= Product_Color::get();
        $sizes= Product_size::get();
        return view('admin.products.add',compact('categories','colors','sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =  $this->crud->edit('App\Models\Product',$id);
        $categories = Category::get();
        $colors= Product_Color::get();
        $sizes= Product_size::get();
        return view('admin.products.edit',compact('product', 'categories','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $products = Product::find($id);
        $data =$request->all();

        $data['thumbnail'] = $products->thumbnail;

        if ($request->hasFile('thumbnail')) {
            FileManager::fileDelete('products', $products->thumbnail);
            $data['thumbnail'] = FileManager::fileUpload($request->file('thumbnail'), 'products');
        }

        $data['images'] = $products->images;
        if ($request->hasFile('images')) {

            // foreach ($news->images as $img) {
            //     FileManager::fileDelete('news', $img);
            // }
            foreach ($request->file('images') as $key => $file) {
                array_push($data['images'],FileManager::fileUpload($file, 'products'));
            }
        }

        if(!isset($request->on_stock)){
            $products->on_stock = 0 ;
        }

        $products->update($data);

        return redirect()->route('admin.products')->with('message','Product has been created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crud->delete('App\Models\Product',$id);
        return redirect()->route('admin.products')->with('message','Product has been deleted successfully');
    }


    public function delete_images_product($id, Request $request){
        $key = $request->key;
        $data = $request->all();

        $fullImgPath = storage_path("uploads/products/$key.jpg");
        $product = Product::all()->find($id);
        $images = $product->images;
        unset($images[$key]);
        $product->update([
            'images'=>$images,
        ]);
        // foreach ($news->images as $img) {
        //    FileManager::fileDelete('news', $img);
        // }

        return response()->json(['success'=>true,'images'=>$product->images]);
    }





}
