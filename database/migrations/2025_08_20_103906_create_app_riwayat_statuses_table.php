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
        Schema::create('app_riwayat_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_unit_barang')->constrained('app_unit_barang')->cascadeOnDelete();
            $table->foreignId('id_pengajuan')->nullable()->constrained('app_pengajuan')->nullOnDelete();
            $table->foreignId('status_awal')->nullable()->constrained('app_status')->nullOnDelete();
            $table->foreignId('status_baru')->nullable()->constrained('app_status')->nullOnDelete();
            $table->foreignId('lokasi_unit')->nullable()->constrained('app_lokasi')->nullOnDelete();
            $table->foreignId('oleh')->nullable()->constrained('app_users')->nullOnDelete();
            $table->text('catatan')->nullable();
            $table->timestamps();
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
