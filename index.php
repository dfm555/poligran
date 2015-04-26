<?php
require 'config/configs.php';
session_start();
$section = !empty($_GET['section']) ? $_GET['section'] : 'index';
?>
<!doctype html>
<html lang="en">
<head>
	<title>Universidad Calasanz</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--	<link rel="shortcut icon" href="<?php echo BASE_INDEX?>images/icons/favicon.ico">-->
	<!--	<link rel="apple-touch-icon" href="images/icons/favicon.png">-->
	<!--	<link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">-->
	<!--	<link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">-->
	<!--Loading bootstrap css-->
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/jquery-ui-1.10.4.custom.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/animate.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/all.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/main.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/style-responsive.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/zabuto_calendar.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/pace.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/jquery.news-ticker.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_INDEX?>styles/bootstrap-dialog.css">
</head>
<body>
<?php
if(isset($_SESSION['login_user'])){
	require BASE_VIEWS.'index/login.php';
}else{
	require BASE_INDEX_INCLUDE.'include/header.php'
	?>
	<div id="wrapper">
		<?php
		require BASE_INDEX_INCLUDE.'include/left.php'
		?>
		<div id="page-wrapper">
			<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
				<div class="page-header pull-left">
					<div class="page-title">
						Dashboard</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
					<li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
					<li class="active">Dashboard</li>
				</ol>
				<div class="clearfix">
				</div>
			</div>
			<!--END TITLE & BREADCRUMB PAGE-->
			<div class="page-content">
				<div id="tab-general">

					<?php
					require BASE_CONTROLLERS.$section.'Controller.php';

					?>
				</div>
			</div>
		</div>
		<!--END CONTENT-->
		<?php
		require BASE_INDEX_INCLUDE.'include/footer.php'
		?>
	</div>
	<!--END PAGE WRAPPER-->
<?php
}
?>
<script src="<?php echo BASE_INDEX?>script/jquery-1.10.2.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery-ui.js"></script>
<script src="<?php echo BASE_INDEX?>script/bootstrap.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/bootstrap-hover-dropdown.js"></script>
<script src="<?php echo BASE_INDEX?>script/html5shiv.js"></script>
<script src="<?php echo BASE_INDEX?>script/respond.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery.metisMenu.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery.slimscroll.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery.cookie.js"></script>
<script src="<?php echo BASE_INDEX?>script/icheck.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/custom.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/jquery.menu.js"></script>
<script src="<?php echo BASE_INDEX?>script/pace.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/holder.js"></script>
<script src="<?php echo BASE_INDEX?>script/responsive-tabs.js"></script>
<script src="<?php echo BASE_INDEX?>script/zabuto_calendar.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/index.js"></script>
<script src="<?php echo BASE_INDEX?>script/bootstrap-dialog.min.js"></script>

<!--LOADING SindexIPTS FOR CHARTS-->
<script src="<?php echo BASE_INDEX?>script/highcharts.js"></script>
<script src="<?php echo BASE_INDEX?>script/data.js"></script>
<script src="<?php echo BASE_INDEX?>script/drilldown.js"></script>
<script src="<?php echo BASE_INDEX?>script/exporting.js"></script>
<script src="<?php echo BASE_INDEX?>script/parsley.min.js"></script>
<script src="<?php echo BASE_INDEX?>script/main.js"></script>
<script src="<?php echo BASE_INDEX?>script/app.js"></script>
</body>
</html>