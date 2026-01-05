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
        Schema::create('social_support_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->string('name')->comment('Period name, e.g., January 2026');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('contribution_amount', 12, 2)->comment('Amount each member should contribute');
            $table->decimal('total_collected', 12, 2)->default(0)->comment('Total amount collected from members');
            $table->decimal('total_disbursed', 12, 2)->default(0)->comment('Total amount given to members in need');
            $table->decimal('total_distributed', 12, 2)->default(0)->comment('Total amount returned to members at period end');
            $table->integer('expected_contributors')->default(0)->comment('Number of members expected to contribute');
            $table->integer('actual_contributors')->default(0)->comment('Number of members who contributed');
            $table->enum('status', ['active', 'collecting', 'disbursing', 'distributing', 'closed'])->default('active');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('closed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();

            $table->index(['group_id', 'status']);
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_support_periods');
    }
};
