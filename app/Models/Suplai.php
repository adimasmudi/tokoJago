<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suplai extends Model
{
    use HasFactory;

    /**
     * Get the suplaiDetail for suplai
     */
    public function suplaiDetails(): HasMany
    {
        return $this->hasMany(SuplaiDetail::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
