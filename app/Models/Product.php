<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','slug','price','thumbnail','images','cat_id','size_id','color_id','on_stock','desc'];

    protected $casts = [
        'images' => 'array',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }
    public function color(){
        return $this->belongsTo('App\Models\Product_Color','color_id');
    }
    public function size(){
        return $this->belongsTo('App\Models\Product_size','size_id');
    }

}
