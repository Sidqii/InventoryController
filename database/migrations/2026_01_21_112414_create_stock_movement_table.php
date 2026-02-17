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
        Schema::create('stock_movement', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('inven_product')
                ->cascadeOnDelete();

            $table->foreignId('executed_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('type'); // IN | OUT | ADJUST
            $table->integer('quantity');

            $table->string('references_type'); // REQUEST | MANUAL | SYSTEM | IMPORT
            $table->unsignedBigInteger('references_id')->nullable();

            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movement');
    }
};
