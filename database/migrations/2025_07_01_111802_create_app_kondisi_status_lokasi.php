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
        Schema::create('app_kondisi', function (Blueprint $table) {
            $table->id();
            $table->string('kondisi');
            $table->timestamps();
        });
        Schema::create('app_status', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('app_lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
            $table->string('kode_lokasi');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_kondisi');
        Schema::dropIfExists('app_status');
        Schema::dropIfExists('app_lokasi');
    }
};
