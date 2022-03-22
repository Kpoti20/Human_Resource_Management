@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">PERSONNEL - ACTIF</h3>
            </div>

            <div class="box-body">
                {{--                <table class="table">--}}
                {{--                    <thead><tr><th>Num</th></tr></thead>@for ($i = 1; $i < $emc ; $i++)--}}
                {{--                    <tbody><tr><td>{{ $i }}</td></tr></tbody>@endfor--}}
                {{--                </table>--}}
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Num</th>
                        <th>Matle</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Contrat</th>
                        <th>Poste</th>
                        <th>Cat prof</th>
                        <th>Ancie</th>
                        <th>Lieu Aff</th>
                        <th>CNSS</th>
                        <th>P Charg</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($emplo as $em)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $em->matricule }}</td>
                            <td>{{ $em->nom_prenom }}</td>
                            <td>{{ $em->statut }}</td>
                            <td>{{ $em->libelle }}</td>
                            <td>{{ $em->nom_categories }}<span style="margin-left: 5px">{{ $em->echelon }}</span></td>
                            <td>{{ $em->anciennete }}</td>
                            <td>{{ $em->lieu_affectation }}</td>
                            <td>{{ $em->numero_cnss }}</td>
                            <td>{{ $em->personne_charge }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{url('print_personnel_actif')}}" id="tp"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection