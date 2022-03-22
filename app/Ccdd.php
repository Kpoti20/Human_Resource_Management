<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ccdd extends Model
{
    protected $fillable = ['personnel_membre','poste_id','date_embauche','date_debut_cdd','date_fin_cdd','date_echeance_cdd'];
}
