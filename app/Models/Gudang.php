<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gudang extends Model
{
    use HasFactory;

    /**
     * Get the admins for gudang
     */
    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * Get the barangGudang for gudang
     */
    public function barangGudang(): HasMany
    {
        return $this->hasMany(barangGudang::class);
    }
}
