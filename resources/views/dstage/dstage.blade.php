@extends('layouts.intro')

@section('content')
    <div class="" id="toble">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px;">DEMANDE DE STAGE</h3>
            </div>

            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        
                        <th>Nom et Prénom(s)</th>
                        <th>Contact</th>
                        <th>Adresse</th>
                        <th>Diplome</th>
                        <th>Poste</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($dst as $em)
                        <tr>
                            
                            <td>{{ $em->nom_prenom }}</td>
                            <td>{{ $em->contact }}</td>
                            <td>{{ $em->adresse }}</td>
                            <td>{{ $em->diplome }}</td>
                            <td>{{ $em->poste }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <a href="{{url('print_demande_stage')}}"  class="btn btn-primary"><i class="fa fa-print">Aperçu avant impression</i></a>

@endsection
