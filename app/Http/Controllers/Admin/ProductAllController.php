<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProduct_AllRequest;
use App\Http\Requests\UpdateProduct_AllRequest;
use App\Models\Product_All;
use App\Http\Controllers\Controller;
use App\Helpers\Crud;
use App\Helpers\FileManager;
use App\Models\Product;
use App\Models\Product_Color;
use App\Models\Product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProductAllController extends Controller
{

    protected $crud;
    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

  
    public function index()
    {
       $products = Product_All::get();
       return view('admin.product_all.index',compact('products'));
    }

 
    public function create(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'count' => 'required',
            'product_id'=>'required',
            'color_id'=>'required',
            'size_id'=>'required',
        
        ]);

        if ($validator->fails()) {
            toastr()->error('Lütfən bütün məlumatları düzgün formatda daxil edin!');
            return redirect()->back();
        }
        Product_All::create([
            'count' => $data['count'],
            'color_id' => $data['color_id'],
            'size_id' => $data['size_id'],
            'product_id' => $data['product_id'],

        ]);

        return redirect()->route('admin.product_all')->with('message','Product has been created successfully.');
    }

  
    
    public function show()
    {
        $products = Product::get();
        $colors= Product_Color::get();
        $sizes= Product_size::get();
        return view('admin.product_all.add',compact('products','colors','sizes'));
    }

    public function edit($id)
    {
        $product =  $this->crud->edit('App\Models\Product_All',$id);
        $products = Product::get();
        $colors= Product_Color::get();
        $sizes= Product_size::get();
        return view('admin.product_all.edit',compact('product', 'products','colors','sizes'));
    }

 
    public function update(Request $request,$id)
    {
        $products = Product_All::find($id);
        $data =$request->all();
        $products->update($data);

        return redirect()->route('admin.product_all')->with('message','Product has been created successfully.');

    }

    public function destroy($id)
    {
        $this->crud->delete('App\Models\Product_All',$id);
        return redirect()->route('admin.product_all')->with('message','Product has been deleted successfully');
    }


}
