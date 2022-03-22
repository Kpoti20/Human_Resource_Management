<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    //Initialisation du controlleur
    public function index()
    {
        $categories = Categorie::all();
        $personnels = DB::table('personnels')
                        ->join('categories','categories.id','=','personnels.categorie_professionnelle')
                        ->select('matricule','nom_prenom','statut', 'nom_categories','echelon',
                                'numero_cnss', 'lieu_affectation', 'anciennete','personne_charge',
                                'date_naissance','situation_matrimoniale','sexe','nationnalite',
                                'telephonne_1','telephone_2','mail','adresse','universite',
                                'niveau_etude','diplome','annee_diplome','filiation',
                                'date_entree_etablissement','date_sortie_etablissement','lieu_naissance','personnels.id')
                        ->orderBy('personnels.id', 'DESC')
                        ->get();
        return view('personnel.index',  compact('personnels','categories'));
    }

    public function index1()
    {
        $personnels = DB::table('personnels')
            ->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->select('matricule','nom_prenom','statut', 'nom_categories','echelon',
                'numero_cnss', 'lieu_affectation', 'anciennete','personne_charge',
                'date_naissance','situation_matrimoniale','sexe','nationnalite',
                'telephonne_1','telephone_2','mail','adresse','universite',
                'niveau_etude','diplome','annee_diplome','filiation',
                'date_entree_etablissement','date_sortie_etablissement','lieu_naissance','personnels.id')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        return view('personnel.index1',  compact('personnels'));
    }

    public function index2()
    {
        $personnels = DB::table('personnels')
            ->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->select('matricule','nom_prenom','statut', 'nom_categories','echelon',
                'numero_cnss', 'lieu_affectation', 'anciennete','personne_charge',
                'date_naissance','situation_matrimoniale','sexe','nationnalite',
                'telephonne_1','telephone_2','mail','adresse','universite',
                'niveau_etude','diplome','annee_diplome','filiation',
                'date_entree_etablissement','date_sortie_etablissement','lieu_naissance','personnels.id')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        return view('personnel.index2',  compact('personnels'));
    }

    public function index3()
    {
        $personnels = DB::table('personnels')
            ->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->select('matricule','nom_prenom','statut', 'nom_categories','echelon',
                'numero_cnss', 'lieu_affectation', 'anciennete','personne_charge',
                'date_naissance','situation_matrimoniale','sexe','nationnalite',
                'telephonne_1','telephone_2','mail','adresse','universite',
                'niveau_etude','diplome','annee_diplome','filiation',
                'date_entree_etablissement','date_sortie_etablissement','lieu_naissance','personnels.id')
            ->orderBy('personnels.id', 'DESC')
            ->get();
        return view('personnel.index3',  compact('personnels'));
    }

    public function create()
    {

    }

    // Fonction de creation de personnel
    public function store(Request $request)
    {
        Personnel::create($request->all());
        return back()->with('success', 'Enregistrement effectué avec succes.');
    }

    public function show($id){

    }

    // Fonction de modification d'un membre du personnel
    public function update(Request $request)
    {
        $personnel = Personnel::findOrFail($request->personne_id);
        $personnel->update($request->all());
        return back()->with('success', 'Modification effectué avec succes.');
    }
    // Fonction de suppression d'un membre du personnel
    public function destroy(Request $request)
    {
        $personnel = Personnel::findOrFail($request->personne_id);
        $personnel->delete();
        return back();
    }
// Fonction d'impression du personnel actifs
    public function Personnel_actif()
    {

        $emplo = DB::table('personnels')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
            ->join('occupations','occupations.personnel_membre','=','personnels.id')
            ->join('postes','postes.id','=','occupations.poste_id')
            ->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            //->where('Date(created_at) = CURDATE()')
//            ->whereDate('date_fin_stage', '>', Carbon::today())
//            ->whereDate('date_fin_cde', '>', Carbon::today())
//            ->whereDate('date_fin_cdd', '>', Carbon::today())
//            ->whereDate('date_retraite', '>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','nom_categories',
                'echelon','anciennete','lieu_affectation','personne_charge','numero_cnss')
            ->orderBy('personnels.id', 'ASC')->get();

        $i = 1;
        return view('personnel.personnel_actif', compact('emplo','i'));
    }

    public function printPreviewPersonnel_actif()
    {

        $emplot = DB::table('personnels')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
            ->join('occupations','occupations.personnel_membre','=','personnels.id')
            ->join('postes','postes.id','=','occupations.poste_id')
            ->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            //->where('Date(created_at) = CURDATE()')
//            ->whereDate('date_fin_stage', '>', Carbon::today())
//            ->whereDate('date_fin_cde', '>', Carbon::today())
//            ->whereDate('date_fin_cdd', '>', Carbon::today())
//            ->whereDate('date_retraite', '>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','nom_categories',
                'echelon','anciennete','lieu_affectation','personne_charge','numero_cnss')
            ->orderBy('personnels.id', 'ASC')->get();

        $i = 1; $t = 2;
        return view('personnel.print_personnel_actif', compact('emplot','i','t'));
    }

    // Fonction d'impression du personnel a la CNSS
    public function Personnel_cnss()
    {

        $emplo = DB::table('personnels')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
            ->join('occupations','occupations.personnel_membre','=','personnels.id')
            ->join('postes','postes.id','=','occupations.poste_id')
            //->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            //->where('Date(created_at) = CURDATE()')
//            ->whereDate('date_fin_stage', '>', Carbon::today())
//            ->whereDate('date_fin_cde', '>', Carbon::today())
//            ->whereDate('date_fin_cdd', '>', Carbon::today())
//            ->whereDate('date_retraite', '>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','date_naissance','date_entree_etablissement','personne_charge','numero_cnss')
            ->orderBy('personnels.id', 'ASC')->get();

        $i = 1;
        return view('personnel.personnel_cnss', compact('emplo','i'));
    }

    public function printPreviewPersonnel_cnss()
    {

        $emplot = DB::table('personnels')
//            ->join('stages','stages.personnel_membre','=','personnels.id')
//            ->join('ccdes','ccdes.personnel_membre','=','personnels.id')
//            ->join('ccdds','ccdds.personnel_membre','=','personnels.id')
//            ->join('ccdis','ccdis.personnel_membre','=','personnels.id')
            ->join('occupations','occupations.personnel_membre','=','personnels.id')
            ->join('postes','postes.id','=','occupations.poste_id')
            //->join('categories','categories.id','=','personnels.categorie_professionnelle')
            ->where('personnels.date_sortie_etablissement','=',' ' )
            //->where('Date(created_at) = CURDATE()')
//            ->whereDate('date_fin_stage', '>', Carbon::today())
//            ->whereDate('date_fin_cde', '>', Carbon::today())
//            ->whereDate('date_fin_cdd', '>', Carbon::today())
//            ->whereDate('date_retraite', '>', Carbon::today())
            ->select('matricule','nom_prenom','statut','libelle','date_naissance','date_entree_etablissement','personne_charge','numero_cnss')
            ->orderBy('personnels.id', 'ASC')->get();

        $i = 1; $t = 2;
        return view('personnel.print_personnel_cnss', compact('emplot','i','t'));
    }


}