<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Personnel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    //Initialisation du controller
    public function index()
    {
        $personnel = DB::table('personnels')
            ->where('date_sortie_etablissement','=',' ')
            ->orderBy('personnels.id', 'DESC')
            ->get();

        $per = DB::table('permissions')
            ->join('personnels','personnels.id','=','permissions.personnel_membre')
            ->select('matricule','nom_prenom','date_debut','motif','nombre_jour_preleve','date_fin','permissions.id as id_per')
            ->orderBy('permissions.id', 'DESC')
            ->get();

        return view('permission.index', compact('per','personnel'));
    }

    public function create()
    {

    }
    // Fonction d'ajout a la BD
    public function store(Request $request)
    {
//        Permission::create($request->all());
//        return back()->with('success', 'Enregistrement effectué avec succes.');

        $parameters = $request->all();
        $perm = new Permission();
        $empid = $perm->personnel_membre = $parameters['personnel_membre'];
        $dadebut = $perm->date_debut = $parameters['date_debut'];
        $dafin = $perm->date_fin = $parameters['date_fin'];
        $motif = $perm->motif = $parameters['motif'];
        if ($dadebut > $dafin){
            $typ = 'error';
            $msg = 'Veuillez saisir correctement la date de fin de permission';
        }else {
            $dadebutl = new \DateTime($dadebut);
            $dadefinl = new \DateTime($dafin);
            $interval = $dadebutl->diff($dadefinl);
            $nombre = $interval->format('%a');
            $nbj = $perm->nombre_jour_preleve = $parameters['nombre_jour_preleve'];
            $nombre_final = $nombre - $nbj;
            $motif = $perm->motif = $parameters['motif'];
            $perm->save();
            $typ = 'success';
            $msg = 'Enregistrement effectuée avec succes.';
        }
        if($motif == 'Autres'){
            DB::table('cumuls')
                ->join('personnels', 'personnels.id', '=', 'cumuls.personnel_membre')
                ->where('personnel_membre', '=', $empid)
                ->update(
                    ['cumul_conge' => DB::raw('cumul_conge'.'-'.$nombre_final)]
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
        $pe = Permission::findOrFail($request->permission_id);
        $pe->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression
    public function destroy(Request $request)
    {
        $pe = Permission::findOrFail($request->permission_id);
        $pe->delete();
        return back();
    }
}
