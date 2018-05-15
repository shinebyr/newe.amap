<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monday' ,10);
            $table->string('monday_open',10);
            $table->string('monday_close',10);
            $table->string('tuesday',10);
            $table->string('tuesday_open',10);
            $table->string('tuesday_close',10);
            $table->string('wednesday',10);
            $table->string('wednesday_open' ,10);
            $table->string('wednesday_close' ,10);
            $table->string('thursday' ,10);
            $table->string('thursday_open' ,10);
            $table->string('thursday_close' ,10);
            $table->string('friday' ,10);
            $table->string('friday_open' ,10);
            $table->string('friday_close' ,10);
            $table->string('saturday' ,10);
            $table->string('saturday_open' ,10);
            $table->string('saturday_close' ,10);
            $table->string('sunday' ,10);
            $table->string('sunday_open' ,10);
            $table->string('sunday_close' ,10);
            $table->string('closed');
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
        Schema::dropIfExists('business_times');
    }
}
