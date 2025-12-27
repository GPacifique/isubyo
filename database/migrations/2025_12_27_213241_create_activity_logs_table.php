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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('action'); // e.g., 'login', 'create_group', 'update_loan', 'delete_member'
            $table->string('model_type')->nullable(); // e.g., 'Group', 'Loan', 'User'
            $table->unsignedBigInteger('model_id')->nullable(); // ID of the affected model
            $table->text('description')->nullable(); // Detailed description of the action
            $table->json('data')->nullable(); // Additional data (old values, new values, etc.)
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('performed_at'); // When the action occurred
            $table->timestamps();

            // Indexes for better query performance
            $table->index('user_id');
            $table->index('action');
            $table->index('model_type');
            $table->index('performed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
