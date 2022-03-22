<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $fillable = ['personnel_membre','poste_id','date_debut','date_fin'];
}
