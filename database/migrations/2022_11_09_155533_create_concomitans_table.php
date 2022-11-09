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
        Schema::create('concomitans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->tinyInteger('a')->nullable()->comment('Гипертоническая болезнь');
            $table->tinyInteger('b')->nullable()->comment('Ишемическая болезнь сердца. ');
            $table->tinyInteger('c')->nullable()->comment('В анамнезе перенесенный ИМ');
            $table->tinyInteger('d')->nullable()->comment('В анамнезе перенесенный ОНМК, ТИА');
            $table->tinyInteger('e')->nullable()->comment('ХСН');
            $table->tinyInteger('f')->nullable()->comment('Атеросклероз периферический многососудистый со стенозом и/или эндоартерэктомии в анамнезе, аневризма аорты');
            $table->enum('g',['1','2','3'])->nullable()->comment('Перенесенные операции на сердце и сосудах');
            $table->enum('h',['1','2','3','4','5','6','7'])->nullable()->comment('Нарушения ритма:');
            $table->tinyInteger('i')->nullable()->comment('Сахарный диабет без осложнений');
            $table->tinyInteger('k')->nullable()->comment('Сахарный диабет с осложнениями');
            $table->tinyInteger('l')->nullable()->comment('Нарушение толерантности к глюкозе');
            $table->tinyInteger('m')->nullable()->comment('ХБП ');
            $table->tinyInteger('n')->nullable()->comment('ХОБЛ или БА');
            $table->tinyInteger('o')->nullable()->comment('Ковид-19');
            $table->tinyInteger('p')->nullable()->comment('Врожденные и приобретенные пороки сердца');
            $table->tinyInteger('q')->nullable()->comment('Онкологические заболевания');
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
        Schema::dropIfExists('concomitans');
    }
};
