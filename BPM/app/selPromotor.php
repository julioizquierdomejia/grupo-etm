<?php
require_once("../Conexion.php");

$conexion = connectDB();

$sqlQuery = "SELECT promotor FROM grupo_bpm.bpm_promotor WHERE activo = 1 ORDER BY promotor;";

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