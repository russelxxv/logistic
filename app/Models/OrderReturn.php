<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderReturn extends Model
{
    use HasFactory;

    protected $fillaable = [
        'order_no',
        'customer_id',
    ];

    // relations always load when fetching
    protected $with = ['returnItems', 'customer'];

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
}
