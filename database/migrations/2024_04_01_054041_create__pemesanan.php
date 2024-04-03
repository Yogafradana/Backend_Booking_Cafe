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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('pemesanan_id');
            $table->string('nama_pengunjung', 255);
            $table->unsignedInteger('meja_id');
            $table->unsignedInteger('menu_id');
            $table->integer('jumlah');
            $table->unsignedInteger('subtotal');
            $table->timestamp('tanggal_pemesanan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
            $table->foreign('meja_id')->references('meja_id')->on('meja');
            $table->foreign('menu_id')->references('menu_id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_pemesanan');
    }
};
