<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNombreJourPreleveToDepcongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depconges', function (Blueprint $table) {
            $table->integer('nombre_jour_preleve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depconges', function (Blueprint $table) {
            $table->dropColumn('nombre_jour_preleve');
        });
    }
}
