<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderReturnItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_no',
        'order_return_id',
        'product_category_id',
        'order_return_reason_id',
        'details',
    ];

    // pre-loaded relationship when fetching
    protected $with = ['productCategory', 'orderReturnReason'];

    /**
     * An item is belongs to OrderReturn
     */
    public function orderReturn(): BelongsTo
    {
        return $this->belongsTo(OrderReturn::class);
    }

    /**
     * An order item has only one product category 
     */
    public function productCategory(): HasOne
    {
        return $this->hasOne(ProductCategory::class);
    }

    /**
     * An items has only 1 reason when returning the item
     */
    public function orderReturnReason(): HasOne
    {
        return $this->hasOne(OrderReturnReason::class);
    }
}
