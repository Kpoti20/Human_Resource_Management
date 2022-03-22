<?php

namespace App\Http\Controllers;

use App\Pprevenir;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PprevenirController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $prevenirs = DB::table('pprevenirs')
            ->join('personnels','personnels.id','=','pprevenirs.personnel_membre')
            ->select('matricule','nom_prenom','nom_prenoms','adresse_personne_prevenir',
                'telephone','lien',
                'date_entree_etablissement','date_sortie_etablissement','lieu_naissance','personnels.id','pprevenirs.id as idp')
            ->orderBy('pprevenirs.id', 'DESC')
            ->get();

        return view('pprevenir.index', compact('prevenirs','personnel'));
    }

    public function create()
    {

    }
    // Fonction de creation des personnes a prevenir
    public function store(Request $request)
    {
        Pprevenir::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $prevenir = Pprevenir::findOrFail($request->pprevenir_id);
        $prevenir->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $prev = Pprevenir::findOrFail($request->pprevenir_id);
        $prev->delete();
        return back();
    }
}
