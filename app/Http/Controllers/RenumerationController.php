<?php

namespace App\Http\Controllers;

use App\Poste;
use App\Renumeration;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RenumerationController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();
        $ren = DB::table('renumerations')
            ->join('personnels','personnels.id','=','renumerations.personnel_membre')
            ->join('postes','postes.id','=','renumerations.poste_id')
            ->select('matricule','libelle','nom_prenom','element_administratif','element_comptable','nombre_demande','cout','observation','renumerations.id as id_ren')
            ->orderBy('renumerations.id', 'DESC')
            ->get();

        return view('renumeration.index', compact('ren','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Renumeration::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $ren = Renumeration::findOrFail($request->renumeration_id);
        $ren->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $re = Renumeration::findOrFail($request->renumeration_id);
        $re->delete();
        return back();
    }
    // Fonction d'impression des elements de renumeration
    public function printPreviewRE(){

        $re = DB::table('renumerations')
            ->join('postes','postes.id','=','renumerations.poste_id')
            ->join('personnels','personnels.id','=','renumerations.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->select('renumerations.id as idren','element_administratif','libelle','nombre_demande','nom_prenom','element_comptable','cout','observation','matricule')
            ->orderBy('renumerations.id', 'ASC')
            ->get();
        $i = 1;
        return view('renumeration.print_renumeration',compact('re','i'));
    }

    public function printRE(){

        $re = DB::table('renumerations')
            ->join('postes','postes.id','=','renumerations.poste_id')
            ->join('personnels','personnels.id','=','renumerations.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->select('renumerations.id as idren','element_administratif','libelle','nombre_demande','nom_prenom','element_comptable','cout','observation','matricule')
            ->orderBy('renumerations.id', 'ASC')
            ->get();
        $i = 1;
        return view('renumeration.renumeration',compact('re','i'));
    }
}
