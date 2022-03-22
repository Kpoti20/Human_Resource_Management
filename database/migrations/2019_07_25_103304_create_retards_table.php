<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personnel_membre');
            $table->string('date_retard');
            $table->string('heure_arrive');
            $table->string('motif');
            $table->string('sanction_retard');
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
        Schema::drop('retards');
    }
}
