@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">REGISTRE EMBAUCHE</h3>
            </div>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Adresse</th>
                        <th>Personne à prevenir</th>
                        <th>Date et lieu de naissance</th>
                        <th>Sexe</th>
                        <th>Age</th>
                        <th>Filiation</th>
                        <th>Situation de famille</th>
                        <th>Enfant charge</th>
                        <th>Date entree etablis</th>
                        {{--<th>Date sortie etablis</th>--}}
                        <th>Contrat</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($employe as $em)
                        <tr>

                                <td>{{ $em->matricule }}</td>
                                <td>{{ $em->nom_prenom }}</td>
                                <td>{{ $em->adresse }}</td>
                                <td>{{ $em->nom_prenoms }}<p>{{ $em->telephone }}</p></td>
                                <td>{{ $em->date_naissance }} à {{ $em->lieu_naissance }}</td>
                                <td>{{ $em->sexe }}</td>
                                <td>{{ \Carbon\Carbon::now()->diffInYears($em->date_naissance)}} <span style='margin-left:1px;'>ans</span></td>
                                <td>{{ $em->filiation }}</td>
                                <td>{{ $em->situation_matrimoniale }}</td>
                                <td>{{ $em->personne_charge }}</td>
                                <td>{{ $em->date_entree_etablissement }}</td>
                                {{--<td>{{ $em->date_retraite }}</td>--}}
                                <td>{{ $em->statut }}</td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="{{url('print_registre')}}" id="cdd"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>
    {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">--}}
    {{--        Imprimer--}}
    {{--    </button>--}}


@endsection