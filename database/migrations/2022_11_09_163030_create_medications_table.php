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
            $table->float('diuretics', 16,4)->nullable()->comment('диуретики');
            $table->float('betaBlockers', 16,4)->nullable()->comment('бета-блокаторы');
            $table->float('calcium', 16,4)->nullable()->comment('антагонисты кальция');
            $table->float('apf', 16,4)->nullable()->comment('ингибиторы АПФ');
            $table->float('ara', 16,4)->nullable()->comment('АРА');
            $table->float('amkr', 16,4)->nullable()->comment('АМКР');
            $table->float('antiarrhythmics', 16,4)->nullable()->comment('Антиаритмики');
            $table->float('nitrates', 16,4)->nullable()->comment('Нитраты');
            $table->float('cardiac', 16,4)->nullable()->comment('Сердечные гликозиды');
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
