<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pprevenir extends Model
{
    protected $fillable = ['nom_prenoms','adresse_personne_prevenir','telephone','lien','personnel_membre'];
}
