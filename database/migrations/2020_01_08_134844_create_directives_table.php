<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kuwai_todays_id');
            $table->string('directivesource');
            $table->string('directiveno')->nullable();
            $table->year('directiveyear')->nullable();
            $table->string('directivetitle')->nullable();
            $table->longText('directivebody');
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
        Schema::dropIfExists('directives');
    }
}
