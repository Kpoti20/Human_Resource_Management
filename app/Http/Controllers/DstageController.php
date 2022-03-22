<?php

namespace App\Http\Controllers;

use App\Dstage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DstageController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $dst = DB::table('dstages')
            ->select('nom_prenom','contact','adresse','diplome','poste','dstages.id as id')
            ->orderBy('dstages.id', 'DESC')
            ->get();

        return view('dstage.index', compact('dst'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Dstage::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $ex = Dstage::findOrFail($request->dstage_id);
        $ex->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $e = Dstage::findOrFail($request->dstage_id);
        $e->delete();
        return back();
    }

    // Fonction d'impression des cde actifs
    public function Dstage_actif()
    {
        $dst = DB::table('dstages')
            ->select('nom_prenom','contact','adresse','diplome','poste','dstages.id as id')
            ->orderBy('dstages.id', 'DESC')
            ->get();
        $i = 1;
        return view('dstage.dstage', compact('dst','i'));
    }

    public function printPreviewDemande_stage()
    {

        $dst = DB::table('dstages')
            ->select('nom_prenom','contact','adresse','diplome','poste','dstages.id as id')
            ->orderBy('dstages.id', 'DESC')
            ->get();
        $i = 1;
        return view('dstage.print_dstage', compact('dst','i'));
    }
}