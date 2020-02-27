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
            $table->string('country',64)->nullable();
            $table->string('city',64)->nullable();
            $table->string('zip',8)->nullable();
            $table->string('street',64)->nullable();
            $table->string('numstreet',4)->nullable();
            $table->date('bdate');
            $table->string('phone', 16)->nullable();
            $table->string('picrepo', 255)->nullable();
            $table->string('picname', 255)->nullable();
            $table->boolean('isadmin')->default(0);
            $table->boolean('defaultnotif')->default(1);
            $table->integer('typenotif')->default(2);

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
