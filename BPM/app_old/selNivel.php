<?php
require_once("../Conexion.php");

$conexion = connectDB();
$tipo = $_GET["tipo"];

if (isset($_GET["nivel"])){ 
	$nivel = $_GET["nivel"];
}

if (isset($_GET["coleccion"])){ 
	$coleccion = $_GET["coleccion"];
}

if ($tipo=="Nivel")
{
	$sqlQuery = "SELECT DISTINCT nivel FROM grupo_bpm.bpm_producto";
	}
	
if ($tipo=="Coleccion")
{
	$sqlQuery = "SELECT DISTINCT coleccion FROM grupo_bpm.bpm_producto WHERE nivel = '".$nivel."'";
	}
	
if ($tipo=="Producto")
{
	$sqlQuery = "SELECT ID, producto FROM grupo_bpm.bpm_producto WHERE nivel = '".$nivel."' and coleccion = '".$coleccion."'";
	}

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlQuery)) die();

$array = array();

while($row = mysqli_fetch_array($result)) 
{ 
	$array[] = $row;
}
disconnectDB($conexion);

echo json_encode((object)$array);
?>