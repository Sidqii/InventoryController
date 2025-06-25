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
        Schema::create('app_inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_kondisi');
            $table->integer('stok');
            $table->string('merk');
            $table->string('kode_barang')->unique();
            $table->text('deskripsi');
            $table->date('tanggal_pengadaan');
            $table->bigInteger('nilai_pengadaan');
            $table->text('riwayat_pemakaian');
            $table->text('catatan_perawatan');
            $table->json('spesifikasi_teknis');
            $table->json('log_transaksi');
            $table->timestamps();

            $table->foreign('id_status')->references('id')->on('app_status')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('app_kategori')->onDelete('cascade');
            $table->foreign('id_lokasi')->references('id')->on('app_lokasi')->onDelete('cascade');
            $table->foreign('id_kondisi')->references('id')->on('app_kondisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_inventaris');
    }
};
