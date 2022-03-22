@extends('layouts.intro')

@section('content')
    <div class="" style="font-family: Bitstream Vera Sans Mono">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="margin-left: 450px; font-family: Bitstream Vera Sans Mono">PERSONNE A PREVENIR</h3>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 12px;" data-toggle="modal" data-target="#myModal">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </button>
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom et prenom(s)</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Lien</th>
                        <th>Agent</th>
                        <th>Opérations</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($prevenirs as $p)
                        <tr>
                            <td>{{ $p->matricule }}</td>
                            <td>{{ $p->nom_prenoms }}</td>
                            <td>{{ $p->adresse_personne_prevenir }}</td>
                            <td>{{ $p->telephone }}</td>
                            <td>{{ $p->lien }}</td>
                            <td>{{ $p->nom_prenom }}</td>
                            <td>
                                <button class="btn btn-info btn-xs" data-toggle="modal"
                                        data-id_pprevenirs="{{ $p->idp }}"
                                        data-nom_prenoms="{{ $p->nom_prenoms }}"
                                        data-pprevenirs_adresse="{{ $p->adresse_personne_prevenir }}"
                                        data-telephone="{{ $p->telephone }}"
                                        data-lien="{{ $p->lien }}"
                                        data-target="#editpprevenir">Modifier</button> /
                                <button class="btn btn-warning btn-xs" data-id_pprevenirs="{{ $p->idp }}" data-toggle="modal" data-target="#deletepprevenir">Supprimer</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- AJOUT  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nouvelle personne à prevenir</h4>
                </div>
                <form action="{{ url('ppersonneStore')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('pprevenir.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- MODIDFICATION -->
    <div class="modal fade" id="editpprevenir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification </h4>
                </div>
                <form action="{{ url('ppersonneUpdate', 'test')}}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="pprevenir_id" value="" id="pprevenir_id">
                        <div class="form-group">
                            <label for="nom_prenoms">Nom et prenom(s)</label>
                            <input type="text" required autocomplete="off" class="form-control" name="nom_prenoms" id="nom_prenoms">
                        </div>
                        <div class="form-group">
                            <label for="adresse_personne_prevenir">Adresse</label>
                            <input type="text" required autocomplete="off" class="form-control" name="adresse_personne_prevenir" id="adresse_personne_prevenir">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" required autocomplete="off" class="form-control" name="telephone" id="telephone">
                        </div>
                        <div class="form-group">
                            <label for="lien">Lien</label>
                            <input type="text" required autocomplete="off" class="form-control" name="lien" id="lien">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- SUPPRESSION -->
    <div class="modal modal-danger" id="deletepprevenir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
                </div>
                <form action="{{ url('ppersonneDestroy', 'test')}}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                            Voulez-vous réellement continuer la suppression ?
                        </p>
                        <input type="hidden" name="pprevenir_id" value="" id="pprevenir_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Non, Annuler</button>
                        <button type="submit" class="btn btn-warning">Oui, Supprimer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection