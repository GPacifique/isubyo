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
        Schema::create('social_support_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('period_id')->constrained('social_support_periods')->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('group_members')->cascadeOnDelete();
            $table->decimal('amount', 12, 2)->comment('Amount returned to member');
            $table->text('notes')->nullable();
            $table->foreignId('distributed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['group_id', 'period_id']);
            $table->index(['member_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_support_distributions');
    }
};
