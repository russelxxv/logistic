<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * A product category is belongs to a order return item
     */
    public function orderReturnItem(): BelongsTo
    {
        return $this->belongsTo(OrderReturnItem::class);
    }
}
