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
            $table->bigInteger('group')->unsigned();
            $table->foreign('group')
                ->references('id')
                ->on('groups');

            $table->string('name',64);
            $table->dateTime('datefrom');
            $table->dateTime('dateto')->nullable();
            $table->float('posx')->nullable();
            $table->float('posy')->nullable();
            $table->string('country',64);
            $table->string('city',64);
            $table->string('street',64);
            $table->string('numstreet',4)->nullable();
            $table->string('zip',8);
            $table->text('description')->nullable();
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
