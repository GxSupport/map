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
        // tab 7
        Schema::create('laboratory_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->string('hb')->comment('Hb, г/л ')->nullable();
            $table->string('redBloodCells')->comment('Эритроциты, 1012/л')->nullable();
            $table->string('leukocytes')->comment('Лейкоциты, 109/л')->nullable();
            $table->string('platelets')->comment('Тромбоциты, 109/л')->nullable();
            $table->string('speedBlood')->comment('СОЭ, мм/час')->nullable();
            $table->string('glucose')->comment('Глюкоза в крови, ммоль/л')->nullable();
            $table->string('cReactive')->comment('С-реактивный белок, мг/л')->nullable();
            $table->string('urea')->comment('Мочевина, ммоль/л')->nullable();
            $table->string('creatinine')->comment('Креатинин, мкмоль/л')->nullable();
            $table->string('rapidGlomFilt')->comment('СКФ расчетным методом по формуле CKD-EPI, мл/мин/1,73 м2 (автоматически)')->nullable();
            $table->string('alt')->comment('АЛТ, ед/л')->nullable();
            $table->string('ast')->comment('АСТ, ед/л')->nullable();
            $table->string('levelUricAcidSer')->comment('Мочевая кислота, мкмоль/л')->nullable();
            $table->string('totalCholesterol')->comment('Общий холестерин, ХС ммоль/л')->nullable();
            $table->string('triglycerides')->comment('Триглицериды, ммоль/л')->nullable();
            $table->string('lowDensityLipoprotein')->comment('ЛПНП, ммоль/л')->nullable();
            $table->string('highDensityLipoprotein')->comment('ЛПВП, ммоль/л')->nullable();
            $table->string('cHighDensityLipoprotein')->comment('ХС-неЛПВП (расчитывается) = ХС-ЛПВП')->nullable();
            $table->string('coeffAtherogenicity')->comment('Коэффицент атерогенности')->nullable();
            $table->string('prothrombinTime')->comment('Протромбиновое время, сек')->nullable();
            $table->string('pti')->comment('ПТИ, %')->nullable();
            $table->string('interNormRel')->comment('МНО')->nullable();
            $table->string('fibrinogen')->comment('Фибриноген, г/л')->nullable();
            $table->string('homocysteine')->comment('Гомоцистеин, мкмоль/л ИФА метод')->nullable();
            $table->enum('finish',['0','1'])->default('0');
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
        Schema::dropIfExists('laboratory_data');
    }
};
