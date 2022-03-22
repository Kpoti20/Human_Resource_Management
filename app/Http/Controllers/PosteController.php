<?php

namespace App\Http\Controllers;

use App\Poste;
use Illuminate\Http\Request;

use App\Http\Requests;

class PosteController extends Controller
{
    //Initialisation du controlleur
    public function index()
    {
        $postes = Poste::orderBy('id', 'DESC')->get();
        return view('poste.index', compact('postes'));
    }

    public function create()
    {

    }
    // Fonction de creation de poste
    public function store(Request $request)
    {
        Poste::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification de poste
    public function update(Request $request)
    {
        $poste = Poste::findOrFail($request->poste_id);
        $poste->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression d'un poste
    public function destroy(Request $request)
    {
        $poste = Poste::findOrFail($request->poste_id);
        $poste->delete();
        return back();
    }
}
