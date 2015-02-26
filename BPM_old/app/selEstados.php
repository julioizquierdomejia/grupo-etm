<?php
require_once("../Conexion.php");
include("../session.php");

$conexion = connectDB();

$pPedido = $_GET["pedido"];


mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, "CALL grupo_bpm.usp_sel_Estados('$pPedido');")) die();

$estado[] = array();

while($row = mysqli_fetch_array($result)) 
{ 
	$estado[]=$row;
}

disconnectDB($conexion);

echo json_encode((object)$estado);

?>