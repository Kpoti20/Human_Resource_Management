<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    protected $fillable = ['personnel_membre','date_debut_conge','date_fin_conge'];
}
