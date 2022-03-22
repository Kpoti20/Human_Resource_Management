<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricule');
            $table->string('nom_prenom');
            $table->string('statut');
            $table->integer('categorie_professionnelle');
            $table->integer('numero_cnss');
            $table->string('lieu_affectation');
            $table->integer('anciennete');
            $table->integer('personne_charge');
            $table->string('date_naissance');
            $table->string('situation_matrimoniale');
            $table->string('sexe');
            $table->string('nationnalite');
            $table->integer('telephonne_1');
            $table->integer('telephone_2');
            $table->string('mail');
            $table->string('adresse');
            $table->string('universite');
            $table->string('niveau_etude');
            $table->string('diplome');
            $table->integer('annee_diplome');
            $table->string('filiation');
            $table->string('date_entree_etablissement');
            $table->string('date_sortie_etablissement');
            $table->timestamps();
            $table->foreign('categorie_professionnelle')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personnels');
    }
}
