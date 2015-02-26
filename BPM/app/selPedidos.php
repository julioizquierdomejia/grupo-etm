<?php
require_once("../Conexion.php");

$conexion = connectDB();

$pFechaInicio = "";
$pFechaFin = "";
$pEstado = "";
$pPromotor = "";

if ($_GET["FInicio"]<>""){
	$pFechaInicio = date('Y-m-d', strtotime(str_replace("/", "-", $_GET["FInicio"])));
}else{ 
	$pFechaInicio = "2010-01-01";
}
if ($_GET["FFin"]<>""){
	$pFechaFin = date('Y-m-d', strtotime(str_replace("/", "-", $_GET["FFin"])));
}else{ 
	$pFechaFin = date("Y-m-d H:i:s");
}
if ($_GET["estado"]<>""){
	$pEstado = "'".$_GET["estado"]."'";
}else{ 
	$pEstado = 'null';
}
if ($_GET["promotor"]<>""){
	$pPromotor = "'".$_GET["promotor"]."'";
}else{ 
	$pPromotor = 'null';
}

$sqlPedidos = "SELECT pedido, estado, fecha_registro, usuario_registro, motivo, colegio, promotor 
				FROM grupo_bpm.bpm_pedido 
				WHERE fecha_registro between '$pFechaInicio' and '$pFechaFin' and estado = ifnull($pEstado, estado) and
					  promotor = ifnull($pPromotor, promotor) 
				ORDER BY pedido desc;";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlPedidos)) die("No se pudo ejecutar la consulta");

$pedidos = array();

$i=0;

while($row = mysqli_fetch_array($result)) 
{ 
	$pedido=$row['pedido'];
    $fecha_registro=$row['fecha_registro'];
    $motivo=$row['motivo'];
    $colegio=$row['colegio'];
    $promotor=$row['promotor'];
    $estado=$row['estado'];
    
 
    $pedidos[] = array('pedido'=> $pedido, 'fecha_registro'=> $fecha_registro, 'motivo'=> $motivo, 'colegio'=> $colegio, 'promotor'=> $promotor, 'estado'=> $estado);
					
}
disconnectDB($conexion);
//echo $sqlPedidos;
echo json_encode((object)$pedidos);

?>