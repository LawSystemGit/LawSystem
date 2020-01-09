<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kuwai_todays_id');
            $table->string('decreesource');
            $table->string('decreeno');
            $table->year('decreeyear')->nullable();
            $table->string('decreetitle');
            $table->longText('decreebody');
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
        Schema::dropIfExists('decrees');
    }
}
