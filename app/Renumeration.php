<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renumeration extends Model
{
    protected $fillable = ['personnel_membre','poste_id','element_administratif','cout','nombre_demande','element_comptable','observation'];
}
