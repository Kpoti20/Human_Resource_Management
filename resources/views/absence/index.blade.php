@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">ABSENCE</h3>
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
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Nb jour</th>
                        <th>Motif</th>
                        <th>Sanction</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($ab as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->date_debut }}</td>
                            <td>{{ $p->date_fin }}</td>
                            <td>{{ \Carbon\Carbon::parse($p->date_debut)->DiffInDays($p->date_fin) }}<span style='margin-left:5px;'>jour(s)</span>
                            <td>{{ $p->motif }}</td>
                            <td>{{ $p->sanction_absence }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_ab="{{ $p->id_ab }}"
                                        data-date_debut="{{ $p->date_debut }}"
                                        data-date_fin="{{ $p->date_fin }}"
                                        data-motif="{{ $p->motif }}"
                                        data-sanction_absence="{{ $p->sanction_absence }}"
                                        data-target="#editeab">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_ab="{{ $p->id_ab }}" data-toggle="modal" data-target="#deleteab">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouvelle absence</h4>
                </div>
                <form action="{{ url('AbsStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('absence.form')
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
    <div class="modal fade" id="editeab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('AbsUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="absence_id" value="" id="absence_id">
                        <div class="form-group">
                            <label for="date_debut">Date debut</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_debut" id="date_debut">
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date fin</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_fin" id="date_fin">
                        </div>
                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <input type="text" required autocomplete="off" class="form-control" name="motif" id="motif">
                        </div>
                        <div class="form-group">
                            <label for="sanction_absence">Sanction</label>
                            <select class="form-control" required name="sanction_absence" id="sanction_absence">
                                <option value="">Faites un choix</option>
                                <option value="Premier avertissement">
                                    Premier avertissement
                                </option>
                                <option value="Déduction des jours de conges">
                                    Déduction des jours de conges
                                </option>
                                <option value="Déduction des jours travailles">
                                    Déduction des jours travailles
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
    <div class="modal modal-danger" id="deleteab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('AbsDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="absence_id" value="" id="absence_id">
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