<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->timestamp('fetch_timestamp'); 
            $table->string('weather_condition', 30);
            $table->string('weather_condition_description', 100)->nullable(); //WeatherConditionDescription Enum
            $table->decimal('temperature', 6, 2);
            $table->decimal('feels_like_temperature', 6, 2);
            $table->integer('humidity_percentage');
            $table->decimal('wind_speed_kmph', 4, 2);
            $table->integer('wind_direction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_logs');
    }
};
