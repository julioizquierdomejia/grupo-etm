<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Colecciones</title>

	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>	
	<script type="text/javascript" src="js/include.js"></script>
	<script type="text/javascript" src="js/Permisos.js"></script>
	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/skinColecciones.css">

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51056605-1', 'grupo-etm.com');
		ga('send', 'pageview');

	</script>

	
</head>
<body id="body">
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
	<div class="EnvolturaColecciones">
	
	<div class="baseAzul">
		<div class="baseTitulo">
			<h2>COMUNICACIÓN PRIMARIA</h2>
		</div>
		<div class="listaColecciones">
			<ul>
				<li>
					<img src="img/colecciones/primaria/comp/caratula1.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla1.php">Revisar contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/primaria/comp/caratula2.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla2.php">Revisar contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/primaria/comp/caratula3.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla3.php">Revisar contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/primaria/comp/caratula4.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla4.php">Revisar contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/primaria/comp/caratula5.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla5.php">Revisar contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/primaria/comp/caratula6.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="compla6.php">Revisar contenido</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="menuColecciones">
			<ul class="principal">
				<li class="barraVerde">
					<a href="coleccionesdvi.php"><img src="img/opcValoresI.png"></a>
				</li>
				<li class="activado">
					<a><img src="img/opcPrimariaA.png"></a>
					<ul class="subMenu">
						<li class="subMenuAzul"><a class="textoAzul subMenuActivo" >Comunicación Primaria</a></li>
						<li class="subMenuAzul"><a class="textoAzul" href="coleccionesmat.php" >Matemática</a></li>
					</ul>
				</li>
				<li class="barraNaranja">
					<a href="coleccionescoms.php"><img src="img/opcSecundariaI.png"></a>
				</li>
			</ul>
		</div>
	</div>
	
	</div>
</div>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</body>
</html>