<?php
	session_start();
	require_once 'sqlConnection.php'; //Requiere el archivo 'SqlConnection.php 
    include('sqlData.php');

    if(isset($_SESSION['user']))
    {
    	$user = $_POST['user'];
    	$libro = strtoupper($_POST['libro']);

    	$sqlSyntax= 'SELECT * FROM users WHERE user_username = "'.$user.'" AND '.$libro.' = "a"';
   		$sqlQuery= mysql_query($sqlSyntax);
   		$sqlRow= mysql_num_rows($sqlQuery);

   		if($sqlRow==1)
   		{
   			echo true;
   		} else
      {
        echo false;
      }
    }
 else
      {
        echo false;
      }
?>