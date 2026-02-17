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
        Schema::create('inven_product', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('inven_category')
                ->cascadeOnDelete();

            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inven_product');
    }
};
