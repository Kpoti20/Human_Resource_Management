@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">STAGIAIRE - ACTIF</h3>
            </div>

            <div class="box-body">

                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Num</th>
                        <th>Matle</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Fonction</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Duree</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($stag as $em)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $em->matricule }}</td>
                            <td>{{ $em->nom_prenom }}</td>
                            <td>{{ $em->libelle }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_debut_stage)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_fin_stage)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_debut_stage)->DiffInMonths($em->date_fin_stage) }}<span style='margin-left:1px;'>mois</span></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{url('print_stagiaire_actif')}}" id="tp"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection