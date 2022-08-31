<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ITranslatable;


class Blog extends Model implements ITranslatable
{
    use HasFactory;

    protected $fillable = ['image','name','title','desc','author','slug'];

    public function translate($attr, $lang)
    {
        return json_decode($this[$attr])->$lang;
    }



}
