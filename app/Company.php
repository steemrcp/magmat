<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    //
    protected $fillable = [
        'id', 'name', 'main_user', 'slug',
    ];
}
