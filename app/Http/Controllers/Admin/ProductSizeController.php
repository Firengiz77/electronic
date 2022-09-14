<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct_sizeRequest;
use App\Http\Requests\UpdateProduct_sizeRequest;
use App\Models\Product_size;
use Illuminate\Http\Request;
use App\Helpers\Crud;

class ProductSizeController extends Controller
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
        $sizes = Product_size::get();
        return view('admin.product_size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->crud->create('App\Models\Product_size',$request);
        return redirect()->route('admin.product_size')->with('message','Sizes has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduct_sizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Product_size::find($id);

        $data->size = $request->size;


        $data->save();


        return redirect()->route('admin.product_size')->with('message','Size has been edited successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function show(Product_size $product_size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_size $product_size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_sizeRequest  $request
     * @param  \App\Models\Product_size  $product_size
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $this->crud->delete('App\Models\Product_size',$id);
    return redirect()->route('admin.product_size')->with('message','Contact has been deleted successfully');
}
}
