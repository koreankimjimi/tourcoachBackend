<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KakaoToken extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','userId','accessToken','refreshToken'];
}
