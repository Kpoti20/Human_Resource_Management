<?php

namespace App\Http\Controllers;

use App\Ccde;
use App\Poste;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CdeController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut', '=', 'CDE')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();

        $cde = DB::table('ccdes')
            ->join('personnels','personnels.id','=','ccdes.personnel_membre')
            ->join('postes','postes.id','=','ccdes.poste_id')
            ->select('matricule','nom_prenom','libelle','date_embauche','date_debut_cde','date_fin_cde','ccdes.id as id_cde')
            ->orderBy('ccdes.id', 'DESC')
            ->get();

        return view('cde.index', compact('cde','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Ccde::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $cd = Ccde::findOrFail($request->cde_id);
        $cd->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $cd = Ccde::findOrFail($request->cde_id);
        $cd->delete();
        return back();
    }

    // Fonction d'impression des cde actifs
    public function CDE_actif()
    {

        $cde = DB::table('ccdes')
            ->join('postes','postes.id','=','ccdes.poste_id')
            ->join('personnels','personnels.id','=','ccdes.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdes.date_fin_cde','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cde','date_fin_cde','date_naissance')
            ->orderBy('ccdes.id', 'ASC')->get();

        $i = 1;
        return view('cde.contrat_cde', compact('cde','i'));
    }

    public function printPreviewCde_actif()
    {

        $cde = DB::table('ccdes')
            ->join('postes','postes.id','=','ccdes.poste_id')
            ->join('personnels','personnels.id','=','ccdes.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdes.date_fin_cde','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cde','date_fin_cde','date_naissance')
            ->orderBy('ccdes.id', 'ASC')->get();

        $i = 1; $t = 1;
        return view('cde.print_cde_actif', compact('cde','i','t'));
    }
}
