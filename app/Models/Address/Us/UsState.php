<?php

namespace App\Models\Address\Us;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsState extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'name'];

    /**
     * US City
     */
    public function city(): HasMany
    {
        return $this->hasMany(UsCity::class, 'state_id', 'id');
    }
}
