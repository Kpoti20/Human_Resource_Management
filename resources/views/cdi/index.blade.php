@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">CONTRAT-CDI</h3>
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
                        <th>Date debut CDD</th>
                        <th>Date debut CDI</th>
                        <th>Date retraite</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cdi as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->libelle }}</td>
                            <td>{{ $p->date_embauche }}</td>
                            <td>{{ $p->date_debut_cdd }}</td>
                            <td>{{ $p->date_debut_cdi }}</td>
                            <td>{{ $p->date_retraite }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_cdi="{{ $p->id_cdi }}"
                                        data-date_embauche="{{ $p->date_embauche }}"
                                        data-date_debut_cdd="{{ $p->date_debut_cdd }}"
                                        data-date_debut_cdi="{{ $p->date_debut_cdi }}"
                                        data-date_retraite="{{ $p->date_retraite }}"
                                        data-target="#editcdi">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_cdi="{{ $p->id_cdi }}" data-toggle="modal" data-target="#deletecdi">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouveau CDI</h4>
                </div>
                <form action="{{ url('CdiStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('cdi.form')
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
    <div class="modal fade" id="editcdi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('CdiUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="cdi_id" value="" id="cdi_id">
                        <div class="form-group">
                            <label for="date_embauche">Date d'embauche</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_embauche" id="date_embauche">
                        </div>
                        <div class="form-group">
                            <label for="date_debut_cdd">Date debut cdd</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut_cdd" id="date_debut_cdd">
                        </div>
                        <div class="form-group">
                            <label for="date_debut_cdi">Date debut cdi</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut_cdi" id="date_debut_cdi">
                        </div>
                        <div class="form-group">
                            <label for="date_retraite">Date retraite</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_retraite" id="date_retraite">
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
    <div class="modal modal-danger" id="deletecdi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('CdiDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="cdi_id" value="" id="cdi_id">

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