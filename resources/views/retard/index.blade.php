@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">RETARD</h3>
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
                        <th>Date</th>
                        <th>Heure arrivee</th>
                        <th>Motif</th>
                        <th>Sanction</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($ret as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->date_retard }}</td>
                            <td>{{ $p->heure_arrive }}</td>
                            <td>{{ $p->motif }}</td>
                            <td>{{ $p->sanction_retard }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_ret="{{ $p->id_ret }}"
                                        data-date_retard="{{ $p->date_retard }}"
                                        data-heure_arrive="{{ $p->heure_arrive }}"
                                        data-motif="{{ $p->motif }}"
                                        data-sanction_retard="{{ $p->sanction_retard }}"
                                        data-target="#editeret">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_ret="{{ $p->id_ret }}" data-toggle="modal" data-target="#deleteret">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouveau retard</h4>
                </div>
                <form action="{{ url('RetStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('retard.form')
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
    <div class="modal fade" id="editeret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('RetUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="retard_id" value="" id="retard_id">
                        <div class="form-group">
                            <label for="date_retard">Date retard</label>
                            <input type="date" required autocomplete="off" class="form-control" name="date_retard" id="date_retard">
                        </div>
                        <div class="form-group">
                            <label for="heure_arrive">Heure arrive</label>
                            <input type="time" required autocomplete="off" class="form-control" name="heure_arrive" id="heure_arrive">
                        </div>
                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <input type="text" required autocomplete="off" class="form-control" name="motif" id="motif">
                        </div>
                        <div class="form-group">
                            <label for="sanction_retard">Sanction retard</label>
                            <select class="form-control" required name="sanction_retard" id="sanction_retard">
                                <option value="">Faites un choix</option>
                                <option value="Premier avertissement">
                                    Premier avertissement
                                </option>
                                <option value="Mise à pied">
                                    Mise à pied
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
    <div class="modal modal-danger" id="deleteret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('RetDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="retard_id" value="" id="retard_id">
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