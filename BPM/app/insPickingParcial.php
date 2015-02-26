<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPicking = $_GET["picking"];

$pTipo = "Despacho parcial";

$sqlerror = "";

	$pProducto[] = $_GET["producto"];
	$pN1[]		 = $_GET["nivel_1"];
	$pN2[]		 = $_GET["nivel_2"];
	$pN3[]		 = $_GET["nivel_3"];
	$pN4[]		 = $_GET["nivel_4"];
	$pN5[]		 = $_GET["nivel_5"];
	$pN6[]		 = $_GET["nivel_6"];
	
	$arrPicking = array_merge($pProducto, $pN1, $pN2, $pN3, $pN4, $pN5, $pN6);
	//print_r($arrPicking);
	mysqli_query($conexion, "begin");
	
	if ($rsd = mysqli_prepare($conexion,"CALL grupo_bpm.usp_ins_PickingDespacho(?, ?, ?, ?, ?, ?, ?, ?, @Pedido)"))
	{
		for ($i = 0; $i < count($arrPicking[0]); $i++)
		{
			mysqli_stmt_bind_param($rsd, 'siiiiiii', 
								   $pPicking, 
								   $arrPicking[0][$i], 
								   $arrPicking[1][$i], 
								   $arrPicking[2][$i], 
								   $arrPicking[3][$i], 
								   $arrPicking[4][$i], 
								   $arrPicking[5][$i], 
								   $arrPicking[6][$i]);

			if (!mysqli_stmt_execute($rsd))
			{ 
				$sqlerror = mysqli_error($conexion);
				die($sqlerror);
				mysqli_query($conexion, "rollback");
				
			}
		}
		//print_r($rsd);
	
		$return = mysqli_query($conexion, 'SELECT @Pedido');
		$result = mysqli_fetch_assoc($return);
	
		$pPedido = $result["@Pedido"];
		
		mysqli_stmt_close($rsd);
	
		if ($rs = mysqli_prepare($conexion,"CALL grupo_bpm.usp_upd_Estados(?, ?, ?)"))
		{
			mysqli_stmt_bind_param($rs, 'sss', $pPedido, $pTipo, $login_session);
			
			mysqli_stmt_execute($rs);
			
			mysqli_stmt_close($rs);		
			
			mysqli_query($conexion, "commit");
		}
		else{
			$sqlerror = mysqli_error($conexion);
			die($sqlerror);
			mysqli_query($conexion, "rollback");
			}
	
	}
	else{
		$sqlerror = mysqli_error($conexion);
		die($sqlerror);
		mysqli_query($conexion, "rollback");
		}

disconnectDB($conexion);
if ($sqlerror != "") 
	echo $sqlerror;
else
	echo "success";
?>