<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bookID');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bookID')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
