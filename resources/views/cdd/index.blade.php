@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">CONTRAT-CDD</h3>
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
                        <th>Poste</th>
                        <th>Date d'embauche</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Date echeance</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cdd as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->libelle }}</td>
                            <td>{{ $p->date_embauche }}</td>
                            <td>{{ $p->date_debut_cdd }}</td>
                            <td>{{ $p->date_fin_cdd }}</td>
                            <td>{{ $p->date_echeance_cdd }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_cdd="{{ $p->id_cdd }}"
                                        data-date_embauche="{{ $p->date_embauche }}"
                                        data-date_debut_cdd="{{ $p->date_debut_cdd }}"
                                        data-date_fin_cdd="{{ $p->date_fin_cdd }}"
                                        data-date_echeance_cdd="{{ $p->date_echeance_cdd }}"
                                        data-target="#editcdd">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_cdd="{{ $p->id_cdd }}" data-toggle="modal" data-target="#deletecdd">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouveau CDD</h4>
                </div>
                <form action="{{ url('CddStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('cdd.form')
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
    <div class="modal fade" id="editcdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('CddUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="cdd_id" value="" id="cdd_id">
                        <div class="form-group">
                            <label for="date_embauche">Date d'embauche</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_embauche" id="date_embauche">
                        </div>
                        <div class="form-group">
                            <label for="date_debut_cdd">Date debut cdd</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut_cdd" id="date_debut_cdd">
                        </div>
                        <div class="form-group">
                            <label for="date_fin_cdd">Date fin cdd</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_fin_cdd" id="date_fin_cdd">
                        </div>
                        <div class="form-group">
                            <label for="date_echeance_cdd">Date echeance cdd</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_echeance_cdd" id="date_echeance_cdd">
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
    <div class="modal modal-danger" id="deletecdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('CddDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="cdd_id" value="" id="cdd_id">

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