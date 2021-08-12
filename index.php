<?php
//error_reporting(0);
session_start();
include('config.php');
header("Content-Type: text/html;charset=utf-8");
if (isset($_SESSION['email']) != "") {
   $Cliente	= $_SESSION['nameFull'];
   $email   = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 " lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 " lang="en"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9 " lang="en"> <![endif]-->
<!--[if gt IE 9 | !IE]><!-->
<html lang="es">
<head>
<title>Groomersacademy</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Groomersacademy">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="images/favicon.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<?php include('loarder.html'); ?>

<div class="super_container">
	
<?php include('header.php'); ?>



<div class="mt-5 pt-5">
	<br><br><br>
</div>

<div class="container">
	<div class="row align-items-center">
		<div class="col-lg-12 text-center mt-5">
			<div class="section_title">
				<h2>
					Bienvenido Groomer 
				</h2>
			</div>
		</div>
	</div>

	<div class="row align-items-center">
		<div class="col-lg-12 text-center">
			<div class="section_title">
				<h4>Es tú oportunidad para ganar grandes premios</h4>
			</div>
		</div>
	</div>

	<div class="row align-items-center">
		<div class="mt-5"></div>
		<div class="col-lg-12 text-center mt-5">
			<div class="section_title">
				<img class="img-fluid" src="images/logo-groommers.jpg" alt="">
			</div>
		</div>
	</div>

	<div class="row align-items-center">
		<div class="col-lg-12 text-center mb-5 pb-5">
			<div class="section_title">
				<h4>LA NUTRICIÓN PERFECTA PARA TU MASCOTA</h4>
			</div>
		</div>
	</div>

	<div class="row align-items-center mb-5">
		<div class="col-lg-6 text-center">
			<div class="section_title">
				<p id="titleSpecial">Productos de gatos <hr></p>
					<img class="img-fluid" src="images/produtos-gatos.jpg" alt="gatos">
				<p>Lo mejor para tu mascota</p>
			</div>
			<a href="#" class="red_button btn_raza">Gatos de Raza</a>
		</div>
		<div class="col-lg-6 text-center">
			<div class="section_title">
				<p id="titleSpecial">Productos de perros<hr></p>
					<img class="img-fluid" src="images/produtos-gatos.jpg" alt="perros">
					<p>Lo mejor para tu mascota</p>
			</div>
			<a href="#" class="red_button btn_raza">Perros de Raza</a>
		</div>
	</div>


	<div class="row align-items-center mt-5 pt-5">
		<div class="col-lg-6 text-center">
			<div class="section_title">
				<h3>Los mejores premios para ti</h3>
				<p>Registrate para ganar los siguientes premios, solo tienes que recomendarnos a tus clientes,
					 registrar su compra y acumular puntos para ganar increíbles premios.
				</p>
			</div>
		</div>
		<div class="col-lg-6 text-center">
			<div class="section_title">
					<img class="img-fluid" src="images/gatos-home.jpg" alt="perros">	
			</div>
		</div>
	</div>

	<div class="row align-items-center">
		<div class="col-lg-12 text-center mt-5">
			<div class="section_title">
				<h2>La salud es única para cada mascota</h2>
				<p>Formulamos nutrición a medida para ayudar a gatos y perros a tener una vida más saludable.</p>
			</div>
		</div>
	</div>

	<div class="row align-items-center">
		<div class="col-lg-12 text-center mt-5">
			<div class="section_title">
				<img class="img-fluid" src="images/homepage-video-cropped.gif" alt="perros_y_gatos">	
			</div>
		</div>
	</div>


</div>


<?php include('footer.html'); ?>

</div>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src='js/kit.fontawesome.js'></script>
<script src="js/custom.js"></script>
<script src="js/miScript.js"></script>

</body>
</html>