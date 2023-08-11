<?php
require_once('tcpdf/tcpdf.php');
include('config/config.php');
date_default_timezone_set('America/Bogota');

$codPedido = isset($_POST['codPedido']) ? $_POST['codPedido'] : $_GET['codPedido'];
$token = substr($codPedido, 0, 5);


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF
{
    public function Header()
    {
        $image_file = dirname(__FILE__) . '/assets/images/logo.png';
        $this->Image($image_file, 10, 20, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->setFont('helvetica', 'B', 20);
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$pdf->SetXY(160, 20);
$pdf->Write(0, 'Código: ' . $token);
$pdf->SetXY(160, 25);
$pdf->Write(0, 'Fecha: 3443');
$pdf->SetXY(160, 30);
$pdf->Write(0, 'Hora: 4343');

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
                AND pedtemp.tokenCliente='" . $codPedido . "'");
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
        <th style="border-right: 0.2px solid #666;">Cantidad</th>
        <th style="border-right: 0.2px solid #666;">Producto</th>
        <th style="border-right: 0.2px solid #666;">SubTotal</th>
    </tr>';
$total = 0;
while ($dataP = mysqli_fetch_array($queryCarrito)) {
    $precioFormateado = number_format($dataP['precio'], 0, '', '.');
    $html .= '
    <tr>
        <td style="border-right: 1px solid #666; border: 0.2px solid #666;">' . $dataP['cantidadDisponible'] . '</td>
        <td style="border-right: 1px solid #666; border: 0.2px solid #666;">' . $dataP['nameProd'] . '</td>
        <td style="border-right: 1px solid #666; border: 0.2px solid #666; text-align: center;">$ ' . $precioFormateado . '</td>
    </tr>';
    $total += $precioFormateado;
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
