<?php

namespace App\Http\Controllers;

use App\Absence;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $ab = DB::table('absences')
            ->join('personnels','personnels.id','=','absences.personnel_membre')
            ->select('matricule','nom_prenom','date_debut','motif','sanction_absence','date_fin','absences.id as id_ab')
            ->orderBy('absences.id', 'DESC')
            ->get();

        return view('absence.index', compact('ab','personnel'));
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
        $absen = new Absence();
        $personnel = $absen->personnel_membre = $parameters['personnel_membre'];
        $dadebut = $absen->date_debut = $parameters['date_debut'];
        $dafin = $absen->date_fin = $parameters['date_fin'];
        $motif = $absen->motif = $parameters['motif'];
        $sanction_absence = $absen->sanction_absence = $parameters['sanction_absence'];

        if ($dadebut > $dafin){
            $typ = 'error';
            $msg = 'Veuillez saisir correctement la date de fin d\'absence';
        }else {
            $dadebutl = new \DateTime($dadebut);
            $dadefinl = new \DateTime($dafin);
            $interval = $dadebutl->diff($dadefinl);
            $nombre = $interval->format('%a');
            $motif = $absen->motif = $parameters['motif'];
            $sanction_absence = $absen->sanction_absence = $parameters['sanction_absence'];
            $absen->save();
            $typ = 'success';
            $msg = 'Enregistrement effectuée avec succes.';
        }
        if( ($sanction_absence == 'Déduction des jours de conges') && ($motif != ' ')){
            DB::table('cumuls')
                ->join('personnels', 'personnels.id', '=', 'cumuls.personnel_membre')
                ->where('personnel_membre', '=', $personnel)
                ->update(
                    ['cumul_conge' => DB::raw('cumul_conge'.'-'.$nombre)]
                )
            ;
        }
        return back()->with($typ, $msg);
    }

    public function show($id){

    }

    // Fonction de modification
    public function update(Request $request)
    {
        $abs = Absence::findOrFail($request->absence_id);
        $abs->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $abs = Absence::findOrFail($request->absence_id);
        $abs->delete();
        return back();
    }
}
