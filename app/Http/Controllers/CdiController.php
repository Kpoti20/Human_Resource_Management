<?php

namespace App\Http\Controllers;

use App\Ccdi;
use App\Poste;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CdiController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut', '=', 'CDI')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        $poste = Poste::all();

        $cdi = DB::table('ccdis')
            ->join('personnels','personnels.id','=','ccdis.personnel_membre')
            ->join('postes','postes.id','=','ccdis.poste_id')
            ->select('matricule','nom_prenom','libelle','date_embauche','date_debut_cdd','date_debut_cdi','date_retraite','ccdis.id as id_cdi')
            ->orderBy('ccdis.id', 'DESC')
            ->get();

        return view('cdi.index', compact('cdi','personnel','poste'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Ccdi::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $cd = Ccdi::findOrFail($request->cdi_id);
        $cd->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $cd = Ccdi::findOrFail($request->cdi_id);
        $cd->delete();
        return back();
    }

    // Fonction d'impression des cdi actifs
    public function CDI_actif()
    {

        $cdi = DB::table('ccdis')
            ->join('postes','postes.id','=','ccdis.poste_id')
            ->join('personnels','personnels.id','=','ccdis.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdis.date_retraite','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cdd','date_debut_cdi','date_retraite','date_naissance')
            ->orderBy('ccdis.id', 'ASC')->get();

        $i = 1; $t= 2 ;
        return view('cdi.contrat_cdi', compact('cdi','i','t'));
    }

    public function printPreviewCdi_actif()
    {

        $cdi = DB::table('ccdis')
            ->join('postes','postes.id','=','ccdis.poste_id')
            ->join('personnels','personnels.id','=','ccdis.personnel_membre')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->where('ccdis.date_retraite','>', Carbon::today())
            ->select('matricule','nom_prenom','date_embauche','libelle','date_debut_cdd','date_debut_cdi','date_retraite','date_naissance')
            ->orderBy('ccdis.id', 'ASC')->get();

        $i = 1; $t = 2;
        return view('cdi.print_cdi_actif', compact('cdi','i','t'));
    }
}
