<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interim extends Model
{
    protected $fillable = ['personnel_membre_titulaire','personnel_membre_interimaire','poste_id'];

    function personnel_membre_titulaire()
    {
      return Personnel::where('id', $this->personnel_membre_titulaire)->first()->nom_prenom;
    }

    function personnel_membre_interimaire()
    {
        return Personnel::where('id', $this->personnel_membre_interimaire)->first()->nom_prenom;
    }

    function poste()
    {
        return Poste::where('id', $this->poste_id)->first()->libelle;
    }
}
