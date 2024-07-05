<?php

namespace App\Models;

use App\Models\Address\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    // pre-loaded relations when fetching
    protected $with = ['address'];

    // custom attribute when fetching
    protected $appends = ['full_name', 'addressCityStateCountry'];

    /**
     * A Customer may have multiple address
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * A customer may have multiple returned order
     */
    public function orderReturn(): HasMany
    {
        return $this->hasMany(OrderReturn::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(function() {
            return ucwords($this->last_name .", ". $this->first_name);
        });
    }

    /**
     * Attribute Address for Listview displaying only
     */
    public function addressCityStateCountry(): Attribute
    {
        return Attribute::make(function() {
            $city = $this->address->city->name;
            $state = $this->address->state->name;
            $country = $this->address->country->name;

            return "$state, $city, $country";
        });
    }
}
