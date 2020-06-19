<?php

namespace App;
use App\Customer;
use App\Network;
use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $fillable = [
        'towers_sending',
        'towers_typeleaf',
        'towers_parish',
        'towers_district',
        'towers_pravince',
        'towers_code',
        'LATDEG',
        'LONGDEG',
        'towers_customer',
        'towers_network',
        'towers_license_code',
        'towers_license_date'

    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'towers_customer','id');
    }

    public function network(){
        return $this->belongsTo(Network::class,'towers_network','id');
    }
}

