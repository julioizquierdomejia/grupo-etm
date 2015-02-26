<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPedido[] = $_GET["seleccion"];
$pObservacion = "";
/*$pN1[] = $_GET["n1"];
$pN2[] = $_GET["n2"];
$pN3[] = $_GET["n3"];
$pN4[] = $_GET["n4"];
$pN5[] = $_GET["n5"];
$pN6[] = $_GET["n6"];
$arrPedido = array_merge($pProducto, $pN1, $pN2, $pN3, $pN4, $pN5, $pN6);
*/

mysqli_set_charset($conexion, "utf8");

if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_ins_Picking(?, ?, @Picking)"))
{
	mysqli_stmt_bind_param($rs, 'ss', $login_session, utf8_decode($pObservacion));
	mysqli_stmt_execute($rs);
	
	$return = mysqli_query($conexion, 'SELECT @Picking as Picking');
	$result = mysqli_fetch_assoc($return);

	//$pPicking = $result["@Picking"];
	$pPicking = $result["Picking"];
	


	$rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_PickingPedido(?, ?)");

	for ($i = 0; $i < count($pPedido[0]); $i++)
	{

		mysqli_stmt_bind_param($rsd, 'ss', $pPicking, $pPedido[0][$i]);
		mysqli_stmt_execute($rsd);	
	}

	mysqli_stmt_close($rsd);
	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);

//print_r($resultjson);
echo json_encode((object)$result); //"Picking creado";
//echo (object)$pPicking; //"Picking creado";

?>