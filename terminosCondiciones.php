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
		<div class="col-lg-12 text-center mb-5 pb-5">
			<div class="section_title">
				<p>
                    Este espacio es reservado aqui estará todos los términos y condiciones de los <strong> Groomers</strong>.
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, nulla! Sequi nostrum adipisci sit, hic sapiente voluptatum voluptatibus veritatis accusantium est omnis praesentium ab ratione qui quos odio iure laboriosam?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ea officia, beatae at temporibus enim nam rem recusandae, veritatis consequuntur eius quod deleniti nisi mollitia dolorem eveniet quisquam fugit? Quos.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum repudiandae dolor odio similique minima amet reiciendis consequuntur. Inventore eos qui ab a, nemo repellendus pariatur ratione sunt soluta quod quis.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint nam eaque itaque fugit totam consequatur, non optio inventore quod, tenetur incidunt obcaecati alias quo accusantium ex. Et consectetur dolorem sed?
                    </p>
				</p>
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


</body>
</html>