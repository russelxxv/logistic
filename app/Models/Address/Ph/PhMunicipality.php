<?php

namespace App\Models\Address\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhMunicipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
        'zip_code',
        'district',
        'region_id',
        'province_id',
    ];
}
