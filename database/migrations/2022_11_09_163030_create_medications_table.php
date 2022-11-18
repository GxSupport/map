<?php

use App\Models\NurseDoc;
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
        //tab 3
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->tinyInteger('diuretics')->nullable()->comment('диуретики');
            $table->tinyInteger('betaBlockers')->nullable()->comment('бета-блокаторы');
            $table->tinyInteger('calcium')->nullable()->comment('антагонисты кальция');
            $table->tinyInteger('apf')->nullable()->comment('ингибиторы АПФ');
            $table->tinyInteger('ara')->nullable()->comment('АРА');
            $table->tinyInteger('amkr')->nullable()->comment('АМКР');
            $table->tinyInteger('antiarrhythmics')->nullable()->comment('Антиаритмики');
            $table->tinyInteger('nitrates')->nullable()->comment('Нитраты');
            $table->tinyInteger('cardiac')->nullable()->comment('Сердечные гликозиды');
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
        Schema::dropIfExists('medications');
    }
};
