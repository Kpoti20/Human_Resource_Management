<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepcongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depconges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->string('date_depart');
            $table->string('date_arrivee');
            $table->timestamps();
            $table->foreign('personnel_membre')->references('id')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('depconges');
    }
}
