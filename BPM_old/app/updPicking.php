<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPicking = $_GET["picking"];
	
if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_PickingPreparado(?, ?)"))
{
	mysqli_stmt_bind_param($rs, 'ss', $pPicking, $login_session);
	mysqli_stmt_execute($rs);

	mysqli_stmt_close($rs);		
	}

disconnectDB($conexion);

?>