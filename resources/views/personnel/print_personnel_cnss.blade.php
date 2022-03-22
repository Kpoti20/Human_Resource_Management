<!DOCTYPE html>
<html>
<head>
    <title>PERSONNEL ACTIF</title>
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
    <br><h1 style='font-size:20px; text-align:center; font-weight: bold;'>PERSONNEL CNSS</h1>

    <table id="ta">

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

        @foreach($emplot as $em)
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
    </table><br>
    <a style='margin-left:5px' href="{{ url('personnel_cnss') }}" id='dopt'  class="btn btn-default">Retour</a>
    <a href="" id='dop' onclick="window.print()" class="btn btn-primary"><i class="fa fa-print">Imprimer</i></a>
</div>
</body>
</html>
