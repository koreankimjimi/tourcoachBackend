<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProposeCount extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','userId','tourId','date'];
}
