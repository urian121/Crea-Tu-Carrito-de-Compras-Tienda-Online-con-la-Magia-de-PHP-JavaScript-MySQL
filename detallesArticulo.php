<?php
session_start();
require_once('config.php');
$idProd = isset($_POST['idProd']) ? $_POST['idProd'] : $_GET['idProd'];

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
		AND prod.id ='".$idProd."'
		GROUP BY prod.id LIMIT 1
	");
$queryProducts = mysqli_query($con, $sqlProducts);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 " lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 " lang="en"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9 " lang="en"> <![endif]-->
<!--[if gt IE 9 | !IE]><!-->
<html lang="es">
<head>
<title>Tienda Online</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="images/logo.jpg">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">

</head>
<body>

<?php include('loarder.html'); ?>

<div class="super_container">
	
<?php include('header.php'); ?>


<div class="container single_product_container">

<div class="row">
<?php
while ($dataProduct = mysqli_fetch_array($queryProducts)) { ?>
	<div class="col-lg-7">
		<div class="single_product_pics">
			<div class="row">
				<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
					<div class="single_product_thumbnails">
						<ul>
							<li class="hoverAnimationProduct" ><img src="<?php echo $dataProduct["foto2"]; ?>" alt="" data-image="<?php echo $dataProduct["foto2"]; ?>"></li>
							<li class="active hoverAnimationProduct"><img src="<?php echo $dataProduct["foto1"]; ?>" alt="" data-image="<?php echo $dataProduct["foto1"]; ?>"></li>
							<li class="hoverAnimationProduct"><img src="<?php echo $dataProduct["foto3"]; ?>" alt="" data-image="<?php echo $dataProduct["foto3"]; ?>"></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9 image_col order-lg-2 order-1">
					<div class="single_product_image">
						<div class="single_product_image_background" style="background-image:url(<?php echo $dataProduct["foto1"]; ?>)"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="product_details">
			<div class="product_details_title">
				<h2 id="titleArticulo">
					<a href="index.php">
						<i class="fas fa-angle-left" style="color: #666;"></i>
					</a>
					&nbsp;
					<?php echo $dataProduct['nameProd']; ?>
				</h2>
				<p>
				<?php echo $dataProduct['descrip_Prod']; ?>
				</p>
			</div>
		
			<div class="product_price">$<?php echo $dataProduct['precio']; ?> </div>
			
			<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
				<span style="font-size: 18px;">Cantidad:</span>
				<div class="quantity_selector">
					<span class="minus">
					</span>

					<span id="quantity_value" style="font-weight:bold;">1</span>

					<span class="plus">
					</span>
				</div>
				<div class="red_button add_to_cart_button">
					&nbsp;&nbsp;
					&nbsp;&nbsp;
				</div>
					&nbsp;&nbsp;
			<p>
				<button data-id="<?php echo $dataProduct["prodId"]; ?>" class="comprar cart-button btn block">
					<span class="add-to-cart">Agregar a Carrito</span>

					<span class="added" style='color: #fff; font-weight:500'>Agregado <i class="fas fa-check" style="color:green;"></i> </span>
					<i class="fas fa-cart-plus"></i>
					<i class="fas fa-clipboard-check"></i>
				</button>
			</p>
			</div>

		</div>
	</div>
	<?php } ?>
</div>


</div>

<footer class="footer newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">© 2021 gatitos & perritos
                        <i class="fa fa-paw" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src='js/kit.fontawesome.js'></script>
<script src="js/custom.js"></script>
<script src="js/single_custom.js"></script>
<script src="js/miScript.js"></script>


</body>
</html>
