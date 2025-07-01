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
        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')
                ->nullable();
            $table->foreignIdFor(Post::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamp('viewed_at')
                ->default(now());
            $table->index(['user_id', 'post_id'], 'user_post_view_index');
            $table->string('ip_address', 45)
                ->nullable(); // To store IPv4 and IPv6 addresses
            $table->string('user_agent')->nullable(); // To store user agent information
            $table->timestamps();
            $table->innoDb();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_views');
    }
};
