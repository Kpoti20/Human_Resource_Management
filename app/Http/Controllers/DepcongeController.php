<?php

namespace App\Http\Controllers;

use App\Depconge;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DepcongeController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut','!=','STAGE')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $depc = DB::table('depconges')
            ->join('personnels','personnels.id','=','depconges.personnel_membre')
            ->select('depconges.id as id_depc','matricule','nombre_jour_preleve','date_retour','nom_prenom','date_depart','date_arrivee','personnel_membre')
            ->orderBy('depconges.id', 'DESC')
            ->get();

        return view('depconge.index', compact('depc','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
//        Absence::create($request->all());
//        return back()->with('success', 'Enregistrement effectué avec succes.');

        $parameters = $request->all();
        $dep = new Depconge();
        $personnel = $dep->personnel_membre = $parameters['personnel_membre'];
        $dadebut = $dep->date_depart = $parameters['date_depart'];
        $dafin = $dep->date_retour = $parameters['date_retour'];
        $dareprise = $dep->date_arrivee = $parameters['date_arrivee'];
        $nbj = $dep->nombre_jour_preleve = $parameters['nombre_jour_preleve'];
        $dadebutl = new \DateTime($dadebut);
        $dadefinl = new \DateTime($dareprise);
        $interval = $dadebutl->diff($dadefinl);
        $nombre = $interval->format('%a');
        $nombre_final = $nombre - $nbj;
        $cumul = DB::table('cumuls')
                ->join('personnels', 'personnels.id', '=', 'cumuls.personnel_membre')
                ->where('personnel_membre', '=', $personnel)
                ->select('cumul_conge')
                ->get()
        ;
        foreach ($cumul as $cum){
            $cumul_conge = $cum->cumul_conge;
        }

        if ($dadebut > $dafin){
            $typ = 'error';
            $msg = 'Veuillez saisir correctement la date de retour des conges';
        }elseif($nombre > $cumul_conge) {

            $typ = 'error';
            $msg = 'Veuillez saisir correctement la date de retour des congés. La durée de votre congé dépasse votre cumul
             de congé';
        }else{

            $dep->save();
            DB::table('cumuls')
                ->join('personnels', 'personnels.id', '=', 'cumuls.personnel_membre')
                ->where('personnel_membre', '=', $personnel)
                ->update(
                    ['cumul_conge' => DB::raw('cumul_conge'.'-'.$nombre_final)]
                )
            ;
            $typ = 'success';
            $msg = 'Enregistrement effectuée avec succes.';
        }

        return back()->with($typ, $msg);
    }

    public function show($id){

    }

     //Fonction de modification
    public function update(Request $request)
    {
        $dpc = Depconge::findOrFail($request->departconge_id);
        $dpc->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
     //Fonction de suppression
    public function destroy(Request $request)
    {
        $dpco = Depconge::findOrFail($request->departconge_id);
        $dpco->delete();
        return back();
    }
}
