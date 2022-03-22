<?php

namespace App\Http\Controllers;

use App\Interim;
use App\Poste;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class InterimController extends Controller
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

        $interim = Interim::orderBy('interims.id', 'DESC')->get();

        return view('interim.index', compact('interim','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Interim::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $int = Interim::findOrFail($request->interim_id);
        $int->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $int = Interim::findOrFail($request->interim_id);
        $int->delete();
        return back();
    }
}
