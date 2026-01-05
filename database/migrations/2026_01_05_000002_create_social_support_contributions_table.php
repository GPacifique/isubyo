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
        Schema::create('social_support_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('group_members')->cascadeOnDelete();
            $table->decimal('amount', 12, 2)->comment('Contribution amount');
            $table->text('notes')->nullable()->comment('Optional notes about the contribution');
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete()
                ->comment('Admin who recorded this contribution');
            $table->timestamps();

            $table->index(['group_id', 'member_id']);
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_support_contributions');
    }
};
