<?php session_start();
include('sqlData.php');
if(!isset($_SESSION['usuario']))
{
	//echo "No hay ninguna sesion iniciada";
	//esto ocurre cuando la sesion caduca.
	header('Location:http://grupo-etm.com/index.php'); //Redirecciona a la carpeta 'home'
}
else
{
	session_destroy();
	//echo "Has cerrado la sesion";
	//echo "<meta content='0;URL=index.php?content=Formularioresgistro.php' http-equiv='REFRESH'> </meta>";
	header('Location:http://grupo-etm.com/index.php'); //Redirecciona a la carpeta 'home'
}
?>