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

    // /**
    //  * Get the suplaiDetail through suplai
    //  */
    // public function suplaiDetail(){
    //     return $this->hasManyThrough(SuplaiDetail::class, Suplai::class);
    // }

    // /**
    //  * Get the barang through suplaiDetail and suplai
    //  */
    // public function barang(){
    //     return $this->hasManyThrough(Barang::class, SuplaiDetail::class, Suplai::class);
    // }
}
