@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">CONTRAT DUREE DETERMINEE</h3>
            </div>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Num Ordre</th>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Date Naiss</th>
                        <th>Fonction</th>
                        <th>Date d'embauche</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                        <th>Date d'écheance</th>
                        <th>Duree</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cdd as $em)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $em->matricule }}</td>
                            <td>{{ $em->nom_prenom }}</td>
                            <td>{{ $em->date_naissance }}</td>
                            <td>{{ $em->libelle }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_embauche)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_debut_cdd)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_fin_cdd)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_echeance_cdd)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_debut_cdd)->DiffInMonths($em->date_fin_cdd) }}<span style='margin-left:1px;'>mois</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="{{url('print_cdd_actif')}}" id="cde"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection
