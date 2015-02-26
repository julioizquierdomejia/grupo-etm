<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPicking= $_GET["picking"];

	if ($rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_ins_PickingTotal(?, ?)"))
	{
		mysqli_stmt_bind_param($rsd, 'ss', $pPicking, $login_session);
		if (!mysqli_stmt_execute($rsd)) die(mysqli_error($conexion));	
	
		mysqli_stmt_close($rsd);
	}
	else{
		die(mysqli_error($conexion));
	}

disconnectDB($conexion);
?>