<?php
	
	$referer =  $_COOKIE['referer'];

    session_start(); //Esto inicia la sesión 
    if(isset($_SESSION['user'])) //Si existe la variable de sesión 'user': 
    { 
        $_SESSION['time']= time(); //Se crea la variable de sesión 'time' con el valor de time() (ejemplo: 1339168896) 
        if(isset($_SESSION['time'])) //Si existe la variable de sesión 'time': 
        { 
            $timeNow= time(); //Se asigna el valor de time() (ejemplo: 1339168963) a la variable timeNow 
            $timeCount= $timeNow - $_SESSION['time']; //Se le asigna a la variable timeCount el valor de la variable timeNow menos la variable de sesión 'time' (1339168963 - 1339168896 = 67 segundos) 

            if($timeCount>1200) //Si el valor de la variable timeCount es superior a 1200 (segundos, 20 minutos):  
            { 
                unset($_SESSION['user']); //Se destruye el valor de la variable de sesión 'user' 
                $_SESSION['error'] = 'Su sesion ha expirado. Ingrese nuevamente.'; //Se le asigna un mensaje de error a la variable de sesión 'error' 
            } 
        } 
    } 
    if(isset($_SESSION['error'])) //Si existe la variable de sesión 'error': 
    { 
        echo '<div id="error"><p>'.$_SESSION['error'].'</p></div>'; //Muestra un div con el mensaje de error contenido en la variable de sesión 'error' 
        unset($_SESSION['error']); //Destruye la variable de sesión 'error' 
    } 
    if(isset($_SESSION['user'])) //Si existe la variable de sesión 'user' 
    {  
        $_SESSION['time']= time(); //Se establece el valor time() de la variable de sesión 'time'.  
        //header('Location: http://julioizquierdomejia.com/clientes/estetica/home.php'); //Redirecciona a la carpeta 'home' 
        //header('Location: home.php'); //Redirecciona a la carpeta 'home' 

        if(isset($_COOKIE['referer']))
        {
        	unset($_COOKIE['referer']);
        	setcookie('referer', null, -1, '/');

        	echo "<script> window.history.go(-1);</script>";
        }
    } 
    else //si no existe la variable de sesión 'user' muestra el html siguiente: 
    { 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Grupo Editorial Tercer Milenio : LOGIN</title>

	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/include.js"></script>

	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--
	<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
	-->
	<script type="text/javascript">
	    $(function() {
	        $( "#dialog" ).dialog();
	    });

	    function CheckForm()
	    { 
	        var User= document.getElementById('inUser').value; //Se crea la variable User conteniendo el valor del input con id 'inUser' 
	        var Pass= document.getElementById('inPass').value; 
	        var errormsg= 'Debe completar: n' //Se crea un mensaje de error en la variable errormsg 
	        if(User == '') //Si la variable 'User' no tiene contenido: 
	            { 
	            var error= true; //crea la variable 'error' con valor verdadero (existe) 
	            var errormsg= errormsg + 'Nombre de Usuarion'; 
	            } 
	        if(Pass == '')
	            {
	            var error= true; 
	            var errormsg= errormsg + 'Contraseñan'; 
	            } 
	        if(error) //Si existe la variable 'error' (si el valor es verdadero, true): 
	        { 
	            alert(errormsg) //Muestra un mensaje de alerta con el contenido de la variable 'errormsg' 
	        } 
	        else //sino 
	        { 
	            document.getElementById('loginForm').submit(); //Hace un submit en el form con id 'loginForm' 
	        } 
	    }

	    
	</script>
</head>
<body>
<header>
	<div class="cabecera">
		<div class="logo"><img src="img/logo.jpg"></div>
		<nav>
			<?php include 'menu.php'; ?>
		</nav>
		<div class="tituloRedes"><span>síguenos en:</span></div>
		<div class="redes">
			<a href="#" class="redSocial"><div><img src="img/fbPie.png"></div></a>
			<a href="https://www.youtube.com/channel/UCsjukXOlvgybQ-SFNhDd72Q" class="redSocial"><div><img src="img/ytPie.png"></div></a>
			<a href="http://www.saladeprofesoresetm.blogspot.com" class="redSocial"><div><img src="img/bgPie.png"></div></a>
		</div>
	</div>
</header>
<div class="divisor"></div>
<div class="envoltura">
	<div class="EnvolturaLogin">

	<div class="cabeceraLogin">
		<div class="carpetaAlumno">
			<img src="img/carpetaDelAlumno.png">
		</div>
		<div class="infoLogin">
			Accede a tu carpeta ingresando el usuario y contraseña asignado a tu colegio.
		</div>
	</div>

	<div class="lateralIzq">
		<div class="barrita"></div>
		<div class="barrita"></div>
		<div class="barrita"></div>
	</div>
	
	<form action="datafiles/config/login.php" method="POST" id="loginForm"> 
        <table class="tablaForm">
        	<!--<span class="tituloForm">Login</span>-->
            <tr> 
                <td class="labels">Usuario: </td> 
                <td class="fields"><input type="text" name="inUser" maxlength="32" autocomplete="off" id="inUser" style="width:250px" placeholder="Usuario" /></td> 
            </tr> 
            <tr> 
                <td class="labels">Contrase&ntilde;a:</td> 
                <td class="fields"><input type="password" name="inPass" maxlength="32" id="inPass" style="width:250px" placeholder="Contraseña" /></td> 
            </tr> 
            <tr> 
            	<td></td>
                <td colspan="2"><input type="button" value="Ingresar" id="inForm" onclick="CheckForm()" /></td>
            </tr>
        </table> 
    </form>

	<div class="lateralDer">
		<div class="barrita"></div>
		<div class="barrita"></div>
		<div class="barrita"></div>
	</div>
		
	</div>
</div>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</body>
</html>

<?php } ?>