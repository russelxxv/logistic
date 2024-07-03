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

    /**
     * An item is belongs to OrderReturn
     */
    public function orderReturn(): BelongsTo
    {
        return $this->belongsTo(OrderReturn::class);
    }
}
