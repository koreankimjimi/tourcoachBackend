<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['userid', 'username', 'userpass','usergender','useremail','userbirth'];
}
