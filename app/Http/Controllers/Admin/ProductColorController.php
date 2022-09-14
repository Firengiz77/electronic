<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct_ColorRequest;
use App\Http\Requests\UpdateProduct_ColorRequest;
use App\Models\Product_Color;
use Illuminate\Http\Request;
use App\Helpers\Crud;

class ProductColorController extends Controller
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
        $colors = Product_Color::get();
        return view('admin.product_color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreProduct_ColorRequest $request)
    {
        $this->crud->create('App\Models\Product_Color',$request);
        return redirect()->route('admin.product_color')->with('message','Color has been created successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduct_ColorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Product_Color::find($id);

        $data->name = $request->name;
        $data->color = $request->color;

        $data->save();
        return redirect()->route('admin.product_color')->with('message','Color has been edited successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Color  $product_Color
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Color $product_Color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Color  $product_Color
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Color $product_Color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_ColorRequest  $request
     * @param  \App\Models\Product_Color  $product_Color
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Color  $product_Color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crud->delete('App\Models\Product_Color',$id);
        return redirect()->route('admin.product_color')->with('message','Contact has been deleted successfully');
    }
}
