<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderReturnReason extends Model
{
    use HasFactory;

    protected $fillable = ['reason'];

    /**
     * A reason has many returned order
     */
    public function orderReturn(): HasMany
    {
        return $this->hasMany(OrderReturn::class);
    }
}
