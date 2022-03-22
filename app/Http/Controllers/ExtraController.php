<?php

namespace App\Http\Controllers;

use App\Extra;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $ex = DB::table('extras')
            ->join('personnels','personnels.id','=','extras.personnel_membre')
            ->select('matricule','nom_prenom','date_evenement','evenement','don','extras.id as id_ext')
            ->orderBy('extras.id', 'DESC')
            ->get();

        return view('extra.index', compact('ex','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Extra::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $ex = Extra::findOrFail($request->extra_id);
        $ex->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $e = Extra::findOrFail($request->extra_id);
        $e->delete();
        return back();
    }
}
