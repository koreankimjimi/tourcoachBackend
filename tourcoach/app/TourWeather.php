<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourWeather extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','tourId','weather','date','sky'];
}
