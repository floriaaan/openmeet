<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banishs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('')->unsigned();
            $table->foreign('outcast')
                ->references('id')
                ->on('users');
            $table->bigInteger('')->unsigned();
            $table->foreign('Banisher')
                ->references('id')
                ->on('groups');
            $table->dateTime('date');
            $table->string('description',64)->nullable();
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
        Schema::dropIfExists('banishs');
    }
}
