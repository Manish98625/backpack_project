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
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', );
            $table->foreignId('district_id')->constrained('districts');
            $table->timestamps();
        });


    Schema::table('students', function (Blueprint $table) {
        $table->foreignId('city_id')->nullable()->constrained('cities');
    });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');

    }
};
