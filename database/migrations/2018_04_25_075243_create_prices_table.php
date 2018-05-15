<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price_name')->nullable();;
            $table->text('price_text')->nullable();;
            $table->string('price')->nullable();;
            $table->integer('service_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('prices', function($table){
          $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['service_id']);
        Schema::dropIfExists('prices');
    }
}
