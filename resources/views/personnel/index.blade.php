@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">PERSONNEL MEMBRE</h3>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </button>

            <a href="{{url('plus')}}" style="margin-left: 10px; font-size: 12px;" class="btn btn-primary">Voir plus</a>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Statut</th>
                        <th>Categorie Prof</th>
                        <th>N° CNSS</th>
                        <th>Lieu Affec</th>
                        <th>Ancienneté</th>
                        <th>P Charge</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($personnels as $e)
                        <tr>
                            <td>{{ $e->matricule }}</td>
                            <td>{{ $e->nom_prenom }}</td>
                            <td>{{ $e->statut }}</td>
                            <td>{{ $e->nom_categories }}<span style="margin-left: 5px">{{ $e->echelon }}</span></td>
                            <td>{{ $e->numero_cnss }}</td>
                            <td>{{ $e->lieu_affectation }}</td>
                            <td>{{ $e->anciennete }}</td>
                            <td>{{ $e->personne_charge }}</td>
                            <td>
                                <button class="btn btn-info btn-xs " data-toggle="modal"
                                        data-personnel_id="{{ $e->id }}"
                                        data-matricule="{{ $e->matricule }}"
                                        data-nom_prenom="{{ $e->nom_prenom }}"
                                        data-statut="{{ $e->statut }}"
                                        data-numero_cnss="{{ $e->numero_cnss }}"
                                        {{--data-categorie_professionnelle="{{ $e-> }}"--}}
                                        data-lieu_affectation="{{ $e->lieu_affectation }}"
                                        data-anciennete="{{ $e->anciennete }}"
                                        data-personne_charge="{{ $e->personne_charge }}"
                                        data-date_naissance="{{ $e->date_naissance }}"
                                        data-lieu_naissance="{{ $e->lieu_naissance }}"
                                        data-filiation="{{ $e->filiation }}"
                                        data-date_entree_etablissement="{{ $e->date_entree_etablissement  }}"
                                        data-date_sortie_etablissement ="{{ $e->date_sortie_etablissement  }}"
                                        data-situation_matrimoniale ="{{ $e->situation_matrimoniale  }}"
                                        data-sexe="{{ $e->sexe }}"
                                        data-nationnalite="{{ $e->nationnalite }}"
                                        data-telephonne_1="{{ $e->telephonne_1 }}"
                                        data-telephone_2="{{ $e->telephone_2 }}"
                                        data-mail="{{ $e->mail }}"
                                        data-adresse="{{ $e->adresse }}"
                                        data-universite="{{ $e->universite }}"
                                        data-niveau_etude="{{ $e->niveau_etude }}"
                                        data-diplome="{{ $e->diplome }}"
                                        data-annee_diplome="{{ $e->annee_diplome }}"
                                        data-target="#editepersonnel">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-personnel_id="{{ $e->id }}" data-toggle="modal" data-target="#deletepersonnel">Supprimer</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- AJOUT EMPLOYE -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 800px">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nouveau employé</h4>
                </div>
                <form action="{{ url('membreStore')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('personnel.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- MODIDFICATION D'UN EMPLOYE -->
    <div class="modal fade" id="editepersonnel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 800px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification des informations</h4>
                </div>
                <form action="{{ url('membreUpdate', 'test')}}" class="form-inline" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="personne_id" value="" id="personne_id">
                        <div class="form-group">
                            <label for="matricule">Matle</label>
                            <input type="text"  maxlength="6" required autocomplete="off" class="form-control" name="matricule" id="matricule">
                        </div>
                        <div class="form-group">
                            <label for="nom_prenom">No et pren</label>
                            <input type="text"  required autocomplete="off" class="form-control" name="nom_prenom" id="nom_prenom">
                        </div>
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <select class="form-control"  name="statut" id="statut">
                                <option value="">Faites un choix</option>
                                <option value="STAGE">STAGE</option>
                                <option value="CDE">CDE</option>
                                <option value="CDD">CDD</option>
                                <option value="CDI">CDI</option>
                            </select>
                        </div><br><br>
                        <div class="form-group">
                            <label for="numero_cnss">N°CNSS</label>
                            <input type="float" maxlength="6"  autocomplete="off" class="form-control" name="numero_cnss" id="numero_cnss">
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="categorie_professionnelle">Cat prof</label>--}}
                            {{--<select class="form-control"  name="categorie_professionnelle" id="categorie_professionnelle">--}}
                                {{--<option value="">Faites un choix</option>--}}
                                {{--@foreach($categories as $ca)--}}
                                    {{--<option value="{{$ca->id}}">{{$ca->nom_categories}} {{ $ca->echelon}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="lieu_affectation">Lieu d'aff</label>
                            <input type="text"   autocomplete="off" name="lieu_affectation" id="lieu_affectation" class="form-control" >
                        </div><br><br>
                        <div class="form-group">
                            <label for="anciennete">Ancie</label>
                            <input type="float" autocomplete="off" name="anciennete" id="anciennete" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="personne_charge">Pers charg</label>
                            <input type="float"  autocomplete="off" name="personne_charge" id="personne_charge" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="date_naissance">Naiss</label>
                            <input type="date"  autocomplete="off" name="date_naissance" id="date_naissance" class="form-control" >
                        </div><br><br>
                        <div class="form-group">
                            <label for="lieu_naissance">Lieu Naiss</label>
                            <input type="text"  autocomplete="off" name="lieu_naissance" id="lieu_naissance" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="filiation">Filiation</label>
                            <input type="text"  autocomplete="off" name="filiation" id="filiation" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="date_entree_etablissement">Date entree</label>
                            <input type="date"  require autocomplete="off" name="date_entree_etablissement" id="date_entree_etablissement" class="form-control" >
                        </div><br><br>
                        <div class="form-group">
                            <label for="date_sortie_etablissement">Date sortie</label>
                            <input type="date"  autocomplete="off" name="date_sortie_etablissement" id="date_sortie_etablissement" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="situation_matrimoniale">Sit Mat</label>
                            <select class="form-control" name="situation_matrimoniale" id="situation_matrimoniale">
                                <option value="">Faites un choix</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorçé(e)">Divorçé(e)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select class="form-control" required name="sexe" id="sexe">
                                <option value="">Faites un choix</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div><br><br>
                        <div class="form-group">
                            <label for="nationnalite">Nation</label>
                            <input type="text" autocomplete="off" name="nationnalite" id="nationnalite" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="telephonne_1">Tel1</label>
                            <input type="text" maxlength="8" autocomplete="off" name="telephonne_1" id="telephonne_1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="telephone_2">Tel2</label>
                            <input type="text" maxlength="8" autocomplete="off" name="telephone_2" id="telephone_2" class="form-control" >
                        </div><br><br>
                        <div class="form-group">
                            <label for="mail">Mail</label>
                            <input type="email" autocomplete="off" name="mail" id="mail" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adr</label>
                            <input type="text" autocomplete="off" name="adresse" id="adresse" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="universite">Univ</label>
                            <input type="text" autocomplete="off" name="universite" id="universite" class="form-control" >
                        </div><br><br>
                        <div class="form-group">
                            <label for="niveau_etude">Niv Et</label>
                            <input type="text" autocomplete="off" name="niveau_etude" id="niveau_etude" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="diplome">Dip</label>
                            <input type="text" autocomplete="off" name="diplome" id="diplome" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="annee_diplome">An Dip</label>
                            <input type="float" autocomplete="off" name="annee_diplome" id="annee_diplome" class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- SUPPRESSION EMPLOYE -->
    <div class="modal modal-danger" id="deletepersonnel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('membreDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="personne_id" value="" id="personne_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Non, Annuler</button>
                        <button type="submit" class="btn btn-warning">Oui, Supprimer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
