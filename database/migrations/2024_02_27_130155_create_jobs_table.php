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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_description');
            $table->text('benefits')->nullable();
            $table->string('location');
            $table->timestamp('deadline');
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->string('job_type'); // New field for job type
            $table->json('job_skills')->nullable(); // New field for job skills as JSON array
            $table->string('job_category')->nullable();
            $table->decimal('salary', 10, 2)->nullable(); // New field for salary
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
