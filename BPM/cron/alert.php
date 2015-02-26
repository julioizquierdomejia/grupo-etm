<?php

date_default_timezone_set('Etc/UTC');

require_once("../Conexion.php");
require '../library/PHPMailer/PHPMailerAutoload.php';


$conexion = connectDB();

if(!$result = mysqli_query($conexion, "CALL grupo_bpm.usp_sel_PedidosRetrasados();"))
{ 
	die();
}
else
{
//$pedidos[] = array();

$fila = '';

while($row = mysqli_fetch_array($result)) 
{ 
	$fila .= '<tr>
	<td style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">'.$row["pedido"].'</td>
	<td style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">'.$row["fecha"].'</td>
	<td style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">'.$row["colegio"].'</td>
	<td style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">'.$row["promotor"].'</td>
	<td style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">'.$row["horas"].'</td>
	</tr>';
	//$pedidos[]=$row;
}

disconnectDB($conexion);

if ($fila!='')
{
//$para  = 'milton.salazar.iglesias@gmail.com' . ', '; // atención a la coma
$para = 'eparedes@grupo-etm.com' . ', ';
$para .= 'ncondori@grupo-etm.com' . ', ';
$para .= 'msalazar@grupointerforest.pe' . ', ';
$para .= 'jdiaz@grupo-etm.com';

$titulo = '[ALERTA] Pedidos retrasados';

$mensaje = '
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/sunny/jquery-ui.css">
<script src="http://code.jquery.com/jquery-2.1.3.js"></script>
	
  <title>Pedidos Retrasados</title>
</head>
<body>
  <p>Los siguientes pedidos han excedido las 72 horas de atenci&oacute;n</p>
  <table style="margin: 1em 0; border-collapse: collapse; width: 100%;">
  	<thead>
    <tr style="background:#FC3">
      <th style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">Pedido</th><th style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">Fecha</th><th style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">Cliente</th><th style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">Promotor</th><th style="border: 1px solid #eee; padding: .6em 10px; text-align: left;">Tiempo trans.</th>
   </tr></thead><tbody>';
	
	$mensaje.= $fila;
	
	$mensaje .= '</tbody></table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$cabeceras .= 'To: Milton <milton.salazar.iglesias@gmail.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio ETM <alerta@grupo-etm.com>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: milton.salazar.iglesias@gmail.com' . "\r\n";

//$mensaje = wordwrap($mensaje, 70, "\r\n");

//mail($para, $titulo, $mensaje, $cabeceras);

$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';

$mail->Port = 465;

$mail->SMTPSecure = 'ssl';

$mail->SMTPAuth = true;

$mail->Username = "alertas.etm@gmail.com";

$mail->Password = "8jf#l-09Dtm";

$mail->setFrom('alertas.etm@gmail.com', 'Recordatorio ETM');

$mail->addAddress('jdiaz@grupo-etm.com', 'Javier Diaz');
$mail->addAddress('ncondori@grupo-etm.com', 'Nelly Condori');
$mail->addAddress('eparedes@grupo-etm.com', 'Eduardo Paredes');
$mail->addAddress('milton_salazar_iglesias@hotmail.com', 'Milton Salazar');

$mail->Subject = $titulo;

//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML($mensaje);

$mail->AltBody = 'Alerta de pedidos retrasados';

//$mail->addAttachment('images/phpmailer_mini.png');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

// El mensaje
//$mensaje = "El pedido 2015-00016 tiene 82 horas de retraso";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()


// Enviarlo
//mail('milton.salazar.iglesias@gmail.com', 'Retraso en entrega de pedido', $mensaje);			
}
}

?>