<?php
error_reporting(0);
session_start();
include('cms/config.php');
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
<link rel="stylesheet" href="styles/picnic.min.css">
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
				<img class="img-fluid" src="images/foto-personaje.png" style="width: 200px;" alt="logo perfil">
			</div>
            <h4 class="mt-2" id="perfilUser">Alejandro Torres</h4>
		</div>
	</div>

    <div class="mt-5 pd-5"></div>

	<div class="row align-items-center mt-5 mb-5">
		<div class="col-lg-5 text-center">
			<div class="section_title">
				<img class="img-fluid" src="images/grooming-landing-252x300.png" alt="gatos" style="margin-top: -200px;">
			</div>
		</div>

		<div class="col-lg-7 text-center">
			<div class="section_title mt-5">
				<p id="titleRegister">Coloca los datos de tu mascota en las casillas correspondientes</p>
                <p>
                Regístrate y sube la foto de tu factura de servicio para ganar 1 bono de descuento de $15.000 en tu próxima compra.
				</p>
			</div>

            <div class="get_in_touch_contents">
					<form action="recibForm.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="idgroomer" class="form-control" value="2">

						<input  type="text" name="nameFull"  class="form_input input_name input_ph" placeholder="Tú nombre completo" required="required" data-error="Campo Obligatorio">
							
						<div class="row">
							<div class="col">
							<select name="typeMascot">
                                <option value="">Tú mascota es:</option>
                                <option value="Gato">Gato</option>
								<option value="Perro">Perro</option>
                            </select>
							</div>
							<div class="col">
							<select name="raza_mascota">
                                <option value="">Raza de tú mascota:</option>
                                <option value="Raza x">Raza x</option>
								<option value="Raza y">Raza y</option>
                            </select>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<input type="number" name="year" class="form_input input_website input_ph" placeholder="Edad de tú mascota" required="required" data-error="Campo Obligatorio">
							</div>
							<div class="col">
								<input type="number" name="phone" class="form_input input_website input_ph" placeholder="Teléfono" required="required" data-error="Campo Obligatorio">
							</div>
						</div>

						<div class="row">
							<div class="col">
							<input type="email" name="email" class="form_input input_website input_ph" placeholder="Email" required="required" data-error="Campo Obligatorio">
							</div>
						</div>
						
						<select name="point_grooming">
							<option selected value="">¿En que punto de venta adquiriste tu servicio de Gromming ?</option>
							<?php
							for ($optiones=1; $optiones <=10 ; $optiones++) { ?>
								<option value="<?php echo $optiones; ?>"><?php echo 'Punto '. $optiones; ?></option>
							<?php }
							?>
                        </select>

						<div class="row">
							<div class="col text-center">
							<label for="factura">Agregar tu Factura</label>
								<label class="dropimage text-center miniprofile">
									<input type="file" name="photo_invoice" title="Factura">
								</label>
							</div>
						</div>

						<div class="row mt-5">
							<div class="col text-center">
                        		<button type="submit" class="btn btn-lg btn-block btnEnviarForm">Enviar</button>
							</div>
						</div>

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
<script src="js/custom.js"></script>
<script src="js/miScript.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  [].forEach.call(document.querySelectorAll('.dropimage'), function(img){
    img.onchange = function(e){
      var inputfile = this, reader = new FileReader();
      reader.onloadend = function(){
        inputfile.style['background-image'] = 'url('+reader.result+')';
      }
      reader.readAsDataURL(e.target.files[0]);
    }
  });
});
</script>
</body>

</html>