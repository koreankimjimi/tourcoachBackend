<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductViewCount extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','userName','userId','viewDate','productId'];
}
