<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ccdi extends Model
{
    protected $fillable = ['personnel_membre','poste_id','date_embauche','date_debut_cdd','date_debut_cdi','date_retraite'];
}
