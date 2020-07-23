<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MultiplierVersion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('multiplier_versions', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("versionID");
            $table->unsignedBigInteger("multiplierID");

            $table->foreign('versionID')->references("id")->on("versions");
            $table->foreign('multiplierID')->references("id")->on("multipliers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("multiplier_versions");
    }
}
