<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanzarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanzaris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID')->unsigned();
            $table->integer('bookID')->unsigned();
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('bookID')->references('id')->on('books');
            $table->integer('cantitate');
            $table->float('pret');
            $table->date('data_vanzarii');
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
        Schema::dropIfExists('vanzaris');
    }
}
