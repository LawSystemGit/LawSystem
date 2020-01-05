<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuwaiTodaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuwaitodays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('versionno');
            $table->string('versiontype');
            $table->date('versiondate');
            $table->text('versionfile');
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
        Schema::dropIfExists('kuwai_todays');
    }
}
