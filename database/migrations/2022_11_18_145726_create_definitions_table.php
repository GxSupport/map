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
        // Определение толерантности к физической нагрузке
        Schema::create('definitions', function (Blueprint $table) {
            $table->id();
            $table->string('tshx')->nullable();
            $table->string('borgscale')->nullable();
            $table->string('rufierDixontest')->nullable();
            $table->string('rufierDixontest_p1')->nullable();
            $table->string('rufierDixontest_p2')->nullable();
            $table->string('rufierDixontest_p3')->nullable();
            $table->string('bem_sample')->nullable();
            $table->string('levelPhysicalFitness')->nullable();
            $table->string('physical_definition')->nullable();
            
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
        Schema::dropIfExists('definitions');
    }
};
