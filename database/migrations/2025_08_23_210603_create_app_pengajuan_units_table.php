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
        Schema::create('app_pengajuan_unit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengajuan')->constrained('app_pengajuan')->cascadeOnDelete();
            $table->foreignId('id_unit_barang')->constrained('app_unit_barang')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_pengajuan_unit');
    }
};
