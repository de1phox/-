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
        Schema::create('plants', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unique();
            $table->string('name');
            $table->string('genus');
            $table->string('product_type');
            $table->string('life_cycle');
            $table->string('soil');
            $table->string('landing_place');
            $table->integer('climate_zone');
            $table->decimal('flower_diameter');
            $table->string('flower_color1');
            $table->string('flower_color2')->nullable();
            $table->string('flower_color3')->nullable();
            $table->string('leaf_color1');
            $table->string('leaf_color2')->nullable();
            $table->string('leaf_color3')->nullable();
            $table->text('description');
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();

            $table->foreign('genus')
                ->references('name')->on('plant_genera')
                ->onDelete('cascade');
            $table->foreign('product_type')
                ->references('name')->on('product_types')
                ->onDelete('cascade');
            $table->foreign('life_cycle')
                ->references('name')->on('life_cycles')
                ->onDelete('cascade');
            $table->foreign('soil')
                ->references('name')->on('soils')
                ->onDelete('cascade');
            $table->foreign('landing_place')
                ->references('name')->on('light_modes')
                ->onDelete('cascade');
            $table->foreign('climate_zone')
                ->references('zone_number')->on('climate_zones')
                ->onDelete('cascade');
            $table->foreign('flower_color1')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
            $table->foreign('flower_color2')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
            $table->foreign('flower_color3')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
            $table->foreign('leaf_color1')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
            $table->foreign('leaf_color2')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
            $table->foreign('leaf_color3')
                ->references('name')->on('plant_colors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
