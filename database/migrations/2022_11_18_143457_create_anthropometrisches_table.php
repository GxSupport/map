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
        // Tab 6
        Schema::create('anthropometrisches', function (Blueprint $table) {
            $table->id();
            $table->string('height')->nullable();
            $table->string('bodyMass')->nullable();
            $table->string('waistCircumference')->nullable();
            $table->string('hipCircumference')->nullable();
            $table->string('waistHipRatio')->nullable();
            $table->string('imt')->nullable();
            $table->string('presenceDegreeImt')->nullable();
            $table->string('adiposeTissue')->nullable();
            $table->string('internalFat')->nullable();
            $table->string('muscleMass')->nullable();
            $table->string('bodyType')->nullable();
            $table->string('bone')->nullable();
            $table->string('exchangeRate')->nullable();
            $table->string('metabolicAge')->nullable();
            $table->string('waterInBody')->nullable();

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
        Schema::dropIfExists('anthropometrisches');
    }
};
