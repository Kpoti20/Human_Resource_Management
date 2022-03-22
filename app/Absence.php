<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['personnel_membre','date_debut','date_fin','motif','sanction_absence'];
}
