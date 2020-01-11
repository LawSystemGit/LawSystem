<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create ('invitations' , function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->unsignedInteger ('kuwai_todays_id');
            $table->string ('invitationsource')->nullable ();
            $table->longText ('invitationbody');
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
        Schema::dropIfExists ('invitations');
    }
}
