<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    /**
     * Get the gudang that owns the admin.
     */
    public function gudang(): BelongsTo
    {
        return $this->belongsTo(Gudang::class);
    }
}
