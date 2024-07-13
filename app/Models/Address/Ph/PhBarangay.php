<?php

namespace App\Models\Address\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhBarangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
        'region_id',
        'province_id',
        'city_municipality_id',
    ];
}