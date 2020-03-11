<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')
                ->references('id')
                ->on('users');
            $table->bigInteger('event')->unsigned();
            $table->foreign('event')
                ->references('id')
                ->on('events');
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
        Schema::dropIfExists('participations');
    }
}
