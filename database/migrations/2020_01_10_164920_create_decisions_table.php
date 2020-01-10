<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kuwai_todays_id');
            $table->string('decisionsource')->nullable();
            $table->string('decisionno');
            $table->string('decisiontitle')->nullable();
            $table->date('decisiondate')->nullable();
            $table->longText('decisionbody');

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
        Schema::dropIfExists('decisions');
    }
}
