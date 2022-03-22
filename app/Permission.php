<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['personnel_membre','date_debut','date_fin','nombre_jour_preleve','motif'];
}
