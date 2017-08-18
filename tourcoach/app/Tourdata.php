<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tourdata extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','information','big_cate','middle_cate','small_cate','area','city','village','address','id','intro'];
}
