<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    protected $with = ['returnItems', 'customer', 'productCategories'];

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
}
