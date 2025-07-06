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
        Schema::create('app_riwayat_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unit_barang');
            $table->unsignedBigInteger('id_jenis_perubahan');
            $table->unsignedBigInteger('status_awal')->nullable();
            $table->unsignedBigInteger('status_baru')->nullable();
            $table->unsignedBigInteger('lokasi_awal')->nullable();
            $table->unsignedBigInteger('lokasi_baru')->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->string('oleh')->nullable();
            $table->text('catatan')->nullable();
            $table->text('lampiran')->nullable();
            $table->unsignedBigInteger('id_pengajuan')->nullable();
            $table->timestamps();

            $table->foreign('id_unit_barang')->references('id')->on('app_unit_barang')->cascadeOnDelete();
            $table->foreign('id_jenis_perubahan')->references('id')->on('app_jenis_perubahan')->restrictOnDelete();
            $table->foreign('status_awal')->references('id')->on('app_status')->nullOnDelete();
            $table->foreign('status_baru')->references('id')->on('app_status')->nullOnDelete();
            $table->foreign('lokasi_awal')->references('id')->on('app_lokasi')->nullOnDelete();
            $table->foreign('lokasi_baru')->references('id')->on('app_lokasi')->nullOnDelete();
            $table->foreign('id_pengajuan')->references('id')->on('app_pengajuan')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_riwayat_status');
    }
};
