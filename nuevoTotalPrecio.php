<?php 
include('cms/config.php');
$tokenCliente = $_REQUEST['tokenCliente'];

$SqlDeuda =
("SELECT 
    p.id,
    p.puntos,
    p.nameProd,
    pt.producto_id,
    pt.tokenCliente,
    pt.cantidad,
    SUM(p.puntos * pt.cantidad) AS totalPagar 
FROM products as p, pedidostemporales AS pt
WHERE 
    p.id=pt.producto_id
    AND tokenCliente='".$tokenCliente."' 
");
$jqueryDeuda   = mysqli_query($con, $SqlDeuda); 
$dataDeuda     = mysqli_fetch_array($jqueryDeuda); 
    
echo number_format($dataDeuda['totalPagar'], 0,'','.'). ' PTS'; 
?>
