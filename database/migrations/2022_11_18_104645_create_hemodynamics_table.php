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
        // tab 5
        Schema::create('hemodynamics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->string('sad')->nullable()->comment('САД мм.рт.ст');
            $table->string('dad')->nullable()->comment('ДАД мм.рт.ст');
            $table->string('chcc')->nullable()->comment('Пульс (ЧСС) уд.в мин');
            $table->string('adp')->nullable()->comment('АД пульсовое (АДП) = САД –ДАД мм.рт.ст');
            $table->string('po2Saturation')->nullable()->comment('РО2  %');
            $table->text('chdd')->nullable()->comment('Легкие ЧДД');
            $table->enum('auscultationBreathing',['1','2','3','4','5','6'])->nullable()->comment('Легкие ЧДД Аускультация: дыхание ');
            $table->enum('presenceWheezing',['1','2','3','4','5'])->nullable()->comment('Наличие хрипов');
            $table->enum('corTones',['1','2','3'])->nullable()->comment('ПСВ мл/мин');
            $table->enum('noise',['0','1'])->nullable()->comment('Шум');
            $table->enum('noiseHas',['1','2','3','4','5','6'])->nullable()->comment('Шум есть');
            $table->text('noiseComment')->nullable()->comment('Шум Дополнения');
            $table->enum('presenceEdema',['1','2'])->nullable()->comment('Наличие отеков');
            $table->string('psv')->nullable()->comment('ПСВ (мл/мин) в норме');
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
