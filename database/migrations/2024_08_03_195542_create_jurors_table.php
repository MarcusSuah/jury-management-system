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
        Schema::create('jurors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique('email');
            $table->string('dob');
            $table->string('gender');
            $table->string('contact');
            $table->string('address');
            $table->string('occupation');
            $table->string('work_add');
            $table->string('race');
            $table->string('nationality');
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurors');
    }
};
