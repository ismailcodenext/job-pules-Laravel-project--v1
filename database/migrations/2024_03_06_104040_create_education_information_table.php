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
        Schema::create('education_information', function (Blueprint $table) {
            $table->id();
            $table->string('degreeType');
            $table->text('schoolName');
            $table->text('major')->nullable();
            $table->string('passYear');
            $table->timestamp('gpa');
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
        Schema::dropIfExists('education_information');
    }
};
