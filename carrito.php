<?php
//error_reporting(0);
session_start();
require_once('config.php');

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
<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
</head>
<body>

<?php include('loarder.html'); ?>

<div class="super_container">
	
<?php include('header.php'); ?>

<?php 
$SqlMisProducts = 
("
    SELECT 
        prod . * ,
        prod.id AS prodId,
        fot . *,
        pedtemp .* ,
        pedtemp.id AS tempId
    FROM 
        products AS prod,
        fotoproducts AS fot,
        pedidostemporales AS pedtemp
    WHERE 
        prod.id = fot.products_id 
        AND prod.id=pedtemp.producto_id
        AND pedtemp.tokenCliente='".$_SESSION['tokenStoragel']."'
");
$jqueryMisProducts   = mysqli_query($con, $SqlMisProducts); 
$totalMisPro         = mysqli_num_rows($jqueryMisProducts); 

?>


<div class="mt-5 pt-5">
	<br><br><br>
</div>

<div class="container">

<?php
if (isset($_SESSION['tokenStoragel']) == "") { ?>
	<div class="row align-items-center">
		<div class="col-lg-12 text-center mt-5">
			
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Ops.!</strong> Tu carrito está vacío.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		</div>


		<div class="col-lg-12 text-center mt-5 mb-5">
            <a href="index.php" class="red_button btn_raza">Volver a la Tienda</a>
		</div>
	</div>
<?php }else{ ?>

	<!--Lista de pedido --->
	<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-5" style="border-bottom: solid 1px #ebebeb;">
                Resumen de mi Pedido 
            </h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead id="theadTableSpecial">
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Producto</th>
                            <th scope="col" class="text-center">Cantidad</th>
                            <th scope="col" class="text-right">Precio</th>
							<!--<th class="text-center" scope="col">SubTotal</th> -->
                            <th class="text-right">Acción </th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            while ($dataMiProd = mysqli_fetch_array($jqueryMisProducts)) { ?>
                        <tr id="resp<?php echo $dataMiProd['tempId']; ?>">
                            <td>
                                <img src="<?php echo $dataMiProd["foto1"]; ?>" alt="Foto_Producto" style="width: 100px;"> 
                            </td>
                            <td>
                                <?php echo $dataMiProd["nameProd"]; ?>
                            </td>
                            <td>
                                <div class="quantity_selector">
                                    <span class="minus restarCant" id="<?php echo $dataMiProd['tempId']; ?>">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </span>

                                    <span id="display<?php echo $dataMiProd['tempId']; ?>" quantity_value>
                                    <?php echo $dataMiProd["cantidad"]; ?>
                                    </span>

                                    <span class="plus aumentarCant" id="<?php echo $dataMiProd['tempId']; ?>">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>

                                </div>
                            </td>
                            <td class="text-right"><?php echo $dataMiProd["puntos"]; ?> pts</td>
							<!--<td class="text-center">12,03</td>-->
                            <td class="text-right">
                                <span class="btn btn-sm btn-danger deleteProd" id="<?php echo $dataMiProd['tempId']; ?>">
                                    <i class="fa fa-trash"></i> 
                                </span> 
                            </td>
                        </tr>

                <!--Modal para eliminar --->
                <div class="modal fade" id="confirm-delete<?php echo $dataMiProd['tempId']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title text-center">Eliminar Producto</h4>
                            </div>
                            <div class="modal-body text-center" style="border-bottom:1px solid #e9ecef;">
                                <label style="color: #333; font-weight:600;">
                                    ¿Estás seguro de eliminar el Producto?
                                </label>
                            </div>

                            <div class="modal-body text-center">
                                <a class="btn btn-primary btn-ok" style="color:#fff; padding: 0px 50px; border-radius: 20px; margin: 0px 30px;" data-dismiss="modal" id="<?php echo $dataMiProd['tempId']; ?>">Sí</a>
                                <a class="btn btn-danger btn-salir" style="color:#fff; padding: 0px 50px; border-radius: 20px;" data-dismiss="modal" id="<?php echo $dataMiProd['tempId']; ?>">No
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin de la Modal -->
            <?php } 


            /****Total a Pagar productos*******/
            $SqlDeuda = 
            ("SELECT 
                    p.id,
                    p.puntos,
                    p.nameProd,
                    pt.producto_id,
                    pt.tokenCliente,
                    pt.cantidad,
                SUM(p.puntos * pt.cantidad) AS totalPagar 
                FROM 
                    products as p,
                    pedidostemporales AS pt
                WHERE 
                    p.id=pt.producto_id
                    AND tokenCliente='".$_SESSION['tokenStoragel']."'
            ");
            $jqueryDeuda   = mysqli_query($con, $SqlDeuda); 
            $dataDeuda     = mysqli_fetch_array($jqueryDeuda); 
            ?>
                        <tr style="background-color: #fff !important;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="color:#fff; background-color: #ff4545 !important;">
                                <strong>Total</strong>
                            </td>
                            <td class="text-right" style="background-color: #ff4545 !important;">
                                <strong id="totalPuntos">
                                    <?php echo number_format($dataDeuda['totalPagar'], 0,'','.'); ?>  PTS
                                </strong>
                            </td>
                        </tr>
                    
          
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col mb-2 mt-5">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="premios.php" class="btn btn-block  red_button btn_raza">Continuar Comprando</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-block btn-success">Enviar Pedido</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fin lista de pedido -->
<?php } ?>


</div>


<?php include('footer.html'); ?>

</div>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
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