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
<link rel="stylesheet" href="styles/picnic.min.css">
</head>
<body>

<?php include('loarder.html'); ?>

<div class="super_container">
	
<?php include('header.php'); ?>


<div class="mt-5">
	<br><br>
</div>

<div class="container mt-5">

	<div class="row justify-content-center mb-5 col-md-auto">
		<div class="col-lg-5 text-center">
			<div class="section_title mt-5">
				<p id="titleRegister" style="font-size: 20px;">Escriba su Nombre de usuario o correo electrónico</p>
			</div>

            <div class="get_in_touch_contents text-center col-md-auto">
					<form action="post">
						<div class="row">
							<div class="col">
                                <input type="email" class="form_input input_name input_ph"  name="name" placeholder="Nombre de usuario o correo electrónico " required="required" data-error="Campo Obligatorio">
							</div>
                        </div>
						<div class="row mt-5 mb-3">
							<div class="col text-center">
                        		<button type="submit" class="btn btn-lg btn-block btnEnviarForm">Recuperar mi Cuenta</button>
							</div>
						</div>

                        <a href="index.php">Volver</a>
					</form>
				</div>

		</div>
	</div>


</div>

<?php include('footer.html'); ?>

</div>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<!--<script src="js/jquery-3.2.1.min.js"></script>--->
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src='js/kit.fontawesome.js'></script>
<script src="js/miScript.js"></script>


</body>
</html>