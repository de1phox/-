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
        Schema::create('climate_zones', function (Blueprint $table) {
            $table->integer('zone_number')->unique();
            $table->integer('lower_temp_limit');
            $table->integer('upper_temp_limit');
            $table->timestamps();

            $table->primary('zone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('climate_zones');
    }
};
