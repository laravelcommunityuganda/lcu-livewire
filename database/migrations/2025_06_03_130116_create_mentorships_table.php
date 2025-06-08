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
        Schema::create('mentorships', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('mentor_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('mentee_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->text('goals');
            $table->enum('status', ['pending', 'active', 'completed', 'cancelled'])
            ->default('pending');
            $table->date('start_date')
                ->nullable();
            $table->date('end_date')
                ->nullable();
            $table->timestamps();
            $table->innoDb();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorships');
    }
};
