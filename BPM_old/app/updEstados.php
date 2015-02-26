<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pTipo = $_GET["tipo"];
$pPedido= $_GET["pedido"];

//$sSQL = "";

/*if ($pTipo == "Emitido")
{
	$sSQL = "update grupo_bpm.bpm_pedido, grupo_bpm.bpm_login 
			set estado = 'Emitido', fecha_emitido = now(), usuario_emitido = login_id 
			where username='$login_session' and pedido = '$pPedido';";
	}
	*/
if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_Estados(?, ?, ?)"))
{
	mysqli_stmt_bind_param($rs, 'sss', $pPedido, $pTipo, $login_session);
	
	mysqli_stmt_execute($rs);
	
	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);
?>