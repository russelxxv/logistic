<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_id',
        'order_return_reason_id',
        'details',
    ];

    // relations always load when fetching
    // protected $with = ['returnItems', 'customer', 'productCategories'];
    protected $with = ['customer'];

    /**
     * order return is belong to a customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * order return has multiple items
     */
    public function returnItems(): HasMany
    {
        return $this->hasMany(OrderReturnItem::class);
    }

    /**
     * An order return has multiple categories binded
     */
    public function productCategories(): HasMany
    {
        return $this->hasMany(OrderReturnProductCategory::class);
    }

    /**
     * An order is belongs to a reasoning 
     */
    public function reason(): BelongsTo
    {
        return $this->belongsTo(OrderReturnReason::class);
    }

    /**
     * Cast attribute status
     */
    protected function status(): CastsAttribute
    {
        return CastsAttribute::get(fn ($value) => ucwords($value));
    }
}
