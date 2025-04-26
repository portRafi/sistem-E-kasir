<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('promos', function (Blueprint $table) {
        $table->id();
        $table->string('nama_promo');
        $table->unsignedBigInteger('barang_beli_id');  // Barang yang harus dibeli
        $table->integer('jumlah_beli');
        $table->unsignedBigInteger('barang_bonus_id'); // Barang yang diberikan gratis
        $table->integer('jumlah_bonus');
        $table->date('berlaku_sampai');
        $table->timestamps();
    });


}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
