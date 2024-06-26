<?php

namespace App\Models\Address;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'address_line_1',
        'address_line_2',
        'city_id',
        'state_id',
        'country_id',
        'postal_code',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The relationships to eager-load
     */
    protected $with = ['city', 'state', 'country'];

    /**
     * Address is belongs to a customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Address is belongs to a City
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Belongs to a State
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Address is belongs to a Country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
