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


            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Univers</th>
                        <th>Niveau Etud</th>
                        <th>Diplome</th>
                        <th>Annee Diplome</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($personnels as $e)
                        <tr>
                            <td>{{ $e->matricule }}</td>
                            <td>{{ $e->nom_prenom }}</td>
                            <td>{{ $e->universite }}</td>
                            <td>{{ $e->niveau_etude }}</td>
                            <td>{{ $e->diplome }}</td>
                            <td>{{ $e->annee_diplome }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
