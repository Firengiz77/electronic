<?php

namespace App\Helpers;

use App\Models\Slider;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Crud
{

    public function create($table_name,$request){

        if($table_name === 'App\Models\Slider'){
           if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/slider_images/') . $request->image);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/upload/slider_images'), $filename);
            $request['image'] = $filename;
        }
    }
    if($table_name === 'App\Models\Blog') {
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/blog_images/') . $request->image);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/upload/blog_images'), $filename);
            $request['image'] = $filename;
        }
    }
        if($table_name === 'App\Models\Product') {
            if ($request->file('thumbnail')) {
                $file = $request->file('thumbnail');
                @unlink(public_path('/upload/products_images/') . $request->thumbnail);
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/upload/products_images'), $filename);
                $request['thumbnail'] = $filename;
            }

        }


        return $table_name::create($request->post());
    }

    public function delete($table_name,$id){
       $deleted_post = $table_name::find($id);
       return  $deleted_post->delete();
    }

     public function edit($table_name,$id){
        return $table_name::where('id',$id)->first();
     }



}
