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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('gender')->nullable();
            $table->string('working_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};