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
        Schema::create('social_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('group_members')->cascadeOnDelete();
            $table->enum('type', ['death', 'marriage', 'sickness'])->comment('Type of support requested');
            $table->decimal('amount', 12, 2)->comment('Support amount');
            $table->text('description')->comment('Detailed reason for support');
            $table->enum('status', ['pending', 'approved', 'rejected', 'disbursed'])->default('pending');
            $table->text('approval_notes')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('disbursed_at')->nullable();
            $table->timestamps();

            $table->index(['group_id', 'member_id']);
            $table->index(['status']);
            $table->index(['type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_supports');
    }
};
