<?php

use App\Enum\DonationStatusEnum;
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
        Schema::create('donations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)
                ->onDelete('set null');
            $table->string('name');
            $table->string('email');
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('USD');
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->enum('status', array_column(DonationStatusEnum::cases(), 'value'))
                ->default(DonationStatusEnum::Pending->value);
            $table->text('message')->nullable();
            $table->boolean('is_anonymous')->default(false);
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
        Schema::dropIfExists('donations');
    }
};
