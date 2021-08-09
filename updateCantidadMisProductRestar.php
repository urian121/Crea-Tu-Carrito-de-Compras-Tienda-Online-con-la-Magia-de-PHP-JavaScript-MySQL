<?php 
include('cms/config.php');

$idProd 		      = $_REQUEST['idProd'];
$nameTokenProducto    = $_REQUEST['nameTokenProducto'];


//Consulto total de Cantidad
$sqlC   = ("SELECT * FROM pedidostemporales WHERE tokenCliente='".$nameTokenProducto."' AND id='".$idProd."' ");
$queryC = mysqli_query($con, $sqlC);
$DataC  = mysqli_fetch_array($queryC);
echo $cantNuevaRestada = ($DataC['cantidad'] - 1);


$UpdateCant = ("UPDATE pedidostemporales SET cantidad ='$cantNuevaRestada'
	WHERE tokenCliente='".$nameTokenProducto."' AND id='".$idProd."' ");
$result = mysqli_query($con, $UpdateCant);

?>