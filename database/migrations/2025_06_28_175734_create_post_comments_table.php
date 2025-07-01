<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Post::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->text('content');
            $table->uuid('parent_id')
                ->nullable();
            $table->foreign('parent_id')
                ->references('id')
                ->on('post_comments')
                ->nullOnDelete();
            $table->boolean('is_approved')
                ->default(true);
            $table->boolean('is_spam')
                ->default(false);
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
        Schema::dropIfExists('post_comments');
    }
};
