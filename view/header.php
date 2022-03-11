<?php 
ob_start();
session_start();
include('models/konekcija.php');

?>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
    <?php $upit=$konekcija->query("SELECT * from artikl")->fetchall();
		
		if(!isset($_SESSION['korisnik'])){
            $upit=$konekcija->query("SELECT m.putanja,m.naziv FROM (meni AS m INNER JOIN meniuloga as mn ON m.idmeni=mn.idmeni)INNER JOIN uloga AS u ON mn.iduloga=u.id WHERE u.id=1")->fetchall();
			
		}else{
			if($_SESSION['korisnik']['nazivuloge']=="korisnik"){
				$upit=$konekcija->query("SELECT m.putanja,m.naziv FROM (meni AS m INNER JOIN meniuloga as mn ON m.idmeni=mn.idmeni)INNER JOIN uloga AS u ON mn.iduloga=u.id WHERE u.id=2")->fetchall();
			}
            else
            {
				$upit=$konekcija->query("SELECT m.putanja,m.naziv FROM (meni AS m INNER JOIN meniuloga as mn ON m.idmeni=mn.idmeni)INNER JOIN uloga AS u ON mn.iduloga=u.id WHERE u.id=3")->fetchall();
			}
		}
		//var_dump($upit);
		?>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<?php foreach($upit as $u):?>														
							<li><a href="<?=$u['putanja']?>"><?=$u['naziv']?></a></li>			
							<?php endforeach?>
						</ul>
					</nav>
				</div>
			</section>