@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">CONTRAT DUREE INDETERMINEE</h3>
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
                        <th>Date embauche</th>
                        <th>Date debut CDD</th>
                        <th>Date debut CDI</th>
                        <th>Date retraite</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cdi as $em)
                        <tr>
                            @if($em->matricule == 'BAC001')

                            <td>{{ $i++ }}</td>
                            <td>{{ $em->matricule }}</td>
                            <td>{{ $em->nom_prenom }}</td>
                            <td style="text-align: center">-</td>
                            <td>{{ $em->libelle }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_embauche)->format('d/m/Y') }}</td>
                            <td style="text-align: center">-</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_debut_cdi)->format('d/m/Y') }}</td>
                            <td style="text-align: center">-</td>
                                @else
                                <td>{{ $t++ }}</td>
                                <td>{{ $em->matricule }}</td>
                                <td>{{ $em->nom_prenom }}</td>
                                <td>{{ \Carbon\Carbon::parse($em->date_naissance)->format('d/m/Y') }}</td>
                                <td>{{ $em->libelle }}</td>
                                <td>{{ \Carbon\Carbon::parse($em->date_embauche)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($em->date_debut_cdd)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($em->date_debut_cdi)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($em->date_retraite)->format('d/m/Y') }}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="{{url('print_cdi_actif')}}" id="cde"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection
