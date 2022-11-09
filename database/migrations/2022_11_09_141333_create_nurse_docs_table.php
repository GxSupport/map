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
        Schema::create('nurse_docs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('middlename')->nullable();
            $table->date('inclusion');
            $table->boolean('repeat'); 
            $table->string('ambul_number');
            $table->string('phone');
            $table->integer('age');
            $table->date('birthDate');
            $table->enum('gender', ['0', '1'])->comment('0-ayol, 1-erkak');
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
        Schema::dropIfExists('nurse_docs');
    }
};
