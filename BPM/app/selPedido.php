<?php
require_once("../Conexion.php");

$conexion = connectDB();

$param_pedido = $_GET["pedido"];
//$param_tipo = $_GET["tipo"];

//if ($param_tipo=="Pedido")

	$sqlPedidos = "SELECT p.pedido, p.colegio, p.motivo, p.promotor, date_format(p.fecha_estimada_entrega, '%d/%m/%Y') as fecha_estimada_entrega, p.observaciones, prod.nivel, prod.coleccion, prod.producto, prod.id, pd.nivel_1, pd.nivel_2, pd.nivel_3, pd.nivel_4, pd.nivel_5, pd.nivel_6, ifnull(desp_nivel_1, 0) saldo_nivel_1, ifnull(desp_nivel_2, 0) saldo_nivel_2, ifnull(desp_nivel_3, 0) saldo_nivel_3, ifnull(desp_nivel_4, 0) saldo_nivel_4, ifnull(desp_nivel_5, 0) saldo_nivel_5, ifnull(desp_nivel_6, 0) saldo_nivel_6 FROM grupo_bpm.bpm_pedido p left outer join grupo_bpm.bpm_pedido_detalle pd on p.pedido = pd.pedido left outer join grupo_bpm.bpm_producto prod on pd.producto_id = prod.ID WHERE p.pedido = '$param_pedido';";
	
//if ($param_tipo=="Despacho")

//	$sqlPedidos = "CALL grupo_bpm.usp_sel_PedidoSaldos('$param_pedido');";

mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, $sqlPedidos)) die(mysqli_error($conexion));

$pedidos = array();

$i=0;

while($row = mysqli_fetch_array($result)) 
{ 
	$pedidos[]=$row;
}
disconnectDB($conexion);

echo json_encode((object)$pedidos);
?>