<!--color:#fe4c50; -->
<header class="header trans_300">
	<div class="top_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top_nav_left text-right" style="line-height: 30px !important;">
						<i class="fa fa-user" aria-hidden="true"></i>
						<a href="#" id="mi_cuenta">Mi Cuenta</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="main_nav_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
					<div class="logo_container">
						<a href="index.php">
							<img src="images/logo.jpg" style="width: 60px;">
						</a>
					</div>
					<nav class="navbar">
						<ul class="navbar_menu">
							<li><a class="nav-link" href="index.php">Inicio</a></li>
							<li><a class="nav-link" href="index.php">Productos</a></li>
							<li><a class="nav-link" href="#">contacto</a></li>
						</ul>
						<?php
						if (isset($_SESSION['tokenStoragel']) != "") {
							$SqlTotalProduct       = ("SELECT SUM(cantidad) AS totalProd FROM pedidostemporales WHERE tokenCliente='" . $_SESSION['tokenStoragel'] . "' GROUP BY tokenCliente");
							$jqueryTotalProduct    = mysqli_query($con, $SqlTotalProduct);
							$DataTotalProducto     = mysqli_fetch_array($jqueryTotalProduct);
						} ?>
						<ul class="navbar_user">
							<li class="checkout">
								<a href="carrito.php">
									<i class="fas fa-dog" style='font-size:18px'></i>
									<?php
									if (isset($_SESSION['tokenStoragel']) != "") {
										if (!empty($DataTotalProducto['totalProd'])) { ?>
											<span id="checkout_items" class="checkout_items">
												<?php echo $DataTotalProducto['totalProd']; ?>
											</span>
										<?php }
									} else { ?>
										<span id="checkout_items" class="checkout_items">0</span>
									<?php } ?>
								</a>
							</li>
						</ul>
						<div class="hamburger_container">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
	<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
	<div class="hamburger_menu_content text-right">
		<ul class="menu_top_nav">
			<li class="menu_item has-children">
				<a href="#">
					Mi Cuenta
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="menu_selection">
					<li><a href="#">Urian Viera</a></li>
					<li><a href="#">Cerrar Sesión</a></li>
				</ul>
			</li>
			<li class="menu_item"><a href="index.php">Inicio</a></li>
			<li class="menu_item"><a href="#">Productos</a></li>
			<li class="menu_item"><a href="#">Premios</a></li>
		</ul>
	</div>
</div>