<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('kuwai_todays_id');
            $table->string('meetingsource');
            $table->date('meetingdate');
            $table->longText('meetingrecord');
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
        Schema::dropIfExists('meeting_records');
    }
}
