<?php

namespace App\Models\Address\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhCity extends Model
{
    use HasFactory;

    protected $fillablee = [
        'id',
        'name',
        'code',
        'zip_code',
        'district',
        'region_id',
        'province_id',
    ];
}
