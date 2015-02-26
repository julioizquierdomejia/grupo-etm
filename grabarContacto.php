<?php 
	require_once 'datafiles/config/sqlConnection.php'; //Requiere el archivo 'SqlConnection.php 

	/////////////////////
	$sdate = date("d")."/".date("m")."/".date("Y");
	$hora = date("h").":".date("i").":".date("s");
	/////////////////////

	$nombres = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$correo = $_POST["correo"];
	$comentario = $_POST["comentario"];
	

	$query = 'SELECT * FROM contactos';
	//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	$sqlContacto = "INSERT INTO contactos
		(
			nombres,
			apellidos,
			correo,
			mensaje,
			fecha,
			hora,
			estado
		)
		VALUES 
		(
			'$nombres',
			'$apellidos',
			'$correo',
			'$comentario',
			'$sdate',
			'$hora',
			'Activo'
		)";
	
	mysql_query($sqlContacto);

	header('Location:contactos.php');
	
?>