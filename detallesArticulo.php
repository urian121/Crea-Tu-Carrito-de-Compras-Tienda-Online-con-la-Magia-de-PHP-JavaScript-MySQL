<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="assets/images/icon.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/single_responsive.css">
	<link rel="stylesheet" href="assets/styles/button_cart.css">
	<link rel="stylesheet" href="assets/styles/loader.css">
	<title>Crea Tu Carrito de Compras Online con la Magia de PHP, JavaScript y MySQL :: Urian Viera </title>

</head>

<body>
	<div class="page-loading active">
		<div class="page-loading-inner">
			<div class="page-spinner"></div>
			<span>cargando...</span>
		</div>
	</div>

	<div class="super_container">
		<?php

		include('funciones/funciones_tienda.php');
		$idProd = isset($_POST['idProd']) ? $_POST['idProd'] : $_GET['idProd'];
		include('header.php');
		$resultadoDetalleProduct = detalles_producto_seleccionado($con, $idProd);
		?>

		<div class="container single_product_container">
			<div class="row">
				<?php
				while ($dataProduct = mysqli_fetch_array($resultadoDetalleProduct)) { ?>
					<div class="col-lg-7">
						<div class="single_product_pics">
							<div class="row">
								<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
									<div class="single_product_thumbnails">
										<ul>
											<li class="hoverAnimationProduct">
												<img src="<?php echo $dataProduct["foto2"]; ?>" alt="" data-image="<?php echo $dataProduct["foto2"]; ?>">
											</li>
											<li class="active hoverAnimationProduct">
												<img src="<?php echo $dataProduct["foto1"]; ?>" alt="" data-image="<?php echo $dataProduct["foto1"]; ?>">
											</li>
											<li class="hoverAnimationProduct">
												<img src="<?php echo $dataProduct["foto3"]; ?>" alt="" data-image="<?php echo $dataProduct["foto3"]; ?>">
											</li>
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
									<?php echo $dataProduct['description_Prod']; ?>
								</p>
							</div>

							<div class="product_price">$<?php echo number_format($dataProduct['precio'], 0, '', '.'); ?> </div>

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
									<button class="button cart-button btn block" onclick="agregarCarrito(this, '<?php echo $dataProduct['prodId']; ?>', '<?php echo $dataProduct['precio']; ?>')">
										<span>Agregar a Carrito</span>
										<div class="cart">
											<svg viewBox="0 0 36 26">
												<polyline points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
												<polyline points="15 13.5 17 15.5 22 10.5"></polyline>
											</svg>
										</div>
									</button>
								</p>

							</div>

						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php include('includes/footer.html'); ?>
	</div>

	<?php include('includes/js.html'); ?>

</body>

</html>