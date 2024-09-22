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
        Schema::create('assign_judges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judge_id')->constrained()->onDelete('cascade');
            $table->foreignId('court_id');
            $table->foreignId('case_id');
            $table->string('case_start_date');
            $table->string('case_end_date');
            $table->string('case_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_judges');
    }
};
