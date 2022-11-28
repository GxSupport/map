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
        // tab 4
        Schema::create('habits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NurseDoc::class);
            $table->enum('alcohol',['1','2','3'])->nullable()->commment('Употребление алкоголя');
            $table->enum('smoking',['1','2','3'])->nullable()->commment('Курение');
            $table->enum('gb',['1','2','3','4'])->nullable()->commment('Наследственность отягощена или не отягощена');
            $table->enum('ibs',['1','2','3','4'])->nullable()->commment('Наследственность отягощена или не отягощена');
            $table->enum('sd',['1','2','3','4'])->nullable()->commment('Наследственность отягощена или не отягощена');
            $table->enum('ssz',['1','2','3','4'])->nullable()->commment('Наследственность отягощена или не отягощена');
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
        Schema::dropIfExists('habits');
    }
};
