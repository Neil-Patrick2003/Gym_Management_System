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
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'transaction_id');
            $table->unsignedBigInteger(column: 'trainer_id')->nullable();
            $table->float('amount');
            $table->integer('quantity');
            $table->float('sub_total');
            $table->text('description');

            $table->foreign(columns: 'transaction_id')
                ->references('id')
                ->on('transactions')
                ->cascadeOnDelete();

            $table->foreign(columns: 'trainer_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};