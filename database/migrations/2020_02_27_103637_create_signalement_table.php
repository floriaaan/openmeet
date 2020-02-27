<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalement', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*
             todo $table->bigInteger('sender')->unsigned();
                  $table->foreign('id_user')
                ->references('id')
                ->on('users');
                $table
             todo $table->bigInteger('receiver')->unsigned();
                  $table->foreign('id_user')
                ->references('id')
                ->on('users');
                $table*/
            $table->dateTime('date');
            $table->boolean('isread');
            $table->integer('Importance',3);
            $table->string('description',64);
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
        Schema::dropIfExists('signalement');
    }
}
