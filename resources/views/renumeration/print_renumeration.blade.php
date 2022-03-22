<!DOCTYPE html>
<html>
<head>
    <title id='dop1'>ELEMENT-RENUMERATION</title>
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
        }
        tr td{
            border: 1px solid;

        }
        th, td {
            padding: 5px;
        }
        caption{
            text-align: center;
        }
        @media print {
            #dop, #dop1, #dopt{
                display: none;
            }
        }
    </style>
</head>
<body >
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
    <h1 style='font-size:20px; text-align:center; font-weight: bold;'>ELEMENT-RENUMERATION</h1>
    <table id="ta">
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
    </table><br>
    <a style='margin-left:5px' href="{{ url('renumeration_mois') }}" id='dopt'  class="btn btn-default">Retour</a>
    <a href="" id='dop' onclick="window.print()" class="btn btn-primary"><i class="fa fa-print">Imprimer</i></a>

</div>
</body>
</html>