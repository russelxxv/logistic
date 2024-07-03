<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderReturnProductCategory extends Model
{
    use HasFactory;

    // eager load the relationship
    protected $with = ['orderReturn', 'productCategory'];

    /**
     * Belongs to orderReturn
     */
    public function orderReturn(): BelongsTo
    {
        return $this->belongsTo(OrderReturn::class);
    }
    
    /**
     * An order return is belongs to Produc categories
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
