<?php
require_once("../Conexion.php");

$conexion = connectDB();

$param_picking = $_GET["picking"];

$sqlPicking = "SELECT pick.picking, p.colegio, p.motivo, p.promotor, 
date_format(p.fecha_estimada_entrega, '%d/%m/%Y') as fecha_estimada_entrega, 
p.observaciones, prod.nivel, prod.coleccion, prod.producto, 
prod.id, pd.nivel_1 - ifnull(pd.desp_nivel_1, 0) saldo_nivel_1, pd.nivel_2 - ifnull(pd.desp_nivel_2, 0) saldo_nivel_2, 
pd.nivel_3 - ifnull(pd.desp_nivel_3, 0) saldo_nivel_3, pd.nivel_4 - ifnull(pd.desp_nivel_4, 0) saldo_nivel_4, 
pd.nivel_5 - ifnull(pd.desp_nivel_5, 0) saldo_nivel_5, pd.nivel_6 - ifnull(pd.desp_nivel_6, 0) saldo_nivel_6
FROM grupo_bpm.bpm_pedido p inner join 
		  grupo_bpm.bpm_picking pick on p.pedido = pick.pedido inner join 
		  grupo_bpm.bpm_pedido_detalle pd on p.pedido = pd.pedido inner join 
		  grupo_bpm.bpm_producto prod on pd.producto_id = prod.ID 
WHERE pick.picking = '$param_picking';";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlPicking)) die();

$picking = array();

$i=0;

while($row = mysqli_fetch_array($result)) 
{ 
	$picking[]=$row;
}
disconnectDB($conexion);

echo json_encode((object)$picking);
?>