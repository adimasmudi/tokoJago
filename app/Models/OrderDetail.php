<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'produk_toko_id',
        'harga',
        'qty',
        // tambahkan kolom lainnya yang perlu di-mass-assign
    ];
}
