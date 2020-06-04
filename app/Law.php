<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $fillable = [
        'heading',
        'url'
    ];
}
