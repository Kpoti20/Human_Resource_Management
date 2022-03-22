<?php

namespace App\Http\Controllers;

use App\Ccdd;
use App\Poste;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CddController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut', '=', 'CDD')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();

        $cdd = DB::table('ccdds')
            ->join('personnels','personnels.id','=','ccdds.personnel_membre')
            ->join('postes','postes.id','=','ccdds.poste_id')
            ->select('matricule','nom_prenom','libelle','date_embauche','date_debut_cdd','date_fin_cdd','date_echeance_cdd','ccdds.id as id_cdd')
            ->orderBy('ccdds.id', 'DESC')
            ->get();

        return view('cdd.index', compact('cdd','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Ccdd::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $cd = Ccdd::findOrFail($request->cdd_id);
        $cd->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $cd = Ccdd::findOrFail($request->cdd_id);
        $cd->delete();
        return back();
    }

    // Fonction d'impression des cdd actifs
    public function CDD_actif()
    {

        $cdd = DB::table('ccdds')
            ->join('postes','postes.id','=','ccdds.poste_id')
            ->join('personnels','personnels.id','=','ccdds.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdds.date_fin_cdd','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cdd','date_echeance_cdd','date_fin_cdd','date_naissance')
            ->orderBy('ccdds.id', 'ASC')->get();

        $i = 1;
        return view('cdd.contrat_cdd', compact('cdd','i'));
    }

    public function printPreviewCdd_actif()
    {

        $cdd = DB::table('ccdds')
            ->join('postes','postes.id','=','ccdds.poste_id')
            ->join('personnels','personnels.id','=','ccdds.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdds.date_fin_cdd','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cdd','date_echeance_cdd','date_fin_cdd','date_naissance')
            ->orderBy('ccdds.id', 'ASC')->get();

        $i = 1; $t = 1;
        return view('cdd.print_cdd_actif', compact('cdd','i','t'));
    }
}
