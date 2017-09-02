<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveCoachList extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','userId','tourId','date'];
}
