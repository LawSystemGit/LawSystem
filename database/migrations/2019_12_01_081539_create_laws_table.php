<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lawtype');
            $table->text('lawcategory');
            $table->string('lawno');
            $table->year('lawyear');
            $table->text('lawrelation');
            $table->date('publishdate')->nullable();
            $table->integer('publishid')->nullable();
            $table->text('lawfile')->nullable();
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
        Schema::dropIfExists('laws');
    }
}
