<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAdresseInPprevenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pprevenirs', function (Blueprint $table) {
            $table->renameColumn('adresse','adresse_personne_prevenir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pprevenirs', function (Blueprint $table) {
            $table->renameColumn('adresse_personne_prevenir','adresse');
        });
    }
}
