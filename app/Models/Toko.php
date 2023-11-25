<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Toko extends Model
{
    use HasFactory;

    /**
     * Get the kasir for toko
     */
    public function kasir(): HasMany
    {
        return $this->hasMany(Kasir::class);
    }

    /**
     * Get the produkToko for toko
     */
    public function produkToko(): HasMany
    {
        return $this->hasMany(ProdukToko::class);
    }
}
