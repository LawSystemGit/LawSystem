<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenalprovisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalprovisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kuwai_todays_id');
            $table->date('provisiondate');
            $table->string('caseno');
            $table->string('policestation');
            $table->longText('provisionbody');
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
        Schema::dropIfExists('penalprovisions');
    }
}
