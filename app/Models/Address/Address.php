<?php

namespace App\Models\Address;

use App\Models\Address\Ph\PhBarangay;
use App\Models\Address\Ph\PhCity;
use App\Models\Address\Ph\PhMunicipality;
use App\Models\Address\Ph\PhRegion;
use App\Models\Address\Us\UsCity;
use App\Models\Address\Us\UsState;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'address_line',
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
     * PH Barangay
     */
    public function barangay(): BelongsTo
    {
        return $this->belongsTo(PhBarangay::class, 'barangay_id', 'id');
    }

    /**
     * PH Municipality
     */
    public function municipality(): BelongsTo
    {
        return $this->belongsTo(PhMunicipality::class, 'municipality_id', 'id');
    }

    /**
     * PH Region
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(PhRegion::class, 'region_id', 'id');
    }

    /**
     * Address is belongs to a City
     */
    public function city(): BelongsTo
    {
        switch($this->counttry->code) {
            case 'PH':
                return $this->belongsTo(PhCity::class, 'city_id', 'id');
            case 'US':
                return $this->belongsTo(UsCity::class, 'city_id', 'id');
            default:
                return null;
        }
    }

    /**
     * Belongs to a State
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(UsState::class, 'state_id', 'id');
    }

    /**
     * Address is belongs to a Country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
