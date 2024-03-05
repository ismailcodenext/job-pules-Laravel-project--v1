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
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable();
            $table->text('institutionName')->nullable();
            $table->text('companyName')->nullable();
            $table->date('joiningDate')->nullable();
            $table->date('departureDate')->nullable();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('profile_id')->references('id')->on('candidate_profiles')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_experiences');
    }
};
