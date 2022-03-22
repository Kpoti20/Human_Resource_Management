@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">DEPART CONGE</h3>
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
                        <th>Date depart</th>
                        <th>Date fin</th>
                        <th>Date reprise</th>
                        <th>Nb jr</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($depc as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->date_depart }}</td>
                            <td>{{ $p->date_retour }}</td>
                            <td>{{ $p->date_arrivee }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->date_depart)->DiffInDays($p->date_arrivee) - $p->nombre_jour_preleve }} <span style='margin-left:5px;'>jour(s)</span>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        {{--data-id_depc="{{ $p->id_depc }}"--}}
                                        data-target="#deduc">Ded</button> /
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_depc="{{ $p->id_depc }}"
                                        data-date_depart="{{ $p->date_depart }}"
                                        data-date_retour="{{ $p->date_retour }}"
                                        data-date_arrivee="{{ $p->date_arrivee }}"
                                        data-target="#editdepc">Mod</button> /
                                <button class="btn btn-warning btn-xs" data-id_depc="{{ $p->id_depc }}" data-toggle="modal" data-target="#deletedepc">Sup</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouveau conge</h4>
                </div>
                <form action="{{ url('DepconStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('depconge.form')
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
    <div class="modal fade" id="editdepc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de la periode de conge</h4>
                </div>
                <form action="{{ url('DepconUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="departconge_id" value="" id="departconge_id">
                        <div class="form-group">
                            <label for="date_depart">Date depart</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_depart" id="date_depart">
                        </div>
                        <div class="form-group">
                            <label for="date_retour">Date fin</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_retour" id="date_retour">
                        </div>
                        <div class="form-group">
                            <label for="date_arrivee">Date reprise</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_arrivee" id="date_arrivee">
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
    <div class="modal modal-danger" id="deletedepc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('DepconDelete', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="departconge_id" value="" id="departconge_id">

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