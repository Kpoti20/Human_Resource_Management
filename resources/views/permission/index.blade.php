@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">PERMISSION</h3>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </button>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et prenom(s)</th>
                        <th>Date debut permission</th>
                        <th>Date reprise</th>
                        <th>Nombre(s) de jour(s)</th>
                        <th>Motif</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($per as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->date_debut }}</td>
                            <td>{{ $p->date_fin }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->date_debut)->DiffInDays($p->date_fin) - $p->nombre_jour_preleve }}<span style='margin-left:5px;'>jour(s)</span>
                            <td>{{ $p->motif }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_per="{{ $p->id_per }}"
                                        data-date_debut="{{ $p->date_debut }}"
                                        data-date_fin="{{ $p->date_fin }}"
                                        data-motif="{{ $p->motif }}"
                                        data-target="#editeperm">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_per="{{ $p->id_per }}" data-toggle="modal" data-target="#deleteperm">Supprimer</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- AJOUT  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nouvelle permission</h4>
                </div>
                <form action="{{ url('PerStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('permission.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- MODIDFICATION -->
    <div class="modal fade" id="editeperm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('PerUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="permission_id" value="" id="permission_id">
                        <div class="form-group">
                            <label for="date_debut">Date debut</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut" id="date_debut">
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date reprise</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_fin" id="date_fin">
                        </div>
                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <select class="form-control" required name="motif" id="motif">
                                <option value="">Faites un choix</option>
                                <option value="Décès d'un conjoint, d'un ascendant ou d'un descendant en ligne directe">
                                    Décès d'un conjoint, d'un ascendant ou d'un descendant en ligne directe
                                </option>
                                <option value="Décès d'un frère ou d'une soeur">
                                    Décès d'un frère ou d'une soeur
                                </option>
                                <option value="Décès d'un beau-père ou d'une belle-mère">
                                    Décès d'un beau-père ou d'une belle-mère
                                </option>
                                <option value="Mariage du travailleur">
                                    Mariage du travailleur
                                </option>
                                <option value="Maladie">
                                    Maladie
                                </option>
                                <option value="Mariage d'un enfant, d'un enfant, d'un frère ou d'une soeur">
                                    Mariage d'un enfant, d'un enfant, d'un frère ou d'une soeur
                                </option>
                                <option value="Naissance au foyer">
                                    Naissance au foyer
                                </option>
                                <option value="Baptême">
                                    Baptême
                                </option>
                                <option value="Déménagement">
                                    Déménagement
                                </option>
                                <option value="Autres">
                                    Autres
                                </option>
                            </select>
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

    <!-- SUPPRESSION -->
    <div class="modal modal-danger" id="deleteperm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('PerDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="permission_id" value="" id="permission_id">
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