<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_unit_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_kepemilikan');
            $table->string('kode_unit')->unique();
            $table->string('no_seri')->nullable();
            $table->unsignedBigInteger('id_kondisi');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_lokasi');
            $table->date('tgl_terima')->nullable();
            $table->text('ket_unit')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('app_barang')->cascadeOnDelete();
            $table->foreign('id_kondisi')->references('id')->on('app_kondisi')->cascadeOnDelete();
            $table->foreign('id_status')->references('id')->on('app_status')->cascadeOnDelete();
            $table->foreign('id_lokasi')->references('id')->on('app_lokasi')->cascadeOnDelete();
            $table->foreign('id_kepemilikan')->references('id')->on('app_kepemilikan')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_unit_barang');
    }
};
