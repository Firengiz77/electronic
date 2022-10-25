<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_All extends Model
{
    
    use HasFactory;

    protected $fillable= ['product_id','color_id','count','size_id'];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function colors(){
        return $this->belongsTo('App\Models\Product_Color','color_id');
    }
    public function sizes(){
        return $this->belongsTo('App\Models\Product_size','size_id');
    }


}
