<?php
require_once("../Conexion.php");

$conexion = connectDB();
$estado = $_GET["estado"];
$despacho = $_GET["despacho"];

if(!isset($_GET["txtcliente"]))
	$cliente = "";
else
	$cliente = str_replace(" ", "%", $_GET["txtcliente"]);

if ($estado=="Pendiente")
	$estado = "and pk.preparado = 0 ";
elseif ($estado == "Listo")
	$estado = "and pk.preparado = 1 ";
else
	$estado = "";
		
if ($despacho=="Si")
	$despacho = " and pk.despachado = 1 ";
elseif ($despacho == "No")
	$despacho = " and pk.despachado = 0 ";
else
	$despacho = "";

			
$sqlPicking = "SELECT pk.picking, pk.fecha_picking, log.username, ped.pedido, ped.colegio, ped.motivo, case pk.preparado when 0 then '' else 'checked' end as prep, case pk.despachado when 0 then '' else 'checked' end desp
					FROM grupo_bpm.bpm_picking pk inner join
							   grupo_bpm.bpm_login log on pk.usuario = log.login_id inner join
							   grupo_bpm.bpm_pedido ped on pk.pedido = ped.pedido collate utf8_general_ci ".$estado."".$despacho."WHERE ped.colegio like '%$cliente%' ORDER BY pk.picking;";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlPicking)) die("No se pudo ejecutar la consulta");

$picking = array();

$i=0;

while($row = mysqli_fetch_array($result)) 
{ 
	$picking[]=$row; 
}
disconnectDB($conexion);
//echo $sqlPedidos;
echo json_encode((object)$picking);

?>