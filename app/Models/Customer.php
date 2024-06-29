<?php

namespace App\Models;

use App\Models\Address\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'retailer_name',
        'phone',
        'email',
    ];

    // hidden attribute when fetch thru apis
    protected $hidden = ['id', 'customer_id', 'deleted_at', 'created_at', 'updated_at'];

    // pre-loaded relations when fetching
    protected $with = ['address', 'orderReturn'];

    /**
     * A Customer may have multiple address
     */
    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * A customer may have multiple returned order
     */
    public function orderReturn(): HasMany
    {
        return $this->hasMany(OrderReturn::class);
    }
}
