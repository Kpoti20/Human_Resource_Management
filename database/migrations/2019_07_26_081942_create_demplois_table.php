<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demplois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_prenom');
            $table->string('contact');
            $table->string('adresse');
            $table->string('diplome');
            $table->string('poste');
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
        Schema::drop('demplois');
    }
}
