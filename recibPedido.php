<?php
session_start(); //Super Importante abro la session
include('config.php');
date_default_timezone_set("America/Bogota");

$_SESSION['tokenStoragel'] = $_REQUEST['tokenCliente'];

$idProduct 			= $_REQUEST['idProduct'];
$tokenCliente 		= $_REQUEST['tokenCliente'];
$cantidad 			=1;
$fecha              =  date("d/m/Y");
$hours 				= date('h:i:s a', time()); 


/*******Consulto el precio de dicho producto con respecto al id del cliente y su Token******/
$sqlSearchPrecio = ("SELECT * FROM products WHERE id='".$idProduct."' ");
$jquerySearchPrecio   = mysqli_query($con, $sqlSearchPrecio);
$DataSearchPrecio     = mysqli_fetch_array($jquerySearchPrecio);
$nuevoPrecioTotal 	  = $DataSearchPrecio['precio'];

//Verifico si ya existe el producto almacenado en la tabla temporal de acuerdo al Token Unico del Cliente
$ConsultarProduct = ("SELECT * FROM pedidostemporales WHERE tokenCliente='".$tokenCliente."' AND producto_id='".$idProduct."' ");
$jqueryProduct    = mysqli_query($con, $ConsultarProduct);
$CantProdExiste   = mysqli_num_rows($jqueryProduct);
$DataProducto     = mysqli_fetch_array($jqueryProduct);



//Caso 1; si ya existe dicho producto agregado con respecto al token que tiene asignado el Cliente.
if ($CantProdExiste >0) {
$newCantidad   = ($DataProducto['cantidad'] + 1);
$newCant 	   = ($DataProducto['nuevoPrecioTotal'] + $nuevoPrecioTotal);

$UdateCantidad = ("UPDATE pedidostemporales SET cantidad='".$newCantidad."', nuevoPrecioTotal='".$newCant."' WHERE producto_id='".$idProduct."' AND tokenCliente='".$tokenCliente."' ");
$resultUpdat = mysqli_query($con, $UdateCantidad);

}else{

//Caso 2; No existe producto agregado en la tabla de pedidos
$InsertProduct = ("INSERT INTO pedidostemporales (producto_id, cantidad, tokenCliente, nuevoPrecioTotal,fecha,hours) VALUES ('$idProduct','$cantidad','$tokenCliente','$nuevoPrecioTotal','$fecha','$hours')");
$result = mysqli_query($con, $InsertProduct);
}


$SqlTotalProduct       = ("SELECT SUM(cantidad) AS totalProd FROM pedidostemporales WHERE tokenCliente='".$_SESSION['tokenStoragel']."' GROUP BY tokenCliente");
$jqueryTotalProduct    = mysqli_query($con, $SqlTotalProduct);
$DataTotalProducto     = mysqli_fetch_array($jqueryTotalProduct);
echo $DataTotalProducto['totalProd'];

//Almaceno la nueva cantidad en una variable de Sesion
$_SESSION['newcantview'] = $DataTotalProducto['totalProd'];
?>