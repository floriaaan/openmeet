<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date');
            $table->text('content');
            $table->bigInteger('receiver')->unsigned();
            $table->foreign('receiver')
                ->references('id')
                ->on('users');
            $table->bigInteger('sender')->unsigned();
            $table->foreign('sender')
                ->references('id')
                ->on('users');
            $table->boolean('isread');
            $table->boolean('forgroup');

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
        Schema::dropIfExists('messages');
    }
}
