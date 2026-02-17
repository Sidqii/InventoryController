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
        Schema::create('stock_request', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('inven_product')
                ->cascadeOnDelete();

            $table->foreignId('requester_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('request_type'); // BORROW | OUT | RETURN |MAINTENANCE
            $table->integer('quantity');

            $table->string('status')->default('PENDING');

            $table->text('note')->nullable();

            $table->foreignId('approved_by')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_request');
    }
};
