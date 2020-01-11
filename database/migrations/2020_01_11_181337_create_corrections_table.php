<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create ('corrections' , function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->unsignedInteger ('kuwai_todays_id');
            $table->string ('correctionsource');
            $table->date ('correctiondate');
            $table->longText ('correctionbody');
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists ('corrections');
    }
}
