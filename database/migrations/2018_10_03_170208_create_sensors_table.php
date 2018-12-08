<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->char('in_use',1)->default(1);

            $table->integer('equipament_id')->unsigned();
            $table->foreign('equipament_id')->references('id')->on('equipaments');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        /*
        Schema::table('users', function(Blueprint $table) {
            $table->integer('sensor_id')->nullable();
            $table->foreign('sensor_id')->references('id')->on('sensors');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
