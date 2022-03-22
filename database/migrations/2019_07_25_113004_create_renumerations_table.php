<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenumerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renumerations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->integer('poste_id');
            $table->string('element_administratif');
            $table->string('nombre_demande');
            $table->string('element_comptable');
            $table->string('cout');
            $table->string('observation');
            $table->timestamps();
            $table->foreign('personnel_membre')->references('id')->on('personnels');
            $table->foreign('poste_id')->references('id')->on('postes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('renumerations');
    }
}
