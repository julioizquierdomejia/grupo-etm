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
			<a href="#" class="redSocial"><div><img src="img/ytPie.png"></div></a>
			<a href="#" class="redSocial"><div><img src="img/bgPie.png"></div></a>
		</div>
	</div>
</header>
<div class="divisor"></div>
<div class="envoltura">
	<div class="EnvolturaColecciones">
	
	<div class="baseVerde">
		<div class="baseTitulo">
			<h2>DESCUBRIR VALORES INICIAL</h2>
		</div>
		<div class="listaColecciones">
			<ul>
				<li>
					<img src="img/colecciones/valores/dvi/caratula1.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="dvi3.php">Revisar Contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/valores/dvi/caratula2.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="dvi4.php">Revisar Contenido</a>
					</div>
				</li>
				<li>
					<img src="img/colecciones/valores/dvi/caratula3.jpg">
					<div class="verLibro">
						<img src="img/librito.png">
						<a href="dvi5.php">Revisar Contenido</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="menuColecciones">
			<ul class="principal">
				<li class="activado">
					<img src="img/opcValoresA.png">
					
					<ul class="subMenu">
						<li class="subMenuVerde"><a class="textoVerde subMenuActivo">Descubrir Valores Inicial</a></li>
						<li class="subMenuVerde"><a class="textoVerde" href="coleccionesdvs.php">Descrubrir Valores Secundaria</a></li>
					</ul>
					
				</li>
				<li class="barraAzul">
					<a href="coleccionescomp.php"><img src="img/opcPrimariaI.png"></a>
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