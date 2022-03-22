<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['personnel_membre','poste_id','date_debut_stage','date_fin_stage'];
}
