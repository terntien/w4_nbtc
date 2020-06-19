<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'codecus',
        'namecus'
    ];
    public function tower(){
        return $this->hasMany(Tower::class);
    }
}
