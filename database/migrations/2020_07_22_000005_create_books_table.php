<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authorID')->unsigned();
            $table->foreign('authorID')->references('id')->on('authors');
            $table->string('title');
            $table->float('base_price');
            $table->binary('image');
            $table->integer('stoc');
            $table->mediumText('descriere');
            $table->integer('categoryID')->unsigned();
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
}
