<?php

function connectDB(){

//        $server = "localhost";
//        $user = "root";
//        $pass = "";
//        $bd = "";
		
		$server = "localhost";
        $user = "grupo_bpm";
        $pass = "8jf#l-09Dtm";
        $bd = "";

    $conexion = mysqli_connect($server, $user, $pass) or die("Ha ocurrido un error en la conexión con la BD");
//    $conexion = mysqli_connect($server, $user) or die("Ha ocurrido un error en la conexión con la BD");

    return $conexion;
}


function disconnectDB($conexion){
 
    $close = mysqli_close($conexion);
 
/*        if($close){
            echo 'La desconexion de la base de datos se ha hecho satisfactoriamente
';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos
';
        }   
*/
    return $close;
}

?>