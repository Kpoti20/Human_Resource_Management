<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCumulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumuls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->string('cumul_conge');
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
        Schema::drop('cumuls');
    }
}
