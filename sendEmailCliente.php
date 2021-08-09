<?php 
$CriadorNombre     = "Urian V"; //Recibo el nombre del criador al cual debe ir el email.
$urlCupon ="hola.com";
$destinatarioCriador = "urian1213viera@gmail.com";
$asuntoCriador       = utf8_decode("Cúpon")." de descuento";
$cuerpoCriador = ' 
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="http://groomersacademy.com.co/images/email/banneremailv2.jpg" width="100%">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #ffffff;">
            <div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: sans-serif">
                <h2 style="color: #34495e; margin: 0 0 7px;margin-bottom:15px;">Felicitaciones!, <strong style="color:#555;"> '.$CriadorNombre.' </strong> revise el link para ver su cupón de descuento.</h2>
                <a href='.$urlCupon.' style="background-color: #fe4c50;border: #fe4c50;color: white;text-decoration: none;padding: 10px 30px;border-radius: 25px;"> Ver cupón </a>
            </div>
        </td>
    </tr>

    <tr>
        <td style="padding: 0;">
            <img style="padding: 0; display: block" src="http://groomersacademy.com.co/images/email/footeremail2.jpg" width="100%">
        </td>
    </tr>
</table>
'; 

$headersCriador  = "MIME-Version: 1.0\r\n"; 
$headersCriador .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headersCriador .= "From: Registro Royal Canin <noresponder@registroroyalcanin48horas.com.co>\r\n"; 
$headersCriador .= "Reply-To: "; 
$headersCriador .= "Return-path:"; 
$headersCriador .= "Cc:"; 
$headersCriador .= "Bcc:"; 
$EnvioCriador    = mail($destinatarioCriador,$asuntoCriador,$cuerpoCriador,$headersCriador);

?>
