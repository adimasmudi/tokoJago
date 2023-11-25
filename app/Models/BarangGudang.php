<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangGudang extends Model
{
    use HasFactory;

    /**
     * Get the barangGudangDetail for barangGudang
     */
    public function barangGudangDetail(): HasMany
    {
        return $this->hasMany(BarangGudangDetail::class);
    }
}
