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
        Schema::create('user_program_daily_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'exercise_id');
            $table->boolean('is_complete');
            $table->unsignedBigInteger(column: 'user_program_schedule_id');
            $table->timestamps();

            $table->foreign(columns: 'exercise_id')
                ->references('id')
                ->on('exercises')
                ->cascadeOnDelete();

            $table->foreign(columns: 'user_program_schedule_id')
                ->references('id')
                ->on('user_program_schedules')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_program_daily_exercises');
    }
};
