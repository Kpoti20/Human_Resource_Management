<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demploi extends Model
{
    protected $fillable = ['nom_prenom','contact','adresse','diplome','stage','poste'];
}
