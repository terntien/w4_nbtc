<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'namecontact',
        'address',
        'area',
        'phone',
        'tel',
        'email',
        'web',
    ];
}
