<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankruptciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create ('bankruptcies' , function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->unsignedInteger ('kuwai_todays_id');
            $table->string ('bankruptcysource');
            $table->string ('bankruptcyagainst');
            $table->string ('bankruptcyjudg');
            $table->date ('bankruptcydate');
            $table->longText ('bankruptcybody');
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
        Schema::dropIfExists ('bankruptcies');
    }
}
