<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPedido = $_GET["txtpedido"];
$pColegio = $_GET["txtcolegio"];
$pMotivo = $_GET["selmotivo"];
$pPromotor = $_GET["selpromotor"];
$pFechaEntrega = $_GET["txtfechaentrega"];
$pObservacion = $_GET["txtobservaciones"];
$pProducto[] = $_GET["producto"];
$pN1[] = $_GET["n1"];
$pN2[] = $_GET["n2"];
$pN3[] = $_GET["n3"];
$pN4[] = $_GET["n4"];
$pN5[] = $_GET["n5"];
$pN6[] = $_GET["n6"];

$arrPedido = array_merge($pProducto, $pN1, $pN2, $pN3, $pN4, $pN5, $pN6);

$fecha_esp = date('Y-m-d', strtotime(str_replace("/", "-", $pFechaEntrega)));
	
if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_Pedido(?, ?, ?, ?, ?, ?, ?)"))
{
	mysqli_stmt_bind_param($rs, 'sssssss', $pPedido, $login_session, utf8_decode($pMotivo), utf8_decode($pColegio), utf8_decode($pPromotor), $fecha_esp, utf8_decode($pObservacion));
	mysqli_stmt_execute($rs);

	$rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_ins_Pedido_Detalle(?, ?, ?, ?, ?, ?, ?, ?)");
	
	for ($i = 0; $i < count($arrPedido[0]); $i++)
	{
		mysqli_stmt_bind_param($rsd, 'siiiiiii', $pPedido, $arrPedido[0][$i], $arrPedido[1][$i], $arrPedido[2][$i], $arrPedido[3][$i], $arrPedido[4][$i], $arrPedido[5][$i], $arrPedido[6][$i]);
		mysqli_stmt_execute($rsd);	
	}
	
	mysqli_stmt_close($rsd);
	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);

?>