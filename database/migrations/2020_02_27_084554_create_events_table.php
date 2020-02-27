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
            $table->string('name',64);
            $table->dateTime('datefrom');
            $table->dateTime('dateto');
            $table->float('posx');
            $table->float('posy');
            $table->string('country',64);
            $table->string('city',64);
            $table->string('street',64);
            $table->string('numstreet',4);
            $table->string('zip',8);
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
