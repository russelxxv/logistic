<?php

namespace App\Models\Address\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
    ];
}
