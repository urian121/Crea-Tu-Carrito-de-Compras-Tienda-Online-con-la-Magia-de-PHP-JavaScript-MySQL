<?php
error_reporting(0);
session_start();
include('config.php');
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
	<br><br>
</div>

<div class="container">


	<div class="row align-items-center">
		<div class="col-lg-12 text-center">
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
		<div class="col-lg-12 text-center">
			<img class="img-fluid" src="images/logo-groommers.jpg" alt="">
		</div>
	</div>

<!-----lista de Productos ---->
<?php
	$sqlProducts = ("
	SELECT 
		prod . * ,
		prod.id AS prodId,
		fot . * ,
		fot.id AS fotId 
	FROM 
		products AS prod,
		fotoproducts AS fot
	WHERE 
		prod.id = fot.products_id
		AND statusProduct ='1'
		GROUP BY prod.id
	");
$queryProducts = mysqli_query($con, $sqlProducts);
?>

<div class="row align-items-center">
<?php
while ($dataProduct = mysqli_fetch_array($queryProducts)) { ?>
<div class="col col-md-4 mt-5 text-center Products">
<div class="card">
		<img class="card-img-top" src="<?php echo $dataProduct["foto1"]; ?>" alt="Card image cap">
	<div class="card-body text-center">
			<h5 class="card-title card_title"><?php echo $dataProduct['nameProd']; ?></h5>
		<p class="card-text p_puntos">
			<?php echo $dataProduct['puntos']; ?> Puntos
		</p>
		<a href="detallesArticulo.php?idProd=<?php echo $dataProduct["prodId"]; ?>" class="red_button btn_puntos" title="Redimir mis Puntos">REDIMIR PUNTOS</a>
	</div>
</div>
</div>

  <?php } ?>
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
<script src="js/miScript.js"></script>


</body>
</html>