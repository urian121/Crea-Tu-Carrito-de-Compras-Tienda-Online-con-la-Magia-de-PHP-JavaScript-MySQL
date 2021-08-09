<?php
include('cms/config.php');
date_default_timezone_set("America/Bogota");
$fecha_registro   = date("Y-m-d");

//Declaro el Método Valido
if($_SERVER['REQUEST_METHOD'] == "POST"){
$idgroomer 		= isset($_POST['idgroomer']) ? mysqli_real_escape_string($con, $_POST['idgroomer']) : "";	
$nameFull 		= isset($_POST['nameFull']) ? mysqli_real_escape_string($con, $_POST['nameFull']) : "";
$typeMascot 	= isset($_POST['typeMascot']) ? mysqli_real_escape_string($con, $_POST['typeMascot']) : "";
$raza_mascota 	= isset($_POST['raza_mascota']) ? mysqli_real_escape_string($con, $_POST['raza_mascota']) : "";
$year 			= isset($_POST['year']) ? mysqli_real_escape_string($con, $_POST['year']) : "";
$phone 			= isset($_POST['phone']) ? mysqli_real_escape_string($con, $_POST['phone']) : "";
$email 			= isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : "";
$groomer_id     = isset($_POST['groomer_id']) ? mysqli_real_escape_string($con, $_POST['groomer_id']) : "";
    
//Recibo la foto (Factura)
$filename       = $_FILES['photo_invoice']['name'];
$sourceFoto     = $_FILES['photo_invoice']['tmp_name'];


$logitudPass 	= 15;
$newNameFoto   = substr( md5(microtime()), 1, $logitudPass);

$explode        = explode('.', $filename);
$extension_foto = array_pop($explode);
$nuevoNameFoto  = $newNameFoto.'.'.$extension_foto;

//Verificando si existe el directorio
$dirLocal = "fotos_facturas";
if (!file_exists($dirLocal)) {
    mkdir($dirLocal, 0777, true);
}

$miDir 		= opendir($dirLocal); //Habro el directorio
$urlFactura = $dirLocal.'/'.$nuevoNameFoto;

if(move_uploaded_file($sourceFoto, $urlFactura)){
	
	$sqlInsertBD = ("
	INSERT INTO clientesgroomers (
		  nameFull,
		  typeMascot,
		  raza_mascota,
		  year,
		  phone,
		  email,
		  groomer_id,
		  photo_invoice,
		  fecha_registro
		)
	VALUES (
		'$nameFull',
		'$typeMascot',
		'$raza_mascota',
		'$year',
		'$phone',
		'$email',
		'$idgroomer',
		'$urlFactura',
		'$fecha_registro'
	);");
	$post_data_query = mysqli_query($con, $sqlInsertBD);
	if($post_data_query >0){
		//:::::::::::Consulto el total de puntos acumulado por dicho Groomer de acuerdo al id del mismo ::::::::::://
		$ConsultandoGroomer = ("SELECT id, point_groomer FROM groomers WHERE id='".$idgroomer."' ");
		$jqueryGroomer      = mysqli_query($con, $ConsultandoGroomer);
		$dataGroomer        = mysqli_fetch_array($jqueryGroomer);


		$newPoint 	     = ($dataGroomer['point_groomer'] + 1);
		$UpdatePoint     = ("UPDATE groomers SET point_groomer='".$newPoint."' WHERE id='".$idgroomer."' ");
		$resultadoPoint  = mysqli_query($con, $UpdatePoint);
	}
}
	if($post_data_query){
		$json = array("status" => 1, "Success" => "Registro correcto.!");
	}
	else{
		$json = array("status" => 0, "Error" => "Error en el Registro.!");
	}

closedir($miDir); //Cierro el directorio
}else{
	$json = array("status" => 0, "Info" => "Metodo Incorrecto!");
}


@mysqli_close($con); //Ciero la conexion

//Seteo el  Content-type  JSON
/*
header('Content-type: application/json');
echo json_encode($json);
*/




//Funciones php para habilitar visualizacion de errores.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(-1);
error_reporting(E_ALL);

//Enviando informacion a la API
$data = array
(
    "brand_id" => "18",
    "product_id" => "233",
    "user_data" => array(
        "email" => $email,
        "name" => $nameFull,
        "birthdate" =>"",
        "id" =>"",
        "cellphone" =>""
    ),
);

echo "<pre>";
	print_r($data);
echo "</pre>";


      
      
$data_string = json_encode($data);
print_r($data_string);

$ch = curl_init('http://wsrest.activarpromo.com/api/redeem.json');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POST, true);                                                                    
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
curl_setopt($ch, CURLINFO_HEADER_OUT, true);                                                                   
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',
    'user:bmtest2021',
    'token:OuF0eR_TR4Ct_82#*',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
); 

$resultado = curl_exec($ch);
curl_close($ch);
$DataJson = json_decode($resultado,true);

//header("HTTP/1.1 200 OK");

//Recibiendo JSON desde la API
$jsonData = json_decode($resultado,true);

    echo $trxid = 'trxid: '. $jsonData["response"]["trxid"];
    echo '<br><br>';
    echo $urlPDF = 'url: '. $jsonData["response"]["url"];
	echo '<br><br>';

    $ids = array_column($jsonData, 'url');
    print_r($ids);

    echo var_dump($jsonData)."<br />";


    $urlCupon = $jsonData["response"]["url"];
    print_r($urlCupon);
    
echo 'aqui'. $urlCupon = $jsonData["response"]["url"];

$t ="google.com";

//enviando el pdf del bono al cliente
$destinatarioCriador = $email;
$asuntoCriador       = utf8_decode("Cúpon")." de descuento";
$cuerpoCriador = '
<style>
#enlaceboton{
    background-color: #c63411;
    border: #c63411;
    color: white;
    text-decoration: none;
    padding: 10px 30px;
    border-radius: 25px;
    }
</style>
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="http://groomersacademy.com.co/images/email/banneremailv2.jpg" width="100%">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #ffffff;">
            <div style="color: #34495e; margin: 4% 10% 2%; text-align: center;font-family: sans-serif">
                <h2 style="color: #34495e; margin: 0 0 7px;">Felicitaciones! <strong style="color:#555;"> '.$nameFull.' </strong> revise el link para ver su cupón de descuento.</h2>
                <p>&nbsp;</p>
				<a href="'.$urlCupon.'" id="enlaceboton"> Ver cupón </a>
				<p>&nbsp;</p>
				<a href="'.$t.'" id="enlaceboton"> Ver cupón </a>
				<p><a href="'.$t.'" style="background-color: #c63411;border: #c63411;color: white;text-decoration: none;padding: 10px 30px;border-radius: 25px;"> Ver cupón </a></p>
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
$headersCriador .= "From: Groomer Royal Canin <noresponder@registroroyalcanin48horas.com.co>\r\n"; 
$headersCriador .= "Reply-To: "; 
$headersCriador .= "Return-path:"; 
$headersCriador .= "Cc:"; 
$headersCriador .= "Bcc:"; 
$EnvioCriador    = mail($destinatarioCriador,$asuntoCriador,$cuerpoCriador,$headersCriador);



?>
