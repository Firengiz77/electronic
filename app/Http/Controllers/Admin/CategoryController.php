<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Helpers\Crud;

class CategoryController extends Controller
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
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->crud->create('App\Models\Category',$request);

        return redirect()->route('admin.category')->with('message','Category has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  $slider = Slider::where('id',$id)->first();
        $category =  $this->crud->edit('App\Models\Category',$id);
        $categories = Category::get();
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Category::find($id);

        $data->slug = $request->slug;
        $data->name = $request->name;
        $data->cat_id = $request->cat_id;

        $data->save();
        return redirect()->route('admin.category')->with('message','Category has been edited successfully.');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crud->delete('App\Models\Category',$id);
        return redirect()->route('admin.category')->with('message','Category has been deleted successfully');
    }
}
