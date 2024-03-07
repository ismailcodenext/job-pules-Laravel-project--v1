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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dof');
            $table->string('blood_group');
            $table->string('nid_number');
            $table->string('passport_no')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('emergency_contact_no');
            $table->string('email');
            $table->string('whatsapp_number');
            $table->string('linkedin_link');
            $table->string('facebook_link');
            $table->string('github_link');
            $table->string('portfolio_link');
            $table->string('portfolio_website');
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
        Schema::dropIfExists('candidate_profiles');
    }
};
