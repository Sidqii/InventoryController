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
        Schema::create('app_roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peran')->constrained('app_roles')->cascadeOnDelete();
            $table->foreignId('id_akses')->constrained('app_permissions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_roles_permissions');
    }
};
