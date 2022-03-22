<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccdis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->integer('poste_id');
            $table->string('date_embauche');
            $table->string('date_debut_cdd');
            $table->string('date_debut_cdi');
            $table->string('date_retraite');
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
        Schema::drop('ccdis');
    }
}
