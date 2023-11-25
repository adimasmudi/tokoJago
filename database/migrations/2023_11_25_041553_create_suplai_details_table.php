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
        Schema::create('suplai_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suplai_id')->references('id')->on('suplais')->onDelete('cascade');
            $table->foreignId('barang_id')->references('id')->on('barangs')->onDelete('cascade');
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
        Schema::dropIfExists('suplai_details');
    }
};
