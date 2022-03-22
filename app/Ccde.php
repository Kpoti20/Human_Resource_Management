<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ccde extends Model
{
    protected $fillable = ['personnel_membre','poste_id','date_embauche','date_debut_cde','date_fin_cde'];
}
