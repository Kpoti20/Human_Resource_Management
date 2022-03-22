@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">PLANIFICATION CONGE</h3>
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
                        <th>Date debut conge</th>
                        <th>Date fin conge</th>
                        <th>Duree conge</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($plan as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->date_debut_conge }}</td>
                            <td>{{ $p->date_fin_conge }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->date_debut_conge)->DiffInDays($p->date_fin_conge) }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_plan="{{ $p->id_plan }}"
                                        data-date_debut_conge="{{ $p->date_debut_conge }}"
                                        data-date_fin_conge="{{ $p->date_fin_conge }}"
                                        data-target="#editeplan">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_plan="{{ $p->id_plan }}" data-toggle="modal" data-target="#deleteplan">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouvelle planification</h4>
                </div>
                <form action="{{ url('PlanStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('planification.form')
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
    <div class="modal fade" id="editeplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('PlanUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="planification_id" value="" id="planification_id">
                        <div class="form-group">
                            <label for="date_debut_conge">Date debut</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut_conge" id="date_debut_conge">
                        </div>
                        <div class="form-group">
                            <label for="date_fin_conge">Date fin</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_fin_conge" id="date_fin_conge">
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
    <div class="modal modal-danger" id="deleteplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('PlanDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="planification_id" value="" id="planification_id">
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