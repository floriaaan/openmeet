<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->bigInteger('id_group')->unique();
            $table->string('name');
            $table->dateTime('datefrom');
            $table->dateTime('dateto');
            $table->float('posx');
            $table->float('posy');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('numstreet');
            $table->string('zip');
            $table->text('description');
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
        Schema::dropIfExists('events');
    }
}
