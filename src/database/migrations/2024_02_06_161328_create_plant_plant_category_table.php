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
        Schema::create('plant_plant_category', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('plant_category_id');
            $table->integer('plant_id');

            $table->foreign('plant_category_id')->references('id')->on('plant_categories')
                ->onDelete('cascade');
            $table->foreign('plant_id')->references('id')->on('plants')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_plant_category');
    }
};
