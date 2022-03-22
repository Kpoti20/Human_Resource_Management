<?php

namespace App\Http\Controllers;

use App\Occupation;
use App\Poste;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class OccupationController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            //->where('statut', '=', 'CDI')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();

        $occup = DB::table('occupations')
            ->join('personnels','personnels.id','=','occupations.personnel_membre')
            ->join('postes','postes.id','=','occupations.poste_id')
            ->select('matricule','nom_prenom','libelle','date_debut','date_fin','occupations.id as id_occ')
            ->orderBy('occupations.id', 'DESC')
            ->get();

        return view('occupation.index', compact('occup','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Occupation::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $oc = Occupation::findOrFail($request->occupation_id);
        $oc->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $oc = Occupation::findOrFail($request->occupation_id);
        $oc->delete();
        return back();
    }
}
