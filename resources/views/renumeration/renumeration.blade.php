@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">ELEMENT-RENUMERATION</h3>
            </div>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Num ordre</th>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Poste</th>
                        <th>El admnin</th>
                        <th>Nbre de demande</th>
                        <th>El comptable</th>
                        <th>Coût</th>
                        <th>Observations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($re as $d)
                        <tr>
                            <td style="text-align: center">{{ $i++ }}</td>
                            <td>{{ $d->matricule }}</td>
                            <td>{{ $d->nom_prenom }}</td>
                            <td>{{ $d->libelle }}</td>
                            <td>{{ $d->element_administratif }}</td>
                            <td>{{ $d->nombre_demande }}</td>
                            <td>{{ $d->element_comptable }}</td>
                            <td>{{ $d->cout }}</td>
                            <td>{{ $d->observation }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="{{url('print_renumeration')}}" id="cde"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection
