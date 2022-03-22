<?php

namespace App\Http\Controllers;

use App\Retard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RetardController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $ret = DB::table('retards')
            ->join('personnels','personnels.id','=','retards.personnel_membre')
            ->select('matricule','nom_prenom','date_retard','heure_arrive','motif','sanction_retard','retards.id as id_ret')
            ->orderBy('retards.id', 'DESC')
            ->get();

        return view('retard.index', compact('ret','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Retard::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $re = Retard::findOrFail($request->retard_id);
        $re->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $r = Retard::findOrFail($request->retard_id);
        $r->delete();
        return back();
    }
}
