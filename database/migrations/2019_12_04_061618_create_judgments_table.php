<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judgments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judgmentcategory');
            $table->date('judgmentDate');
            $table->string('objectionNo');
            $table->year('year');
            $table->string('judgmentFile')->nullable();
            $table->integer('notes');
            $table->integer('incompletednotes')->default(0);
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
        Schema::dropIfExists('judgments');
    }
}
