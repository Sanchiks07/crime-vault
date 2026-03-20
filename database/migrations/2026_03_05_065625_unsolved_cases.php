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
        Schema::create('unsolved_cases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->json('count');
            $table->json('suspects');
            $table->longtext('description');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unsolved_cases');
    }
};
