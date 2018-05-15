<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',256);
            $table->integer('view_count')->default(0);
            $table->string('address');
            $table->double('latitude',20,10);
            $table->double('longitude',20,10);
            $table->string('images')->nullable();
            $table->text('description');
            $table->string('phone', 20)->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('gmail')->nullable();
            $table->string('tax')->nullable();
            $table->string('slug');
            $table->integer('rating')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();

            //BusinessTime
            $table->string('monday_open',10)->nullable();
            $table->string('monday_close',10)->nullable();
            $table->string('tuesday_open',10)->nullable();
            $table->string('tuesday_close',10)->nullable();
            $table->string('wednesday_open' ,10)->nullable();
            $table->string('wednesday_close' ,10)->nullable();
            $table->string('thursday_open' ,10)->nullable();
            $table->string('thursday_close' ,10)->nullable();
            $table->string('friday_open' ,10)->nullable();
            $table->string('friday_close' ,10)->nullable();
            $table->string('saturday_open' ,10)->nullable();
            $table->string('saturday_close' ,10)->nullable();
            $table->string('sunday_open' ,10)->nullable();
            $table->string('sunday_close' ,10)->nullable();
            $table->string('special')->nullable();
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
        Schema::dropIfExists('services');
    }
}
