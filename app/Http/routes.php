<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route pour la connexion et la deconnexion de l'application
Route::auth();
// Autre route
Route::get('/home', 'HomeController@index');
// Route des menus de navigations

// Route pour la gestion des postes de travail
Route::resource('poste', 'PosteController');

// Route pour la gestion des postes de travail
Route::resource('categorie', 'CategorieController');

// Route pour la gestion du personnel
Route::resource('membre', 'PersonnelController');
Route::resource('membreStore', 'PersonnelController@store');
Route::resource('membreUpdate', 'PersonnelController@update');
Route::resource('membreDestroy', 'PersonnelController@destroy');
Route::resource('plus', 'PersonnelController@index1'); // Plus d'info sur les membres du personnel
Route::resource('plus2', 'PersonnelController@index2'); // Plus d'info sur les membres du personnel
Route::resource('plus3', 'PersonnelController@index3'); // Plus d'info sur les membres du personnel

// Route pour la gestion des personnes a prevenir
Route::resource('ppersonne', 'PprevenirController');
Route::resource('ppersonneStore', 'PprevenirController@store');
Route::resource('ppersonneUpdate', 'PprevenirController@update');
Route::resource('ppersonneDestroy', 'PprevenirController@destroy');

// Route pour la gestion des stagiaires
Route::resource('stage', 'StageController');
Route::resource('StageStore', 'StageController@store');
Route::resource('StageUpdate', 'StageController@update');
Route::resource('StageDestroy', 'StageController@destroy');

// Route pour la gestion des contrats cde
Route::resource('cde', 'CdeController');
Route::resource('CdeStore', 'CdeController@store');
Route::resource('CdeUpdate', 'CdeController@update');
Route::resource('CdeDestroy', 'CdeController@destroy');

// Route pour la gestion des contrats cdd
Route::resource('cdd', 'CddController');
Route::resource('CddStore', 'CddController@store');
Route::resource('CddUpdate', 'CddController@update');
Route::resource('CddDestroy', 'CddController@destroy');

// Route pour la gestion des contrats cdd
Route::resource('cdi', 'CdiController');
Route::resource('CdiStore', 'CdiController@store');
Route::resource('CdiUpdate', 'CdiController@update');
Route::resource('CdiDestroy', 'CdiController@destroy');

// Route pour la gestion des occupations
Route::resource('occupation', 'OccupationController');
Route::resource('OcStore', 'OccupationController@store');
Route::resource('OcUpdate', 'OccupationController@update');
Route::resource('OcDestroy', 'OccupationController@destroy');

// Route pour la gestion des titulaires et interims
Route::resource('interim', 'InterimController');
Route::resource('IntStore', 'InterimController@store');
Route::resource('IntDestroy', 'InterimController@destroy');

// Route pour la gestion des planifications pour les conges
Route::resource('planification', 'PlanificationController');
Route::resource('PlanStore', 'PlanificationController@store');
Route::resource('PlanUpdate', 'PlanificationController@update');
Route::resource('PlanDestroy', 'PlanificationController@destroy');

// Route pour la gestion des departs de conges
Route::resource('depart_conge', 'DepcongeController');
Route::resource('DepconStore', 'DepcongeController@store');
Route::resource('DepconUpdate', 'DepcongeController@update');
Route::resource('DepconDelete', 'DepcongeController@destroy');

// Route pour la gestion des permissions
Route::resource('permission', 'PermissionController');
Route::resource('PerStore', 'PermissionController@store');
Route::resource('PerUpdate', 'PermissionController@update');
Route::resource('PerDestroy', 'PermissionController@destroy');

// Route pour la gestion des cumuls
Route::resource('cumul', 'CumulController');
Route::resource('CumStore', 'CumulController@store');
Route::resource('CumUpdate', 'CumulController@update');
Route::resource('CumDestroy', 'CumulController@destroy');

// Route pour la gestion des absences
Route::resource('absence', 'AbsenceController');
Route::resource('AbsStore', 'AbsenceController@store');
Route::resource('AbsUpdate', 'AbsenceController@update');
Route::resource('AbsDestroy', 'AbsenceController@destroy');

// Route pour la gestion des retards
Route::resource('retard', 'RetardController');
Route::resource('RetStore', 'RetardController@store');
Route::resource('RetUpdate', 'RetardController@update');
Route::resource('RetDestroy', 'RetardController@destroy');

// Route pour la gestion des renumerations
Route::resource('renumeration', 'RenumerationController');
Route::resource('RenStore', 'RenumerationController@store');
Route::resource('RenUpdate', 'RenumerationController@update');
Route::resource('RenDestroy', 'RenumerationController@destroy');

// Route pour la gestion des extras
Route::resource('extra', 'ExtraController');
Route::resource('ExStore', 'ExtraController@store');
Route::resource('ExUpdate', 'ExtraController@update');
Route::resource('ExDestroy', 'ExtraController@destroy');

// Route pour la gestion des demandes de stage
Route::resource('dstage', 'DstageController');
Route::resource('DsStore', 'DstageController@store');
Route::resource('DsUpdate', 'DstageController@update');
Route::resource('DsDestroy', 'DstageController@destroy');

// Route pour la gestion des demandes d'emploi
Route::resource('demploi', 'DemploiController');
Route::resource('DemStore', 'DemploiController@store');
Route::resource('DemUpdate', 'DemploiController@update');
Route::resource('DemDestroy', 'DemploiController@destroy');

// Route pour les impressions de tout le personnel
Route::resource('personnel_actif', 'PersonnelController@Personnel_actif');
Route::get('print_personnel_actif', 'PersonnelController@printPreviewPersonnel_actif');

// Route pour les impressions des stagiaires actif
Route::resource('stagiaire_actif', 'StageController@Stagiaire_actif');
Route::get('print_stagiaire_actif', 'StageController@printPreviewStagiaire_actif');

// Route pour les impressions du personnel sous contrat essai
Route::resource('cde_actif', 'CdeController@CDE_actif');
Route::get('print_cde_actif', 'CdeController@printPreviewCde_actif');

// Route pour les impressions du personnel sous contrat duree determinee
Route::resource('cdd_actif', 'CddController@CDD_actif');
Route::get('print_cdd_actif', 'CddController@printPreviewCdd_actif');

// Route pour les impressions du personnel sous contrat duree indeterminee
Route::resource('cdi_actif', 'CdiController@CDI_actif');
Route::get('print_cdi_actif', 'CdiController@printPreviewCdi_actif');

// Route pour les impressions des elements de renumerations du personnel
Route::resource('renumeration_mois', 'RenumerationController@printRE');
Route::get('print_renumeration', 'RenumerationController@printPreviewRE');

// Route pour les impressions du registre d'embauche
Route::resource('registre', 'RegistreController@index');
Route::get('print_registre', 'RegistreController@printPreviewRegist');

// Route pour les impressions du personnel a la cnss
Route::resource('personnel_cnss', 'PersonnelController@Personnel_cnss');
Route::get('print_personnel_cnss', 'PersonnelController@printPreviewPersonnel_cnss');

// Route pour les impressions des demandes de stage
Route::resource('demande_stage', 'DstageController@Dstage_actif');
Route::get('print_demande_stage', 'DstageController@printPreviewDemande_stage');

// Route pour les impressions des demandes d'emploi
Route::resource('demande_emploi', 'DemploiController@Demploi_actif');
Route::get('print_demande_emploi', 'DemploiController@printPreviewDemande_emploi');