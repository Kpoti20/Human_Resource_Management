@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">TITULAIRE-INTERIM</h3>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </button>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Titulaire</th>
                        <th>Interimaire</th>
                        <th>Poste</th>
                        <th>Opération</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($interim as $p)
                        <tr>
                            <td>{{ $p->personnel_membre_titulaire() }}</td>
                            <td>{{ $p->personnel_membre_interimaire() }}</td>
                            <td>{{ $p->poste() }}</td>
                            <td>
                                <button class="btn btn-warning btn-xs" data-id_int="{{ $p->id }}" data-toggle="modal" data-target="#deleteint">Supprimer</button>
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
                    <h4 class="modal-title" id="myModalLabel">Nouvel interim</h4>
                </div>
                <form action="{{ url('IntStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('interim.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{--<!-- MODIDFICATION -->--}}
    {{--<div class="modal fade" id="editoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">Modification </h4>--}}
                {{--</div>--}}
                {{--<form action="{{ url('OcUpdate', 'test')}}" method="post">--}}
                    {{--{{ method_field('patch') }}--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="modal-body">--}}
                        {{--<input type="hidden" name="occupation_id" value="" id="occupation_id">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="date_debut">Date debut</label>--}}
                            {{--<input type="date" required autocomplete="off" class="form-control" name="date_debut" id="date_debut">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="date_fin">Date fin</label>--}}
                            {{--<input type="date" required autocomplete="off" class="form-control" name="date_fin" id="date_fin">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>--}}
                        {{--<button type="submit" class="btn btn-primary">Modifier</button>--}}
                    {{--</div>--}}

                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- SUPPRESSION -->
    <div class="modal modal-danger" id="deleteint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('IntDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="interim_id" value="" id="interim_id">

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