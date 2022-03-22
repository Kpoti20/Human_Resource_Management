@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">PERSONNEL MEMBRE</h3>
            </div>
            {{--<button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">--}}
            {{--<span class="glyphicon glyphicon-plus"></span> Ajouter--}}
            {{--</button>--}}
            <a href="{{url('membre')}}" style="margin-left: 10px; font-size: 12px;" class="btn btn-primary">Retour</a>
            <a href="{{url('plus3')}}" style="margin-left: 10px; font-size: 12px;" class="btn btn-primary">Voir plus</a>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Sexe</th>
                        <th>Nation</th>
                        <th>Tel 1</th>
                        <th>Tel 2</th>
                        <th>Mail</th>
                        <th>Adresse</th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($personnels as $e)
                        <tr>
                            <td>{{ $e->matricule }}</td>
                            <td>{{ $e->nom_prenom }}</td>
                            <td>{{ $e->sexe }}</td>
                            <td>{{ $e->nationnalite }}</td>
                            <td>{{ $e->telephonne_1 }}</td>
                            <td>{{ $e->telephone_2 }}</td>
                            <td>{{ $e->mail }}</td>
                            <td>{{ $e->adresse }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
