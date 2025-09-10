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
        Schema::create('app_unit_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unit')->unique();
            $table->string('no_seri')->nullable();
            $table->foreignId('id_barang')->constrained('app_barang')->cascadeOnDelete();
            $table->foreignId('id_kepemilikan')->constrained('app_kepemilikan')->cascadeOnDelete();
            $table->foreignId('id_status')->constrained('app_status_unit')->cascadeOnDelete();
            $table->foreignId('id_lokasi')->constrained('app_lokasi')->cascadeOnDelete();
            $table->foreignId('id_kondisi')->constrained('app_kondisi')->cascadeOnDelete();
            $table->string('foto')->nullable();
            $table->timestamps();
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
