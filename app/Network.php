<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $fillable = [
        'codenet',
        'namenet'
    ];
    public function tower(){
        return $this->hasMany(Tower::class);
    }
}
