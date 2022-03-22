<?php

namespace App\Http\Controllers;

use App\Demploi;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DemploiController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $demp = DB::table('demplois')
            ->select('nom_prenom','contact','adresse','diplome','poste','demplois.id as id_emplo')
            ->orderBy('demplois.id', 'DESC')
            ->get();

        return view('demploi.index', compact('demp'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Demploi::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $dem = Demploi::findOrFail($request->demploi_id);
        $dem->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $d = Demploi::findOrFail($request->demploi_id);
        $d->delete();
        return back();
    }

    public function Demploi_actif()
    {
        $demp = DB::table('demplois')
            ->select('nom_prenom','contact','adresse','diplome','poste','demplois.id as id_emplo')
            ->orderBy('demplois.id', 'DESC')
            ->get();
        $i = 1;
        return view('demploi.demploi', compact('demp','i'));
    }

    public function printPreviewDemande_emploi()
    {
        $demp = DB::table('demplois')
            ->select('nom_prenom','contact','adresse','diplome','poste','demplois.id as id_emplo')
            ->orderBy('demplois.id', 'DESC')
            ->get();
        $i = 1;
        return view('demploi.print_demploi', compact('demp','i'));
    }
}
