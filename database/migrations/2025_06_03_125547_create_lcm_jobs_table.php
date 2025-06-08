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
        Schema::create('lcm_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            // $table->foreignIdFor(Company::class)
            //     ->constrained()
            //     ->cascadeOnDelete();
            $table->string('title');
            $table->string('slug', 100)->unique();
            $table->text('description');
            $table->string('company_name');
            $table->string('company_description');
            $table->string('company_logo')
                ->nullable();
            $table->string('location');
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'internship', 'freelance']);
            $table->decimal('salary_min', 10, 2)
                ->nullable();
            $table->decimal('salary_max', 10, 2)
                ->nullable();
            $table->string('salary_currency')
                ->default('USD')
                ->nullable();
            $table->string('apply_url');
            $table->boolean('is_remote')
                ->default(false);
            $table->boolean('is_featured')
                ->default(false);
            $table->date('expires_at');
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
        Schema::dropIfExists('lcm_jobs');
    }
};
