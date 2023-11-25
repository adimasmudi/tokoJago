<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    /**
     * Get the barangSuplai for supplier
     */
    public function barangSuplai(): HasMany
    {
        return $this->hasMany(BarangSuplai::class);
    }

    /**
     * Get the suplai for supplier
     */
    public function suplai(): HasMany
    {
        return $this->hasMany(Suplai::class);
    }
}
