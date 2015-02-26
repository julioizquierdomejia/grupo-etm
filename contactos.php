<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Grupo Editorial Tercer Milenio</title>

	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/include.js"></script>
	<script type="text/javascript" src="js/Permisos.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/skinVideo.css">
	<link rel="stylesheet" type="text/css" href="css/skinContacto.css">
	<!--
	<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
	-->

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51056605-1', 'grupo-etm.com');
		ga('send', 'pageview');

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
	<div class="EnvolturaVideo">

	<div class="lateralIzq">
		<div class="barrita"></div>
		<div class="barrita"></div>
		<div class="barrita"></div>
	</div>
	
	<section class="skinVideo">
		<h1 class="tituloSeccion">Contáctanos</h1>
		<div id="contenidoContacto">
			<div class="imagenContacto">
				<img src="img/imgcontacto.jpg">
			</div>
			<div class="formulario">
				<h2>Déjanos un comentario</h2>
				<form action="grabarContacto.php" method="post">
					<input type="text" name="nombre" placeholder="Nombres" required> </br>
					<input type="text" name="apellidos" placeholder="Apellidos" required></br>
					<input type="text" name="correo" placeholder="Correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required></br>
					<textarea name="comentario" placeholder="Ingresa tu comentario o consulta" required></textarea></br>
					<input type="submit" value="Enviar">
				</form>
			</div>
		</div>
	</section>

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