<?php
require_once("../Conexion.php");

$conexion = connectDB();
			
$sqlPicking = "SELECT pk.picking, pk.fecha_picking, log.username, ped.pedido, ped.colegio, ped.motivo, case pk.preparado when 0 then 'Pendiente' else 'Listo' end as estado
					FROM grupo_bpm.bpm_picking pk inner join
							   grupo_bpm.bpm_login log on pk.usuario = log.login_id inner join
							   grupo_bpm.bpm_pedido ped on pk.picking = ped.picking collate utf8_general_ci
				ORDER BY pk.picking;";

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