<?php
require_once('tcpdf/tcpdf.php');
include('config/config.php');
date_default_timezone_set('America/Bogota');

$codPedido = isset($_POST['codPedido']) ? $_POST['codPedido'] : $_GET['codPedido'];
$token = substr($codPedido, 0, 5);


ob_end_clean(); //limpiar la memoria


//SQL para buscar información adicional del pedido
$infoPedido = "
SELECT 
    MAX(DATE_FORMAT(fecha, '%d de %b %Y')) AS fecha_pedido,
    MAX(DATE_FORMAT(fecha, '%h:%i %p')) AS hora_fecha_pedido
FROM pedidostemporales
WHERE tokenCliente = '" . $codPedido . "' LIMIT 1";
$queryPedido = mysqli_query($con, $infoPedido);
$data = mysqli_fetch_array($queryPedido);


class MYPDF extends TCPDF
{
    public function Header() {
		$image_file ='assets/images/logo.jpg';
		$this->Image($image_file, 10, 20, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	}

    public function Footer()
    {
        $this->setY(-15);
        $this->setFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//establecer margenes
$pdf->SetMargins(15, 35, 15);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //para eliminar la linea superio del pdf por defecto y tambien ej hearder
$pdf->SetAutoPageBreak(true);  //IMPORTANTISIMO,permite bajar un elemento y eliminar el crear otra otra.


// Informacion del pdf
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Factura de Pedido');


//Agregando una pagina
$pdf->AddPage();


//tipo de fuente y tamaño
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(145, 20);
$pdf->Write(0, 'Código: ' . $token);
$pdf->SetXY(145, 25);
$pdf->Write(0, 'Fecha: ' . $data['fecha_pedido']);
$pdf->SetXY(145, 30);
$pdf->Write(0, 'Hora: ' . $data['hora_fecha_pedido']);

/*
$html1 = '
<div style="width:10%; text-align: right; float: right; border:1px solid">
<table style="width:50%;">
    <tr>
        <th>Código</th>
        <th>fecha</th>
        <th>Hora</th>
    </tr>';
$html1 .= '
    <tr>
        <td>www</td>
        <td>rrr</td>
        <td>yyy</td>
    </tr>';
$html1 .= '
</table>
</div>';
$pdf->writeHTML($html1);
*/

$sqlCarritoCompra = ("
        SELECT 
            p.nameProd,
            p.precio,
            pedtemp.cantidad,
            p.precio * pedtemp.cantidad AS total_a_pagar
        FROM 
            products AS p
        INNER JOIN
            pedidostemporales AS pedtemp
        ON 
            p.id = pedtemp.producto_id
        WHERE 
            pedtemp.tokenCliente = '" . $codPedido . "'");
$queryCarrito   = mysqli_query($con, $sqlCarritoCompra);



$pdf->Ln(20);
$html = '
<h1 align="center">RESUMEN DE MI PEDIDO <hr class="hr-1"></h1>
<style>
hr {
  background-color: #ccc;
  padding: 0;
  margin: 50px;
}

hr.hr-1 {
  border: 0;
  height: 0.2px;
  background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>
<br><br>
<table style="font-size:13px; padding:5px 10px; border: 1px solid #666;" align="center">
    <tr style="background-color: #cccccc;">
    <th style="border-right: 0.2px solid #666;">Producto</th>
    <th style="border-right: 0.2px solid #666;">Cantidad</th>
    <th style="border-right: 0.2px solid #666;">SubTotal</th>
    </tr>';
$total = 0;
while ($dataP = mysqli_fetch_array($queryCarrito)) {
    $precioFormateado = number_format($dataP['precio'], 0, '', '.');
    $html .= '
    <tr>
    <td style="font-size:9px; border-right: 1px solid #666; border: 0.2px solid #666;">' . $dataP['nameProd'] . '</td>
    <td style="font-size:9px; border-right: 1px solid #666; border: 0.2px solid #666;">' . $dataP['cantidad'] . '</td>
    <td style="font-size:9px; border-right: 1px solid #666; border: 0.2px solid #666; text-align: center;">$ ' . $precioFormateado . '</td>
    </tr>';
    $total += $dataP['total_a_pagar'];
}
$html .= '
<tr>
    <td colspan="2" style="text-align: right;"><strong>Total:</strong></td>
    <td style="background-color: #cccccc; text-align: center;"><strong>$ ' . number_format($total, 0, '', '.') . '</strong></td>
</tr>';
$html .= '
</table>';

$pdf->writeHTML($html);


//Close and output PDF document
$pdf->Output('Solicitud_pedido_' . date('d_m_Y_h_i_A') . '.pdf', 'I');
//la D es para forzar la descargarnd del pdf y La I funciona como un target
