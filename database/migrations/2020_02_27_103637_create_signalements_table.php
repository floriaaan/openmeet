<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submitter')->unsigned();
            $table->foreign('submitter')
                ->references('id')
                ->on('users');
             $table->bigInteger('concerned')->unsigned();
             $table->foreign('concerned')
                ->references('id')
                ->on('users');
            $table->dateTime('date');
            $table->boolean('isread')->default(0);
            $table->integer('importance')->default(500);
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
        Schema::dropIfExists('signalements');
    }
}
