<?php
require_once("../Conexion.php");

$conexion = connectDB();

$sqlQuery = "SELECT tipo, nombre FROM grupo_bpm.bpm_cliente WHERE activo = 1 ORDER BY tipo;";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlQuery)) die("Error de conexión");

$array = array();

while($row = mysqli_fetch_array($result)) 
{ 
	$array[] = $row;
}
disconnectDB($conexion);

echo json_encode((object)$array);
?>