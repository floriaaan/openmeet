<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
           /*
           todo $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')
                  ->references('id')
                 ->on('users'); */
            $table->string('name',64);
            $table->string('picrepo',255);
            $table->string('picname',255);
            $table->date('datecreate');
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
        Schema::dropIfExists('groups');
    }
}
