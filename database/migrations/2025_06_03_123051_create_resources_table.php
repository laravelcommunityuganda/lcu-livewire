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
        Schema::create('resources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->string('slug', 100)
                ->unique();
            $table->text('description');
            $table->string('file_path');
            $table->string('thumbnail')
                ->nullable();
            $table->enum('type', ['document', 'video', 'code', 'presentation']);
            $table->enum('access_level', ['free', 'premium'])
                ->default('free');
            $table->integer('download_count')
                ->default(0);
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
        Schema::dropIfExists('resources');
    }
};
