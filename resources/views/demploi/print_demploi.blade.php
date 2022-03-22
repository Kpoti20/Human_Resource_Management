<!DOCTYPE html>
<html>
<head>
    <title id='dop1'>DEMANDE D'EMPLOI</title>
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
            {{--<p>PERIODICITE <span>: 1 MOIS</span></p>--}}
            {{--<p>MAJ <span>: {{\Carbon\Carbon::now()}}</span></p>--}}
        </div>

    </div>
    <h1 style='font-size:20px; text-align:center; font-weight: bold;'>DEMANDE D'EMPLOI</h1>
    <table id="ta">
        <thead>
        <tr>
            <th>Num Ordre</th>
            <th>Nom et Prénom(s)</th>
            <th>Contact</th>
            <th>Adresse</th>
            <th>Diplome</th>
            <th>Poste</th>
        </tr>
        </thead>

        <tbody>

        @foreach($demp as $em)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $em->nom_prenom }}</td>
                <td>{{ $em->contact }}</td>
                <td>{{ $em->adresse }}</td>
                <td>{{ $em->diplome }}</td>
                <td>{{ $em->poste }}</td>
            </tr>
        @endforeach
        </tbody>
    </table><br>
    <a style='margin-left:5px' href="{{ url('demande_emploi') }}" id='dopt'  class="btn btn-default">Retour</a>
    <a href="" id='dop' onclick="window.print()" class="btn btn-primary"><i class="fa fa-print">Imprimer</i></a>

</div>
</body>
</html>