<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "grupo_bpm", "8jf#l-09Dtm");
//$connection = mysqli_connect("localhost", "root");
// Selecting Database
$db = mysqli_select_db($connection, "grupo_bpm");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select username, name from bpm_login where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$name_session =$row['name'];

if(!isset($login_session)){
	mysqli_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}else{
	if(!$priv_sql=mysqli_query($connection, "select accion from bpm_login l inner join bpm_login_accion la on l.login_id = la.login_id where username='$user_check'")) die(mysqli_error($connection));

	$privilegios = array();
	
	while($priv_row = mysqli_fetch_array($priv_sql)) 
	{ 
		$privilegios[] = $priv_row;
	}	
}

function ValidaPrivilegio($accion, $privilegios){
	if (array_search($accion, array_column($privilegios, 'accion'))!==false) {
		echo 'true';
	}else{
		echo 'false';
	}
}

function ValidaPrivilegio2($accion, $privilegios){
	if (array_search($accion, array_column($privilegios, 'accion'))!==false) {
		return true;
	}else{
		return false;
	}
}
?>