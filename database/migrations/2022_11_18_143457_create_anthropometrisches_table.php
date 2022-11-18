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
        // Tab 6
        Schema::create('anthropometrisches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->string('height')->nullable()->comment('Рост (Р), м (данные вводятся врачом)');
            $table->string('bodyMass')->nullable()->comment('Масса тела (МТ) кг (данные вводятся врачом)');
            $table->string('waistCircumference')->nullable()->comment('Окружность талии, см');
            $table->string('hipCircumference')->nullable()->comment('Окружность бедер, см');
            $table->string('waistHipRatio')->nullable()->comment('Соотношение окружность талии/окружность бедер (высчитывается по формуле)');
            $table->string('imt')->nullable()->comment('ИМТ (высчитывается Автоматически) = МТ/(Р, м) 2');
            $table->string('presenceDegreeImt')->nullable()->comment('Наличие и степень ожирения по ИМТ (расчетный)
            19-24,9 - Норма, 25-29,9 предожирение, 30 - 34,9 - первая степень ожирения; от 35 до 39,9 - вторая степень; от 40 до 44,9 — третья степень; свыше 45 — четвертая степень.
            ');
            $table->string('adiposeTissue')->nullable()->comment('% жировой ткани (данные вводятся врачом)');
            $table->string('internalFat')->nullable()->comment('Внутренний жир (данные вводятся врачом)
            1-12 уровень – в пределах нормы
            13-59 – выше нормы
            ');
            $table->string('muscleMass')->nullable()->comment('Мышечная масса (данные вводятся врачом)');
            $table->string('bodyType')->nullable()->comment('Тип телосложения (данные вводятся врачом)');
            $table->string('bone')->nullable()->comment('Костная ткань (данные вводятся врачом)');
            $table->string('exchangeRate')->nullable()->comment('Скорость обмена (данные вводятся врачом)');
            $table->string('metabolicAge')->nullable()->comment('Метаболический возраст (данные вводятся врачом)');
            $table->string('waterInBody')->nullable()->comment('% воды в организме (данные вводятся врачом)');

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
