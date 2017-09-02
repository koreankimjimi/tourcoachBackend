<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','name','lat','lng'];
}
