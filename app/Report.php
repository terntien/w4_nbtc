<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'problem',
        'date',
        'detail',
        'user',
        'address'
    ];
}
