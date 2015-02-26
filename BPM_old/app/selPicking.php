<?php
require_once("../Conexion.php");

$conexion = connectDB();
			
$sqlPicking = "SELECT pk.picking, pk.fecha_picking, log.username, pk.observaciones, case pk.preparado when 0 then '' else 'Listo' end as preparado
					FROM grupo_bpm.bpm_picking pk inner join
							   grupo_bpm.bpm_login log on pk.usuario = log.login_id
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