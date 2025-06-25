<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_riwayat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_pengajuan');
            $table->string('instansi');
            $table->text('hal');
            $table->integer('jumlah');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('tanggal_proses')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('app_inventaris')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id')->on('app_users')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('app_status')->onDelete('cascade');
            $table->foreign('id_pengajuan')->references('id')->on('app_pengajuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_riwayat');
    }
};
