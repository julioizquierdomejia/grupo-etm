<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pTipo = $_GET["tipo"];
$pPedido= $_GET["pedido"];

if ($pTipo=="Despacho parcial")
{
	$pProducto[] = $_GET["producto"];
	$pN1[]		 = $_GET["nivel_1"];
	$pN2[]		 = $_GET["nivel_2"];
	$pN3[]		 = $_GET["nivel_3"];
	$pN4[]		 = $_GET["nivel_4"];
	$pN5[]		 = $_GET["nivel_5"];
	$pN6[]		 = $_GET["nivel_6"];
	
	$arrPedido = array_merge($pProducto, $pN1, $pN2, $pN3, $pN4, $pN5, $pN6);
	//print_r($arrPedido);
	$rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_DespachoParcial(?, ?, ?, ?, ?, ?, ?, ?)");
		
	for ($i = 0; $i < count($arrPedido[0]); $i++)
	{
		mysqli_stmt_bind_param($rsd, 'siiiiiii', $pPedido, $arrPedido[0][$i], $arrPedido[1][$i], $arrPedido[2][$i], $arrPedido[3][$i], $arrPedido[4][$i], $arrPedido[5][$i], $arrPedido[6][$i]);
		mysqli_stmt_execute($rsd);	
	}
	//print_r($rsd);
	
	mysqli_stmt_close($rsd);
}

if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_Estados(?, ?, ?)"))
{
	mysqli_stmt_bind_param($rs, 'sss', $pPedido, $pTipo, $login_session);
	
	mysqli_stmt_execute($rs);
	
	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);
?>