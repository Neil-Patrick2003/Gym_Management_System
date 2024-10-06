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
        Schema::create('daily_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'program_schedule_id');
            $table->unsignedBigInteger(column: 'exercise_id');

            $table->timestamps();

            $table->foreign(columns: 'program_schedule_id')
                ->references('id')
                ->on('program_schedules')
                ->cascadeOnDelete();

            $table->foreign(columns: 'exercise_id')
                ->references('id')
                ->on('exercises')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_exercises');
    }
};
