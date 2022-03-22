<!DOCTYPE html>
<html>
<head>
    <title>PERSONNEL ACTIF</title>
    <link rel="shortcut icon" type="image/png" href="dist/img/g1.png">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/jquery.printPage.js"></script>
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
            padding: 5px;
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
    <br><h1 style='font-size:20px; text-align:center; font-weight: bold;'>PERSONNEL ACTIF</h1>

    <table id="ta">

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

        @foreach($emplot as $em)
            <tr>
                @if($em->matricule == 'BAC001')
                    <td>{{ $i }}</td>
                    <td>{{ $em->matricule }}</td>
                    <td>{{ $em->nom_prenom }}</td>
                    <td>{{ $em->statut }}</td>
                    <td>{{ $em->libelle }}</td>
                    {{--<td>{{ $em->datembauche }}</td>--}}
                    {{--<td style="text-align: center">-</td>--}}
                    {{--<td>{{ $em->catprof }}{{$em->ec }}</td>--}}
                    <td>-</td>
                    <td>{{ $em->anciennete }}</td>
                    <td>{{ $em->lieu_affectation }}</td>
                    <td>{{ $em->numero_cnss }}</td>
                    <td>{{ $em->personne_charge }}</td>
                @else
                    <td>{{ $t++ }}</td>
                    <td>{{ $em->matricule }}</td>
                    <td>{{ $em->nom_prenom }}</td>
                    <td>{{ $em->statut }}</td>
                    <td>{{ $em->libelle }}</td>
                    <td>{{ $em->nom_categories }}<span style="margin-left: 5px">{{ $em->echelon }}</span></td>
                    <td>{{ $em->anciennete }}</td>
                    <td>{{ $em->lieu_affectation }}</td>
                    <td>{{ $em->numero_cnss }}</td>
                    <td>{{ $em->personne_charge }}</td>
                @endif
            </tr>

        @endforeach
        </tbody>
    </table><br>
    <a style='margin-left:5px' href="{{ url('personnel_actif') }}" id='dopt'  class="btn btn-default">Retour</a>
    <a href="" id='dop' onclick="window.print()" class="btn btn-primary"><i class="fa fa-print">Imprimer</i></a>
</div>
</body>
</html>
