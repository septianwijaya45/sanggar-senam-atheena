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
        Schema::create('pembayaran_anggotais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->string('jenis_bayar');
            $table->datetime('tgl_bayar');
            $table->integer('jumlah_bayar');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('anggota_id')->references('id')->on('anggotais')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_anggotais');
    }
};
