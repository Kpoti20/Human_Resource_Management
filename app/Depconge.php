<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depconge extends Model
{
    protected $fillable = ['personnel_membre','date_depart','nombre_jour_preleve','date_retour','date_arrivee'];
}
