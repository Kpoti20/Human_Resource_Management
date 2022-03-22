<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->string('date_debut_conge');
            $table->string('date_fin_conge');
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
        Schema::drop('planifications');
    }
}
