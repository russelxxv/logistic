<?php

namespace App\Models\Address\Us;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsCity extends Model
{
    use HasFactory;

    protected $fillable = ['state_id', 'name'];

    /**
     * US State
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(UsState::class, 'state_id', 'id');
    }
}
