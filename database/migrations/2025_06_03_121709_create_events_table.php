<?php

use App\Models\User;
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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')
                ->unique();
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('location');
            $table->decimal('latitude', 10, 7)
                ->nullable();
            $table->decimal('longitude', 10, 7)
                ->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['meetup', 'workshop', 'conference', 'hackathon']);
            $table->boolean('is_online')->default(false);
            $table->string('meeting_url')->nullable();
            $table->integer('max_attendees')->nullable();
            $table->boolean('is_published')->default(false);
            $table->softDeletes();
            $table->timestamps();
            $table->innoDb();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
