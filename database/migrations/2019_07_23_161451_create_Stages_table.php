<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->integer('poste_id');
            $table->string('date_debut_stage');
            $table->string('date_fin_stage');
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
        Schema::drop('Stages');
    }
}
