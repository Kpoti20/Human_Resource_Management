<?php

namespace App\Http\Controllers;

use App\Planification;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PlanificationController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $plan = DB::table('planifications')
            ->join('personnels','personnels.id','=','planifications.personnel_membre')
            ->select('matricule','nom_prenom','date_debut_conge','date_fin_conge','planifications.id as id_plan')
            ->orderBy('planifications.id', 'DESC')
            ->get();

        return view('planification.index', compact('plan','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Planification::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $pl = Planification::findOrFail($request->planification_id);
        $pl->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $pla = Planification::findOrFail($request->planification_id);
        $pla->delete();
        return back();
    }
}
