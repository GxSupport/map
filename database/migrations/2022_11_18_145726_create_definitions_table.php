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
        // Определение толерантности к физической нагрузке tab 8
        Schema::create('definitions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->string('tshx')->nullable()->comment('ТШХ');
            $table->string('borgscale')->nullable()->comment('Шкала Борга');
            $table->string('rufierDixontest')->nullable()->comment('Проба Руфье-Диксона I=(P1+P2+P3)-200/10');
            $table->string('rufierDixontest_p1')->nullable()->comment('Р1');
            $table->string('rufierDixontest_p2')->nullable()->comment('Р2');
            $table->string('rufierDixontest_p3')->nullable()->comment('Р3');
            $table->string('bem_sample')->nullable()->comment('Для тренированных больных – ВЭМ проба');
            $table->string('levelPhysicalFitness')->nullable()->comment('Ступень физической подготовленности (от 1 мин до 5 максимальная) расчетная');
            $table->string('physical_definition')->nullable()->comment('Массовый тест определения физического состояния Е.А.Пирогова, 1984 (балл/уровень)');
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
