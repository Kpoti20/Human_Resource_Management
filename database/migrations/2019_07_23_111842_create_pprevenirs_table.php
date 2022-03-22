<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePprevenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pprevenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_prenoms');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('lien');
            $table->integer('personnel_membre');
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
        Schema::drop('pprevenirs');
    }
}
