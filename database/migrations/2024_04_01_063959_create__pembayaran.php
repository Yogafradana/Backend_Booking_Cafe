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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('pembayaran_id');
            $table->unsignedInteger('pemesanan_id');
            $table->string('metode_pembayaran', 50);
            $table->unsignedInteger('total_pembayaran');
            $table->timestamp('tanggal_pembayaran')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('bukti_pembayaran', 255)->nullable();
            $table->foreign('pemesanan_id')->references('pemesanan_id')->on('pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_pembayaran');
    }
};
