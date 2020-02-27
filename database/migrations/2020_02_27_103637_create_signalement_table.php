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
             $table->bigInteger('sender')->unsigned();
             $table->foreign('sender')
                ->references('id')
                ->on('users');
             $table->bigInteger('receiver')->unsigned();
             $table->foreign('receiver')
                ->references('id')
                ->on('users');
            $table->dateTime('date');
            $table->boolean('isread');
            $table->integer('Importance');
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
