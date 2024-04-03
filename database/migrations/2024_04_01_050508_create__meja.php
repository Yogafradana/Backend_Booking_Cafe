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
        Schema::create('meja', function (Blueprint $table) {
            $table->increments('meja_id');
            $table->integer('nomor_meja')->unique();
            $table->integer('kapasitas')->nullable();
            $table->enum('status', ['kosong', 'terisi', 'dipesan'])->default('kosong');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_meja');
    }
};
