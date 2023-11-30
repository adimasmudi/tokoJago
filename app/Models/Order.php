<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'customer_type',
        'tanggal',
        'harga_total',
        'catatan',
        // tambahkan kolom lainnya yang perlu di-mass-assign
    ];

    protected $attributes = [
        'catatan' => null,
        'customer_type' => "member",
        // tambahkan nilai default untuk kolom lainnya
    ];

    /**
     * Get the orderDetail for order
     */
    public function orderDetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the orderPayment for order
     */
    public function orderPayment(): HasMany
    {
        return $this->hasMany(OrderPayment::class);
    }
}
