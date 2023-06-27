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
        Schema::create('region_coefficents', function (Blueprint $table) {
            $table->id();
            $table->float('veryHot');
            $table->float('verycold');
            $table->float('mediumHotCold');
            $table->float('lowHotCold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region_coefficents');
    }
};
