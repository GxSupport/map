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
        // tab 11
        Schema::create('estimated_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->string('ap')->nullable()->comment('Индекс адаптационного потенциала ССС Р.М. Баевского расчетныИндекс адаптационного потенциала ССС Р.М. Баевского расчетны');
            $table->string('score2OPResult')->nullable()->comment('SCORE-2 у больных старше 40 лет');
            $table->string('riskCardioDisease')->nullable()->comment('Шкала определения относительного риска, используемая для молодых людей (<40 лет)');
            $table->enum('riskGroup',['1','2','3','4'])->nullable()->comment('Группа риска');
            $table->enum('obesity',['0','1'])->nullable()->comment('4.1.ожирение');
            $table->enum('diabetes',['0','1'])->nullable()->comment('4.2.сахарный диабет');
            $table->enum('physicalActivity',['0','1'])->nullable()->comment('4.3.недостаточная физическая активность');
            $table->enum('smoking',['0','1'])->nullable()->comment('4.4.курение');
            $table->enum('psychologicalStress',['0','1'])->nullable()->comment('4.5.психологический стресс');
            $table->enum('ccz',['0','1'])->nullable()->comment('4.6.семейный анамнез ранней заболеваемости ССЗ');
            $table->enum('hypertension',['0','1'])->nullable()->comment('4.7.Артериальная гипертензия пункт');
            $table->enum('fibrillation',['0','1'])->nullable()->comment('4.8.фибрилляция предсердий Пункты');
            $table->enum('hypertrophy',['0','1'])->nullable()->comment('4.9.гипертрофия миокарда левого желудочка');
            $table->enum('disease',['0','1'])->nullable()->comment('4.10.хроническая болезнь почек');
            $table->enum('chss',['0','1'])->nullable()->comment('4.11.ЧСС боле 80 в мин Пункт');
            $table->enum('hyperlipidemia',['0','1'])->nullable()->comment('4.12.Гиперлипидемия и дислипидемия');
            $table->enum('hyperuricemia',['0','1'])->nullable()->comment('4.13.Гиперурекемия');
            $table->enum('factors',['0','1'])->nullable()->comment('5.Факторы риска');
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
        Schema::dropIfExists('estimated_indicators');
    }
};
