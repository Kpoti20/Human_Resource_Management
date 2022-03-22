@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">ELEMENT-RENUMERATION</h3>
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
                        <th>El admin</th>
                        <th>Nbre de demande</th>
                        <th>El comptable</th>
                        <th>Cout</th>
                        <th>Observation</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($ren as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->libelle }}</td>
                            <td>{{ $p->element_administratif }}</td>
                            <td>{{ $p->nombre_demande }}</td>
                            <td>{{ $p->element_comptable }}</td>
                            <td>{{ $p->cout }}</td>
                            <td>{{ $p->observation }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_ren="{{ $p->id_ren }}"
                                        data-element_administratif="{{ $p->element_administratif }}"
                                        data-nombre_demande="{{ $p->nombre_demande }}"
                                        data-element_comptable="{{ $p->element_comptable }}"
                                        data-cout="{{ $p->cout }}"
                                        data-observation="{{ $p->observation }}"
                                        data-target="#editren">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_ren="{{ $p->id_ren }}" data-toggle="modal" data-target="#deleteren">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouvelle renumeration</h4>
                </div>
                <form action="{{ url('RenStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('renumeration.form')
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
    <div class="modal fade" id="editren" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('RenUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="renumeration_id" value="" id="renumeration_id">
                        <div class="form-group">
                            <label for="element_administratif">Element admninistratif</label>
                            <input type="text" required autocomplete="off" class="form-control" name="element_administratif" id="element_administratif">
                        </div>
                        <div class="form-group">
                            <label for="nombre_demande">Nombre de demande</label>
                            <input type="float" required autocomplete="off" class="form-control" name="nombre_demande" id="nombre_demande">
                        </div>
                        <div class="form-group">
                            <label for="element_comptable">Element comptable</label>
                            <input type="float" required autocomplete="off" class="form-control" name="element_comptable" id="element_comptable">
                        </div>
                        <div class="form-group">
                            <label for="cout">Cout</label>
                            <input type="float" required autocomplete="off" class="form-control" name="cout" id="cout">
                        </div>
                        <div class="form-group">
                            <label for="observation">Observation</label>
                            <input type="text" required autocomplete="off" class="form-control" name="observation" id="observation">
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
    <div class="modal modal-danger" id="deleteren" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('RenDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="renumeration_id" value="" id="renumeration_id">

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