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
        // Schema::create('student_skills', function (Blueprint $table) {
        //     $table->id();
        //     // Foreign key for the student
        //     $table->unsignedBigInteger('student_id');
        //     $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        // // Foreign key for the skill
        //     $table->unsignedBigInteger('skill_id');
        //     $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');

        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
