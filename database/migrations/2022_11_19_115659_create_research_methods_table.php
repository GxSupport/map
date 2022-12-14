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
        // tab 9
        Schema::create('research_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->float('ri', 16,4)->nullable()->comment('Индекс отражения RI');
            $table->float('si', 16,4)->nullable()->comment('Индекс ригидности (скорость пульсовой волны) SI');
            $table->float('va', 16,4)->nullable()->comment('Биологический возраст сосудов, VA');
            $table->enum('pvA', ['0','1'])->nullable()->comment('Тип ПВ(A)');
            $table->enum('pvB', ['0','1'])->nullable()->comment('Тип ПВ(B)');
            $table->enum('pvC', ['0','1'])->nullable()->comment('Тип ПВ(V)');
            $table->enum('ecgRhythm', ['1','2','3','4'])->nullable()->comment('ЭКГ: Ритм ');
            $table->enum('ecgRhythmNonSin', ['1','2'])->nullable()->comment('Если несинусовый ');
            $table->string('heartRate')->nullable()->comment('ЧСС');
            $table->text('conclusion')->nullable()->comment('Заключение');
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
        Schema::dropIfExists('research_methods');
    }
};
