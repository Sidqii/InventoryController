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
        Schema::create('app_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->foreignId('id_kategori')->constrained('app_kategori')->cascadeOnDelete();
            $table->foreignId('id_jenis')->constrained('app_jenis')->cascadeOnDelete();
            $table->string('merk')->nullable();
            $table->text('spek_barang')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tgl_pengadaan')->nullable();
            $table->integer('garansi')->nullable();
            $table->string('sumber_barang')->nullable();
            $table->string('vendor')->nullable();
            $table->string('note_perawatan')->nullable();
            $table->timestamps();
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
