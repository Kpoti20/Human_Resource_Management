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
            <a href="{{url('plus2')}}" style="margin-left: 10px; font-size: 12px;" class="btn btn-primary">Voir plus</a>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Naissance</th>
                        <th>Lieu naissance</th>
                        <th>Filiation</th>
                        <th>Date Entree Etab</th>
                        <th>Date Sorti Etab</th>
                        <th>Sit Mat</th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($personnels as $e)
                        <tr>
                            <td>{{ $e->matricule }}</td>
                            <td>{{ $e->nom_prenom }}</td>
                            <td>{{ $e->date_naissance }}</td>
                            <td>{{ $e->lieu_naissance }}</td>
                            <td>{{ $e->filiation }}</td>
                            <td>{{ $e->date_entree_etablissement }}</td>
                            <td>{{ $e->date_sortie_etablissement }}</td>
                            <td>{{ $e->situation_matrimoniale }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
