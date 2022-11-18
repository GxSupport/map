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
        Schema::create('hemodynamics', function (Blueprint $table) {
            $table->id();
            $table->string('sad')->nullable();
            $table->string('dad')->nullable();
            $table->string('chcc')->nullable();
            $table->string('adp')->nullable();
            $table->string('po2Saturation')->nullable();
            $table->text('chdd')->nullable();
            $table->enum('auscultationBreathing',['1','2','3','4','5','6'])->nullable();
            $table->enum('presenceWheezing',['1','2','3','4','5'])->nullable();
            $table->enum('corTones',['1','2'])->nullable();
            $table->enum('noise',['0','1'])->nullable();
            $table->enum('noiseHas',['1','2','3','4','5','6'])->nullable();
            $table->text('noiseComment')->nullable();
            $table->enum('presenceEdema',['1','2'])->nullable();
            $table->string('psv')->nullable();
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
        Schema::dropIfExists('hemodynamics');
    }
};
