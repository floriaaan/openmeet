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

            $table->string('name',128);
            $table->dateTime('datefrom');
            $table->dateTime('dateto')->nullable();
            $table->float('posx')->nullable();
            $table->float('posy')->nullable();
            $table->string('country',64)->nullable();
            $table->string('city',64)->nullable();
            $table->string('street',64)->nullable();
            $table->string('numstreet',8)->nullable();
            $table->string('zip',8)->nullable();
            $table->string('picrepo',255)->nullable();
            $table->string('picname',255)->nullable();
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
