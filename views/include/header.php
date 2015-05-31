<html>
<head>
	<title>Universidad Calasanz</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--	<link rel="shortcut icon" href="<?php echo BASE_RESOURCES?>images/icons/favicon.ico">-->
	<!--	<link rel="apple-touch-icon" href="images/icons/favicon.png">-->
	<!--	<link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">-->
	<!--	<link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">-->
	<!--Loading bootstrap css-->
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/jquery-ui-1.10.4.custom.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/animate.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/all.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/main.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/style-responsive.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/zabuto_calendar.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/pace.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/jquery.news-ticker.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_RESOURCES?>styles/bootstrap-dialog.css">
</head>
  <body>
    <?php $section = $_REQUEST['controller']; if(isset($_SESSION['userdata'])):?>
    <div>
	    <!--BEGIN BACK TO TOP-->
	    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
	    <!--END BACK TO TOP-->
	    <!--BEGIN TOPBAR-->
	    <div id="header-topbar-option-demo" class="page-header-topbar">
		    <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
			    <div class="navbar-header">
				    <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				    <a id="logo" href="<?php echo HOST ?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text" style="font-size: 19px">Universidad Calasanz</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
			    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

				    <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
					    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Buscar aquí" class="form-control text-white"/></div>
				    </form>
				    <ul class="nav navbar navbar-top-links navbar-right mbn">
					    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">0</span></a>

					    </li>
					    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">0</span></a>

					    </li>
					    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">0</span></a>

					    </li>
					    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?php echo BASE_RESOURCES?>images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs hidden-md"><?php echo $_SESSION['userdata']['name']?></span>&nbsp;<span class="caret"></span></a>
						    <ul class="dropdown-menu dropdown-user pull-right">
							    <li><a href="#"><i class="fa fa-user"></i>Mis datos</a></li>
							    <li><a href="/index/logout"><i class="fa fa-key"></i>Cerrar sesión</a></li>
						    </ul>
					    </li>
				    </ul>
			    </div>
		    </nav>
	    </div>
	    <!--END TOPBAR-->

	    <div id="wrapper">
		    <!--BEGIN SIDEBAR MENU-->
		    <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
		         data-position="right" class="navbar-default navbar-static-side">
			    <div class="sidebar-collapse menu-scroll">
				    <ul id="side-menu" class="nav">

					    <div class="clearfix"></div>
					    <li class="<?php echo ($section == 'index')?'active':''; ?>"><a href="<?php HOST ?>/index/index"><i class="fa fa-tachometer fa-fw">
								    <div class="icon-bg bg-orange"></div>
							    </i><span class="menu-title">Dashboard</span></a>
					    </li>
					    <?php
					    if($_SESSION['userdata'][0]['type'] == 'ADMIN' || $_SESSION['userdata'][0]['type'] == 'SUPER ADMIN'): ?>
						    <li class="<?php echo ($section == 'admin')?'active':''; ?>"><a href="<?php HOST ?>/admin"><i class="fa fa-user-plus fa-fw">
									    <div class="icon-bg bg-pink"></div>
								    </i><span class="menu-title">Administradores</span></a>

						    </li>
					    <?php endif?>
					    <li class="<?php echo ($section == 'teacher')?'active':''; ?>"><a href="<?php HOST ?>/teacher"><i class="fa fa-group fa-fw">
								    <div class="icon-bg bg-pink"></div>
							    </i><span class="menu-title">Profesores</span></a>

					    </li>
					    <li class="<?php echo ($section == 'student')?'active':''; ?>"><a href="<?php HOST ?>/student"><i class="fa fa-graduation-cap fa-fw">
								    <div class="icon-bg bg-green"></div>
							    </i><span class="menu-title">Estudiantes</span></a>

					    </li>
					    <li class="<?php echo ($section == 'career')?'active':''; ?>"><a href="<?php HOST ?>/career"><i class="fa fa-university fa-fw">
								    <div class="icon-bg bg-violet"></div>
							    </i><span class="menu-title">Carreras</span></a>

					    </li>
					    <li class="<?php echo ($section == 'subject')?'active':''; ?>"><a href="<?php HOST ?>/subject"><i class="fa fa-book fa-fw">
								    <div class="icon-bg bg-blue"></div>
							    </i><span class="menu-title">Materias</span></a>

					    </li>
				    </ul>
			    </div>
		    </nav>
		    <!--END SIDEBAR MENU-->
		    <div id="page-wrapper">
			    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
				    <div class="page-header pull-left">
					    <div class="page-title">
						    <?php
						    $section = (isset($request['controller']) && $request['controller'] !='') ? $request['controller'] : 'index' ;
						    switch($section){
							    case 'index':
								    $title = 'Dashboard';
								    break;
							    case 'admin':
								    $title = 'Administradores';
								    break;
							    case 'teacher':
								    $title = 'Profesores';
								    break;
							    case 'student':
								    $title = 'Estudiantes';
								    break;
							    case 'career':
								    $title = 'Carreras';
								    break;
							    case 'subject':
								    $title = 'Materias';
								    break;
						    }
						    echo $title;
						    ?>
					    </div>
				    </div>
				    <ol class="breadcrumb page-breadcrumb pull-right">
					    <li><i class="fa fa-home"></i>&nbsp;<a href="<?php HOST ?>/index/index">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
					    <li class="hidden"><a href="#"><?php echo $title ?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
					    <li class="active"><?php echo $title ?></li>
				    </ol>
				    <div class="clearfix">
				    </div>
			    </div>
			    <!--END TITLE & BREADCRUMB PAGE-->
			    <div class="page-content">
				    <div id="tab-general">

    <?php endif;?>
