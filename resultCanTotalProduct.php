<?php 
include('cms/config.php');
$tokenCliente     = $_REQUEST['nameTokenProducto'];


$SqlCantidad = ("SELECT SUM(cantidad) AS totalCantidaP FROM pedidostemporales  WHERE tokenCliente='".$tokenCliente."' ");
$jqueryCan   = mysqli_query($con, $SqlCantidad); 
$dataCant     = mysqli_fetch_array($jqueryCan);
echo $dataCant['totalCantidaP'];
?>

