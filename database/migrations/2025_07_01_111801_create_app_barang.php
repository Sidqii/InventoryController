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
        Schema::create('app_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_jenis');
            $table->string('merk')->nullable();
            $table->text('deskripsi')->nullable();
            $table->json('spesifikasi_teknis')->nullable();
            $table->date('tanggal_pengadaan')->nullable();
            $table->integer('masa_garansi')->nullable();
            $table->string('sumber_pengadaan')->nullable();
            $table->string('vendor')->nullable();
            $table->integer('jumlah_total_unit')->default(0);
            $table->text('catatan_perawatan')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('app_kategori')->cascadeOnDelete();
            $table->foreign('id_jenis')->references('id')->on('app_jenis')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_barang');
    }
};
