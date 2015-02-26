<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPedido = $_GET["seleccion"];
//$pObservacion = " ";

mysqli_set_charset($conexion, "utf8");

if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_ins_Picking(?, ?, @Picking);"))
{
	mysqli_stmt_bind_param($rs, 'ss', $login_session, $pPedido);
	//mysqli_stmt_bind_param($rs, 'ss', $login_session, utf8_decode($pObservacion));
	mysqli_stmt_execute($rs);
	
	$return = mysqli_query($conexion, 'SELECT @Picking as Picking');
	$result = mysqli_fetch_assoc($return);


	$pPicking = $result["Picking"];

	if (!$rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_PickingPedido(?, ?, ?)")) die(mysqli_error($conexion));

	/*for ($i = 0; $i < count($pPedido[0]); $i++)
	{*/
		//echo "pedido:".$pPedido[0][$i];
		mysqli_stmt_bind_param($rsd, 'sss', $pPicking, $pPedido, $login_session);
		mysqli_stmt_execute($rsd);	
	//}

	mysqli_stmt_close($rsd);
	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);

//print_r($resultjson);
echo json_encode((object)$result); //"Picking creado";
//echo (object)$pPicking; //"Picking creado";

?>