<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_gudang_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreignId('barang_gudang_id')->references('id')->on('barang_gudangs')->onDelete('cascade');
            $table->integer('qty');
            $table->float('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_gudang_details');
    }
};