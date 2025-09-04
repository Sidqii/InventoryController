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
        Schema::create('app_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('app_users')->cascadeOnDelete();
            $table->foreignId('id_status')->constrained('app_status')->cascadeOnDelete();
            $table->string('instansi')->nullable();
            $table->text('hal');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_pengajuan');
    }
};
