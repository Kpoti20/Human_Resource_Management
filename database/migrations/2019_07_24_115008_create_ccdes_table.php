<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccdes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->integer('poste_id');
            $table->string('date_embauche');
            $table->string('date_debut_cde');
            $table->string('date_fin_cde');
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
        Schema::drop('ccdes');
    }
}
