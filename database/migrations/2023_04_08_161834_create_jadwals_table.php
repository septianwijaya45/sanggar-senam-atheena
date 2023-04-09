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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelatih_id');
            $table->unsignedBigInteger('jenis_id');
            $table->datetime('tanggal');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('pelatih_id')->references('id')->on('pelatihs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('jenises')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
