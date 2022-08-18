<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Crud;

class SliderController extends Controller
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
        $sliders = Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->crud->create('App\Models\Slider',$request);

        return redirect()->route('admin.slider')->with('message','Slider has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  $slider = Slider::where('id',$id)->first();
      $slider =  $this->crud->edit('App\Models\Slider',$id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $data = Slider::find($id);

        $data->alt = $request->alt;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/slider_images/') . $data->image);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/upload/slider_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();


    return redirect()->route('admin.slider')->with('message','Slider has been created successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crud->delete('App\Models\Slider',$id);
        return redirect()->route('admin.slider')->with('message','Slider has been deleted successfully');
    }
}
