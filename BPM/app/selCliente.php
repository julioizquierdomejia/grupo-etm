<?php
require_once("../Conexion.php");

$conexion = connectDB();

if (isset($_GET["term"])){
	$filtro = $_GET["term"];	
}

if (isset($_GET["departamento"])){ 
	$departamento = $_GET["departamento"];
}

if (isset($_GET["provincia"])){ 
	$provincia = $_GET["provincia"];
}

if (isset($_GET["distrito"])){ 
	$distrito = $_GET["distrito"];
}

if (isset($_GET["tipo"])){ 
	$tipo = $_GET["tipo"];

	if ($tipo=="Departamento")
	{
		$sqlQuery = "SELECT DISTINCT departamento FROM grupo_bpm.bpm_cliente order by departamento;";
	}
		
	if ($tipo=="Provincia")
	{
		$sqlQuery = "SELECT DISTINCT provincia FROM grupo_bpm.bpm_cliente where departamento = '". $departamento ."' order by provincia;";
	}
	
	if ($tipo=="Distrito")
	{
		$sqlQuery = "SELECT DISTINCT distrito FROM grupo_bpm.bpm_cliente where departamento = '". $departamento ."' and provincia = '". $provincia ."' order by distrito;";
	}
	
	if ($tipo=="Cliente")
	{
		$sqlQuery = "SELECT tipo, nombre, id as cliente_id FROM grupo_bpm.bpm_cliente where departamento = '". $departamento ."' and provincia = '". $provincia ."' and distrito = '". $distrito ."' order by tipo, nombre;";
	}
}

//if ($tipo=="Otros")
//{
	$sqlQuery = "SELECT concat(nombre, ' : ' , ifnull(departamento, ''), ', ',  ifnull(provincia, ''), ', ', ifnull(distrito, '')) as cliente, id as cliente_id FROM grupo_bpm.bpm_cliente where concat(nombre, ' : ' , ifnull(departamento, ''), ', ',  ifnull(provincia, ''), ', ', ifnull(distrito, '')) like '%".str_replace(" ", "%", $filtro)."%' order by departamento, provincia, distrito, nombre;";
//}
//$sqlQuery = "SELECT tipo, nombre FROM grupo_bpm.bpm_cliente WHERE activo = 1 ORDER BY tipo, nombre;";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlQuery)) die("Error de conexión");

$array = array();

while($row = mysqli_fetch_array($result)) 
{ 
	//$array[] = $row;
	$array[] = array("id"=>$row["cliente_id"], "label"=>$row["cliente"], "value"=>$row["cliente"]);
}
disconnectDB($conexion);

echo json_encode((object)$array);
?>