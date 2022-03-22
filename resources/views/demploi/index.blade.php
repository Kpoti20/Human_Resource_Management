@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">DEMANDE-EMPLOI</h3>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </button>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>

                        <th>Nom et prenom(s)</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Diplome</th>
                        <th>Poste</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($demp as $p)
                        <tr>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>{{ $p->contact }}</td>
                            <td>{{ $p->adresse }}</td>
                            <td>{{ $p->diplome }}</td>
                            <td>{{ $p->poste }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_emplo="{{ $p->id_emplo }}"
                                        data-nom_prenom="{{ $p->nom_prenom }}"
                                        data-contact="{{ $p->contact }}"
                                        data-adresse="{{ $p->adresse }}"
                                        data-diplome="{{ $p->diplome }}"
                                        data-poste="{{ $p->poste }}"
                                        data-target="#editemp">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_emplo="{{ $p->id_emplo }}" data-toggle="modal" data-target="#deletemp">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouvelle demande de stage</h4>
                </div>
                <form action="{{ url('DemStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('demploi.form')
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
    <div class="modal fade" id="editemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('DemUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="demploi_id" value="" id="demploi_id">
                        @include('demploi.form')
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
    <div class="modal modal-danger" id="deletemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('DemDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="demploi_id" value="" id="demploi_id">
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