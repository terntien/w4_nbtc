<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
    protected $fillable = [
        // 'tower_img',
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
}
