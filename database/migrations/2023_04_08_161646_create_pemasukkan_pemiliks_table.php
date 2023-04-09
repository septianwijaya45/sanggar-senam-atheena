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
        Schema::create('pemasukkan_pemiliks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemilik_id');
            $table->datetime('tgl_terima');
            $table->integer('jumlah_pempem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukkan_pemiliks');
    }
};
