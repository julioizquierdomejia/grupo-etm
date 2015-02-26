<?php 
	session_start();

	if(isset($_SESSION['usuario'])){

		function replaceAcute($str)
		{
			$str = ucfirst(strtolower(utf8_encode($str)));
			$search = array('Á','É','Í','Ó', 'Ú', 'Ñ','¡f','n?', '[aconacento]', '[econacento]', '[iconacento]', '[oconacento]', '[uconacento]', '[nconacento]', '[admini]', '[uce]', '[errem]', '[ticsm]', '[pmay]', '[miocid]','[qmay]','[gmay]', '[ui]', '[jmay]', '[pmay]','[imayacento]', '[amay]', '[bmp]', '[umay]', '[dmay]', '[mmay]', '[vmay]', '[bmay]', '[cmay]', '[amayacento]', '[wmay]', '[comi]', '[smay]', '[apos]', '[emay]');
			$replace = array('á','é','í','ó','ú','ñ', '¡F','ñ', '&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&iexcl;F', 'E', 'R', 'TIC', 'P', 'M&iacute;o Cid', 'Q', 'G', 'üi', 'J', 'P', 'Í', 'A', 'B, M y P', 'U', 'D', 'M', 'V', 'B', 'C', 'Á', 'W', '&quot;', 'S', '&apos;','E');
			
			return str_replace($search, $replace, $str);
		}
		
		function replaceEne($str)
		{
			$str = ucfirst(strtolower(utf8_encode($str)));
			$search = array('n?', 'e?', 'américa', '[aconacento]', '[econacento]', '[iconacento]', '[oconacento]', '[nconacento]', '[admini]', '[uce]', '[errem]', '[ticsm]', '[pmay]', '[miocid]','[qmay]','[gmay]', '[ui]', '[jmay]', '[pmay]','[imayacento]', '[amay]', '[bmp]', '[umay]', '[dmay]', '[mmay]', '[vmay]', '[bmay]', '[cmay]', '[amayacento]', '[wmay]', '[comi]', '[smay]', '[apos]', '[emay]');
			$replace = array('ñ','é' ,'América', '&aacute;', '&eacute;', '&iacute;', '&oacute;', '&ntilde;', '&iexcl;F', 'E', 'R', 'TIC', 'P', 'M&iacute;o Cid', 'Q', 'G', 'üi', 'J', 'P', 'Í', 'A', 'B, M y P', 'U', 'D', 'M', 'V', 'B', 'C', 'Á', 'W', '&quot;', 'S', '&apos;','E');
			
			return str_replace($search, $replace, $str);
		}

		$ref = isset($_GET['ref'])?$_GET['ref']:'0';

		if($ref == "1")
		{
			$archivo = replaceEne(isset($_GET['archivo'])?$_GET['archivo']:'');
			$pagina = isset($_GET['pagina'])?$_GET['pagina']:'';
			$id = isset ($_GET['id'])?$_GET['id']:'';
			$tema = replaceEne(isset($_GET['tema'])?$_GET['tema']:'');
			$titulo = isset($_GET['titulo'])?$_GET['titulo']:'';
			$unidad = isset($_GET['unidad'])?$_GET['unidad']:'';
			$libro = isset($_GET['libro'])?$_GET['libro']:''; 
		} else
		{
			$archivo = replaceAcute(isset($_GET['archivo'])?$_GET['archivo']:'');
			$pagina = isset($_GET['pagina'])?$_GET['pagina']:'';
			$id = isset ($_GET['id'])?$_GET['id']:'';
			$tema = replaceAcute(isset($_GET['tema'])?$_GET['tema']:'');
			$titulo = isset($_GET['titulo'])?$_GET['titulo']:'';
			$unidad = isset($_GET['unidad'])?$_GET['unidad']:'';
			$libro = isset($_GET['libro'])?$_GET['libro']:'';
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Grupo Editorial Tercer Milenio</title>

	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/include.js"></script>
	<script type="text/javascript" src="js/Permisos.js"></script>
	<script>
		$(document).ready(function(e)
		{
			$("body").hide();

			var permisos = new Permisos();
			permisos.verificarPermisos("<?php echo $_SESSION['usuario']; ?>","<?php echo $libro; ?>");
		});
	</script>	
	
	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/skinVideo.css">
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
		<h1 id="tituloVideo"><?php echo $titulo ?></h1>
		<div id="contenidoVideo">
			<iframe class="video" type='text/html' width="569" height="319" src="//www.youtube.com/embed/<?php echo $id ?>" frameborder="2"></iframe>
			<span id="nombreArchivo"><img src="img/camarita.png" />&nbsp;<?php echo $archivo ?></span>
			<div class="infoVideo">
				<span id="unidad" class="videoInfo"><?php echo $unidad ?></span>
				<span id="temaYPagina" class="videoInfo">Tema: <?php echo $tema; ?>&nbsp;&nbsp;<img src="img/descargasSeparador.png" />&nbsp;&nbsp;<img src="img/librito.png" />&nbsp;&nbsp;P&aacute;gina <?php echo $pagina ?></span>				
			</div>
			
			<p id="importante"><b>IMPORTANTE:</b> El documento que vas a descargar es propiedad intelectual de ETM Editorial Tercer Milenio y está prohibida la reproducción total o parcial sin permiso escrito de la editorial.</p>
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
<?php 
	}
	else{
		$expire=time()+60*60*24*30; 
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&ref=1"; 
		setcookie("referer", $actual_link, $expire); 

		header('Location:http://grupo-etm.com/login.php'); 
	}
?>