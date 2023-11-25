<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    /**
     * Get the barangGudangDetail for barang
     */
    public function barangGudangDetail(): HasMany
    {
        return $this->hasMany(BarangGudangDetail::class);
    }

    /**
     * Get the suplaiDetail for barang
     */
    public function suplaiDetail(): HasMany
    {
        return $this->hasMany(SuplaiDetail::class);
    }
}
