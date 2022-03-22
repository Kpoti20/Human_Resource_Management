<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateRetourToDepcongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depconges', function (Blueprint $table) {
            $table->string('date_retour');
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
            $table->dropColumn('date_retour');
        });
    }
}
