<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('banned')->unsigned();
            $table->foreign('banned')
                ->references('id')
                ->on('users');
            $table->bigInteger('banisher')->unsigned();
            $table->foreign('banisher')
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
