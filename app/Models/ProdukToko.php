<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProdukToko extends Model
{
    use HasFactory;

    /**
     * Get the produkTokoDetail for produkToko
     */
    public function produkTokoDetail(): HasMany
    {
        return $this->hasMany(ProdukTokoDetail::class);
    }

    /**
     * Get the orderDetail for produkToko
     */
    public function orderDetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
  
    public function toko(){
        return $this->belongsTo(Toko::class);
    }
}
