<?php

namespace App\Http\Controllers;

use App\Cumul;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;

class CumulController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->where('statut','!=','STAGE')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $cum = DB::table('cumuls')
            ->join('personnels','personnels.id','=','cumuls.personnel_membre')
            ->select('matricule','nom_prenom','cumul_conge','cumuls.id as id_cum')
            ->orderBy('cumuls.id', 'DESC')
            ->get();

        return view('cumul.index', compact('cum','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
        Cumul::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification
    public function update()
    {

        $cum = DB::table('cumuls')->select('updated_at')->limit(1)->get();
        foreach ($cum as $c){
            $da = $c->updated_at;
        }

        $date_maj = new \DateTime($da);
        $date_recent_bd = $date_maj->format('Y-m');

        if ($date_recent_bd == date('Y-m')){
            $typ = 'error';
            $msg = 'Mise à jour du cumul des congés déja effectuée pour ce mois';
        }else{
            DB::table('cumuls')
                ->update(
                    ['cumul_conge' => DB::raw('cumul_conge+2.5'),
                        'updated_at' => date("Y-m-d H:i:s")]
                );
            $typ = 'success';
            $msg = 'Mise à jour du cumul des congés effectuée avec succes.';
        }

        return back()->with($typ, $msg);
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $cum = Cumul::findOrFail($request->cumul_id);
        $cum->delete();
        return back();
    }
}