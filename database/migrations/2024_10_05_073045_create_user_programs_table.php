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
        Schema::create('user_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id');
            $table->unsignedBigInteger(column: 'program_id');
            $table->timestamps();

            $table->foreign(columns: 'user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign(columns: 'program_id')
                ->references('id')
                ->on('programs')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_programs');
    }
};
