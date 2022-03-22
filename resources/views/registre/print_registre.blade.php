<!DOCTYPE html>
<html>
<head>
    <title>REGISTRE EMBAUCHE</title>
    <link rel="shortcut icon" type="image/png" href="dist/img/g1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
    <style type="text/css">
        table{
            border: 1px  solid;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            text-align: left;
        }
        tr th{
            background: #eee;
            border: 1px solid;
            text-align: center;
        }
        tr td{
            border: 1px solid;
            text-align: center;
        }
        th, td {
            padding: 2px;
        }
        caption{
            text-align: center;
        }
        @media print {
            #dop, #dopt{
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class='row'>
        <div  class="col-sm-1"  >
            <span><img src="dist/img/g1.png" style="width: 100px; height: 100px"></span>
        </div>
        <div  class="col-sm-2" >
            <h2 style='font-size:25px; font-weight: bold;'>BACO-RH</h2>
        </div>
        <div class="col-sm-6"></div>
        <!-- <div class="col-3">col-3</div> -->
        <div  class="col-sm-3" >
            <p>PERIODICITE <span>: 1 MOIS</span></p>
            <p>MAJ <span>: {{\Carbon\Carbon::now()}}</span></p>
        </div>

    </div>
    <br><h1 style='font-size:20px; text-align:center; font-weight: bold;'>REGISTRE EMBAUCHE</h1>

    <table id="ta">

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

        @foreach($pers as $em)
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
                    {{--<td>{{ $em->date_sortie_etablissement  }}</td>--}}
                    <td>{{ $em->statut }}</td>



            </tr>

        @endforeach
        </tbody>
    </table><br>
    <a style='margin-left:5px' href="{{ url('registre') }}" id='dopt'  class="btn btn-default">Retour</a>
    <a href="" id='dop' onclick="window.print()" class="btn btn-primary"><i class="fa fa-print">Imprimer</i></a>
</div>
</body>
</html>
