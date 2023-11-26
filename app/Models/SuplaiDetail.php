<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplaiDetail extends Model
{
    use HasFactory;

    public function suplai(){
        return $this->belongsTo(Suplai::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
