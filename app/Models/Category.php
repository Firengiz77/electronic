<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name','cat_id','slug'];


    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function translate($attr, $lang)
    {
        return json_decode($this[$attr])->$lang;
    }




}
