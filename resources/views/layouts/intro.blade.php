<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BACO-GRH</title>
    <link rel="shortcut icon" type="image/png" href="dist/img/g1.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo"><span class="logo-lg"><b>B</b>-RH</span></a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            {{--Presentation de l'utilisateur connecte--}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                </ul>
            </li>
            {{-- Fin --}}
        </ul>
      </div>

    </nav>
  </header>
  <!-- Barre de navigation coté gauche -->
  <aside class="main-sidebar">

    <section class="sidebar">

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- PRINCIPAL MENU DE NAVIGATION -->
        <ul class="sidebar-menu" style="font-size: small; font-family: 'Bitstream Vera Sans Mono'">
            <li><a href="{{ url('poste') }}"> <span>POSTE DE TRAVAIL</span></a></li>
            <li><a href="{{ url('categorie') }}"> <span>CATEGORIE PROFESSIONNELLE</span></a></li>
            <li class="treeview">
                <a href="">
                    <span>PERSONNEL</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('membre')}}"><i class="fa fa-circle-o"></i>MEMBRE</a></li>
                    <li><a href="{{url('ppersonne')}}"><i class="fa fa-circle-o"></i>PERSONNE A PREVENIR</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>CONTRAT</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('stage')}}"><i class="fa fa-circle-o"></i>STAGE</a></li>
                    <li><a href="{{url('cde')}}"><i class="fa fa-circle-o"></i>CDE</a></li>
                    <li><a href="{{url('cdd')}}"><i class="fa fa-circle-o"></i>CDD</a></li>
                    <li><a href="{{url('cdi')}}"><i class="fa fa-circle-o"></i>CDI</a></li>
                </ul>
            </li>
            <li><a href="{{ url('occupation') }}"> <span>OCCUPATION</span></a></li>
            <li class="treeview">
                <a href="">
                    <span>CONGE</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('planification')}}"><i class="fa fa-circle-o"></i>PLANIFICATION</a></li>
                    <li><a href="{{url('depart_conge')}}"><i class="fa fa-circle-o"></i>DEPART</a></li>
                    <li><a href="{{url('cumul')}}"><i class="fa fa-circle-o"></i>CUMUL</a></li>
                    <li><a href="{{url('interim')}}"><i class="fa fa-circle-o"></i>INTERIM</a></li>
                </ul>
            </li>
            <li><a href="{{ url('permission') }}"> <span>PERMISSION</span></a></li>
            <li><a href="{{ url('absence') }}"> <span>ABSENCE</span></a></li>
            <li><a href="{{ url('retard') }}"> <span>RETARD</span></a></li>
            <li><a href="{{ url('renumeration') }}"> <span>RENUMERATION</span></a></li>
            <li class="treeview">
                <a href="">
                    <span>AUTRES</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('extra') }}"><i class="fa fa-circle-o"></i>EXTRA</a></li>
                    <li><a href="{{url('dstage')}}"><i class="fa fa-circle-o"></i>STAGE</a></li>
                    <li><a href="{{url('demploi')}}"><i class="fa fa-circle-o"></i>EMPLOI</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>TABLEAU DE BORD</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('personnel_actif')}}"><i class="fa fa-circle-o"></i>PERSONNEL ACTIF</a></li>
                    <li><a href="{{url('stagiaire_actif')}}"><i class="fa fa-circle-o"></i>STAGIAIRE</a></li>
                    <li><a href="{{url('cde_actif')}}"><i class="fa fa-circle-o"></i>CONTRAT CDE</a></li>
                    <li><a href="{{url('cdd_actif')}}"><i class="fa fa-circle-o"></i>CONTRAT CDD</a></li>
                    <li><a href="{{url('cdi_actif')}}"><i class="fa fa-circle-o"></i>CONTRAT CDI</a></li>
                    <li><a href="{{url('renumeration_mois')}}"><i class="fa fa-circle-o"></i>RENUMERATION</a></li>
                    <li><a href="{{url('registre')}}"><i class="fa fa-circle-o"></i>REGISTRE EMBAUCHE</a></li>
                    <li><a href="{{url('personnel_cnss')}}"><i class="fa fa-circle-o"></i>PERSONNEL CNSS</a></li>
                    <li><a href="{{url('demande_emploi')}}"><i class="fa fa-circle-o"></i>DEMANDE EMPLOI</a></li>
                    <li><a href="{{url('demande_stage')}}"><i class="fa fa-circle-o"></i>DEMANDE STAGE</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Affichage du contenu des menus de navigation -->
  <div class="content-wrapper">
      <section class="content container-fluid">
          {{--// Permet d'afficher un message de success sur l'interface parent--}}
          @if(Session::has('success'))
              <div class='alert alert-success alert-dismissible'><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ Session::get('success') }}</div>
          @endif
          {{--// Permet d'afficher un message d'erreur sur l'interface parent--}}
          @if(Session::has('error'))
              <div class='alert alert-danger alert-dismissible'><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('error') }}</div>
          @endif
          {{--// Chargement du contenu en fonction du choix de l'utilisateur--}}
          @yield('content')

      </section>
  </div>
  <!-- PIED DE PAGE -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b><a href="">B-dev V 1.1</a></b>
      </div>
      <strong> <a href="">BAYA CONTROL</a></strong>
  </footer>
    <!-- FIN PIED DE PAGE -->
</div>
<!-- LIEN EXTERNE CONCERNANT LES SCRIPTS -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
{{--Script pour la gestion des postes de travail--}}
<script src="dist/js/pot.js"></script>
{{--Script pour la gestion des categories professionnelles--}}
<script src="dist/js/catpro.js"></script>
{{--Script pour la gestion du personnel--}}
<script src="dist/js/perso.js"></script>
{{--Script pour la gestion des personnes a prevenir--}}
<script src="dist/js/ppers.js"></script>
{{--Script pour la gestion des stagiaires--}}
<script src="dist/js/sta.js"></script>
{{--Script pour la gestion des contrats cde --}}
<script src="dist/js/cde.js"></script>
{{--Script pour la gestion des contrats cdd --}}
<script src="dist/js/cdd.js"></script>
{{--Script pour la gestion des contrats cdi --}}
<script src="dist/js/cdi.js"></script>
{{--Script pour la gestion des occupations des employes --}}
<script src="dist/js/occupation.js"></script>
{{--Script pour la gestion des permissions des employes --}}
<script src="dist/js/permission.js"></script>
{{--Script pour la gestion des absences des employes --}}
<script src="dist/js/absence.js"></script>
{{--Script pour la gestion des retards des employes --}}
<script src="dist/js/retard.js"></script>
{{--Script pour la gestion des renumeration des employes --}}
<script src="dist/js/renum.js"></script>
{{--Script pour la gestion des extras des employes --}}
<script src="dist/js/extra.js"></script>
{{--Script pour la gestion des demandes de stage --}}
<script src="dist/js/dstage.js"></script>
{{--Script pour la gestion des demandes d'emploi --}}
<script src="dist/js/demploi.js"></script>
{{--Script pour la gestion des titulaires et interims --}}
<script src="dist/js/interimaire.js"></script>
{{--Script pour la gestion des planifications de conge --}}
<script src="dist/js/planification.js"></script>
{{--Script pour la gestion des cumuls de conge --}}
<script src="dist/js/cumul.js"></script>
{{--Script pour le depart au conge --}}
<script src="dist/js/depconge.js"></script>
<!-- FIN LIEN EXTERNE -->
</body>
</html>
