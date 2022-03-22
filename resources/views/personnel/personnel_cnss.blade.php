@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">PERSONNEL - CNSS</h3>
            </div>

            <div class="box-body">
                {{--                <table class="table">--}}
                {{--                    <thead><tr><th>Num</th></tr></thead>@for ($i = 1; $i < $emc ; $i++)--}}
                {{--                    <tbody><tr><td>{{ $i }}</td></tr></tbody>@endfor--}}
                {{--                </table>--}}
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Num ordre</th>
                        <th>Matricule</th>
                        <th>Nom et Prénom(s)</th>
                        <th>Date de naissance</th>
                        <th>Date d'entree etablissement</th>
                        <th>Fonction</th>
                        <th>Num CNSS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($emplo as $em)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $em->matricule }}</td>
                            <td>{{ $em->nom_prenom }}</td>
                            <td>{{ $em->date_naissance }}</td>
                            <td>{{ \Carbon\Carbon::parse($em->date_entree_etablissement)->format('d/m/Y') }}</td>
                            <td>{{ $em->libelle }}</td>
                            <td>{{ $em->numero_cnss }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{url('print_personnel_cnss')}}" id="tp"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection