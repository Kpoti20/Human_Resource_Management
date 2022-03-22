<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    protected $fillable = ['personnel_membre','date_retard','heure_arrive','motif','sanction_retard'];
}
