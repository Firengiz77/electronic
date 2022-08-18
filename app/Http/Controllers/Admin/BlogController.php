<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Crud;

class BlogController extends Controller
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
        $blogs = Blog::get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->crud->create('App\Models\Blog',$request);

        return redirect()->route('admin.blog')->with('message','Blog has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.blog.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  $slider = Slider::where('id',$id)->first();
      $blog =  $this->crud->edit('App\Models\Blog',$id);
        return view('admin.slider.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $data = Blog::find($id);

        $data->name = $request->name;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->slug = $request->slug;
        $data->author = $request->author;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/slider_images/') . $data->image);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/upload/slider_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

    return redirect()->route('admin.blog')->with('message','Blog has been created successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crud->delete('App\Models\Blog',$id);
        return redirect()->route('admin.blog')->with('message','Blog has been deleted successfully');
    }
}
