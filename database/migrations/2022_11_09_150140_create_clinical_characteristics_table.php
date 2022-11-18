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
        //tab 1
        Schema::create('clinical_characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->enum('general_state', ['1','2','3'])->nullable()->comment('Общее состояние');
            $table->enum('complaints_shortness', ['1','2','3','4'])->nullable()->comment('Жалобы одышка');
            $table->tinyInteger('heartbeat')->comment('сердцебиение');
            $table->enum('headache', ['1','2','3','4'])->nullable()->comment('боли в области сердца');
            $table->enum('pain_heart', ['1','2'])->nullable()->comment('головные боли');
            $table->enum('dizziness', ['1','2'])->nullable()->comment('головокружения');
            $table->enum('ad', ['1','2','3','4','5','6'])->nullable()->comment('подъёмы АД');
            $table->text('ad_text')->nullable()->comment('дописать');
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
        Schema::dropIfExists('clinical_characteristics');
    }
};
