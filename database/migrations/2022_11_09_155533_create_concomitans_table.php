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
        // tab 2
        Schema::create('concomitans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->float('a', 16,4)->nullable()->comment('Гипертоническая болезнь');
            $table->float('b', 16,4)->nullable()->comment('Ишемическая болезнь сердца. ');
            $table->float('c', 16,4)->nullable()->comment('В анамнезе перенесенный ИМ');
            $table->float('d', 16,4)->nullable()->comment('В анамнезе перенесенный ОНМК, ТИА');
            $table->float('e', 16,4)->nullable()->comment('ХСН');
            $table->float('f', 16,4)->nullable()->comment('Атеросклероз периферический многососудистый со стенозом и/или эндоартерэктомии в анамнезе, аневризма аорты');
            $table->enum('g',['1','2','3'])->nullable()->comment('Перенесенные операции на сердце и сосудах');
            $table->enum('h',['1','2','3','4','5','6','7'])->nullable()->comment('Нарушения ритма:');
            $table->float('i', 16,4)->nullable()->comment('Сахарный диабет без осложнений');
            $table->float('k', 16,4)->nullable()->comment('Сахарный диабет с осложнениями');
            $table->float('l', 16,4)->nullable()->comment('Нарушение толерантности к глюкозе');
            $table->float('m', 16,4)->nullable()->comment('ХБП ');
            $table->float('n', 16,4)->nullable()->comment('ХОБЛ или БА');
            $table->float('o', 16,4)->nullable()->comment('Ковид-19');
            $table->float('p', 16,4)->nullable()->comment('Врожденные и приобретенные пороки сердца');
            $table->float('q', 16,4)->nullable()->comment('Онкологические заболевания');
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
