<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RegistreController extends Controller
{
    public function index()
    {

        $employe = DB::table('personnels')
            ->join('pprevenirs','pprevenirs.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
            ->where('personnels.date_sortie_etablissement','=',' ' )
//            ->where('stages.date_fin_stage','>',Carbon::today())
//            ->where('ccdes.date_fin_cde','>',Carbon::today())
//            ->where('ccdds.date_fin_cdd','>',Carbon::today())
//            ->where('ccdis.date_retraite','>',Carbon::today())
            ->groupBy('personnels.id')
            ->get();

        return view('registre.index', compact('employe'));
    }

    public function printPreviewRegist(){

        $pers = DB::table('personnels')
            ->join('pprevenirs','pprevenirs.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
            ->where('personnels.date_sortie_etablissement','=',' ' )
//            ->where('stages.date_fin_stage','>',Carbon::today())
//            ->where('ccdes.date_fin_cde','>',Carbon::today())
//            ->where('ccdds.date_fin_cdd','>',Carbon::today())
//            ->where('ccdis.date_retraite','>',Carbon::today())
            ->groupBy('personnels.id')
            ->get();
        $i = 1;

        $p = DB::table('personnels')
            ->join('pprevenirs','pprevenirs.personnel_membre','=','personnels.id')
            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            ->groupBy('personnels.id')
            ->count();

        return view('registre.print_registre',compact('pers','i','p'));
    }
}
