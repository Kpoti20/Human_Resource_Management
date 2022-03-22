<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    //
    protected $fillable = ['matricule','nom_prenom','statut', 'categorie_professionnelle',
                            'numero_cnss', 'lieu_affectation', 'anciennete','personne_charge',
                            'date_naissance','situation_matrimoniale','sexe','nationnalite',
                            'telephonne_1','telephone_2','mail','adresse','universite',
                            'niveau_etude','diplome','annee_diplome','filiation',
                            'date_entree_etablissement','date_sortie_etablissement','lieu_naissance'];
}
