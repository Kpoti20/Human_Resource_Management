<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategorieController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $categories = Categorie::orderBy('id','DESC')->get();
        return view('categorie.index', compact('categories'));
    }

    public function create()
    {

    }
    // Fonction de creation de categorie
    public function store(Request $request)
    {
        Categorie::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification d'une categorie
    public function update(Request $request)
    {
        $categorie = Categorie::findOrFail($request->categorie_id);
        $categorie->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression d'une categorie
    public function destroy(Request $request)
    {
        $categorie = Categorie::findOrFail($request->categorie_id);
        $categorie->delete();
        return back();
    }
}
