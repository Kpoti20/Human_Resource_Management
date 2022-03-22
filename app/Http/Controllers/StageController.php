<?php

namespace App\Http\Controllers;

use App\Poste;
use App\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class StageController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut', '=', 'STAGE')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();

        $stage = DB::table('stages')
            ->join('personnels','personnels.id','=','stages.personnel_membre')
            ->join('postes','postes.id','=','stages.poste_id')
            ->select('matricule','nom_prenom','libelle','date_debut_stage','date_fin_stage','stages.id as ids')
            ->orderBy('stages.id', 'DESC')
            ->get();

        return view('stage.index', compact('stage','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Stage::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $st = Stage::findOrFail($request->stage_id);
        $st->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $sta = Stage::findOrFail($request->stage_id);
        $sta->delete();
        return back();
    }
    // Fonction d'impression des stagiaires actifs
    public function Stagiaire_actif()
    {

        $stag = DB::table('stages')
            ->join('postes','postes.id','=','stages.poste_id')
            ->join('personnels','personnels.id','=','stages.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('stages.date_fin_stage','>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','date_debut_stage','date_fin_stage')
            ->orderBy('stages.id', 'ASC')->get();

        $i = 1;
        return view('stage.stagiaire_actif', compact('stag','i'));
    }

    public function printPreviewStagiaire_actif()
    {

        $stage = DB::table('stages')
            ->join('postes','postes.id','=','stages.poste_id')
            ->join('personnels','personnels.id','=','stages.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('stages.date_fin_stage','>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','date_debut_stage','date_fin_stage')
            ->orderBy('stages.id', 'ASC')->get();

        $i = 1; $t = 1;
        return view('stage.print_stagiaire_actif', compact('stage','i','t'));
    }
}