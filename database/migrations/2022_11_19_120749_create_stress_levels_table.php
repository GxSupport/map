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
        // tab 10
        Schema::create('stress_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->enum('stress1',['1','2','3','4'])->nullable()->comment('Пожалуй, я человек нервный');
            $table->enum('stress2',['1','2','3','4'])->nullable()->comment('Я очень беспокоюсь о своей работе');
            $table->enum('stress3',['1','2','3','4'])->nullable()->comment('Я часто ощущаю нервное напряжение');
            $table->enum('stress4',['1','2','3','4'])->nullable()->comment('Моя повседневная деятельность вызывает большое напряжение');
            $table->enum('stress5',['1','2','3','4'])->nullable()->comment('Общаясь с людьми, я часто ощущаю нервное напряжение');
            $table->enum('stress6',['1','2','3','4'])->nullable()->comment('К концу дня я совершенно истощен физически и психически');
            $table->enum('stress7',['1','2','3','4'])->nullable()->comment('В моей семье часто возникают напряженные отношения');
            $table->string('stressLevel')->nullable()->comment('stress summa');
            $table->enum('mobility',['1','2','3'])->nullable()->comment('А. ПОДВИЖНОСТЬ');
            $table->enum('personalCare',['1','2','3'])->nullable()->comment('Б. УХОД ЗА СОБОЙ');
            $table->enum('dailyActivities',['1','2','3'])->nullable()->comment('В. ПОВСЕДНЕВНАЯ ДЕЯТЕЛЬНОСТЬ');
            $table->enum('painDiscomfort',['1','2','3'])->nullable()->comment('Г. БОЛЬ/ДИСКОМФОРТ');
            $table->enum('anxietyDepression',['1','2','3'])->nullable()->comment('Д. ТРЕВОГА/ДЕПРЕССИЯ');
            $table->string('totalGrade')->nullable()->comment('Сумма баллов высчитывается');
            $table->string('eqvas')->nullable()->comment('ШКАЛА EQ–VAS');
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
        Schema::dropIfExists('stress_levels');
    }
};
