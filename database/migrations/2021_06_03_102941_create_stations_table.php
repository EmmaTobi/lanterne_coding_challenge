<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->integer("fid");
            $table->integer("objectid")->nullable();
            $table->string("name");
            $table->text("lines");
            $table->string("network");
            $table->string("northing")->nullable();
            $table->string("easting")->nullable();
            $table->string("zone")->nullable();
            $table->string("x")->nullable();
            $table->string("y")->nullable();
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
        Schema::dropIfExists('stations');
    }
}
