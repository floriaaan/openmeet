<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname',64);
            $table->string('lname',64);
            $table->string('mail',128)->unique();
            $table->string('password',70);
            $table->string('country',64);
            $table->string('city',64);
            $table->string('zip',8);
            $table->string('street',64);
            $table->string('numstreet',4);
            $table->date('bdate');
            $table->string('phone', 16);
            $table->string('picrepo', 255);
            $table->string('picname', 255);
            $table->boolean('isadmin');
            $table->boolean('defaultnotif');
            $table->integer('typenotif');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
