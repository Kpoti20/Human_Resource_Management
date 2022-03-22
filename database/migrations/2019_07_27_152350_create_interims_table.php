<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre_titulaire');
            $table->integer('personnel_membre_interimaire');
            $table->integer('poste_id');
            $table->timestamps();
            $table->foreign('personnel_membre_titulaire')->references('id')->on('personnels');
            $table->foreign('personnel_membre_interimaire')->references('id')->on('personnels');
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
        Schema::drop('interims');
    }
}
