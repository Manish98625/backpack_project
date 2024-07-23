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
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
   
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email', 250)->nullable();
            $table->date('date');
            $table->string('class')->nullable();
            $table->float('phonenumber')->nullable();
            $table->string('address');
            $table->string('image', 500)->nullable();
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->foreignId('skill_id')->nullable()->constrained();

         

    

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genders');
        Schema::dropIfExists('skills');
      

      
        Schema::dropIfExists('students');

    }
};
