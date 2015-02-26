<?php
    session_start();

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

	if ($ref == "1")
	{
		$archivo = isset($_GET['archivo'])?$_GET['archivo']:'';
		$pagina = isset($_GET['pagina'])?$_GET['pagina']:'';
		$ruta = isset ($_GET['ruta'])?$_GET['ruta']:'';
		$tema = isset($_GET['tema'])?$_GET['tema']:'';
		$tipo = isset ($_GET['tipo'])?$_GET['tipo']:'';
		$titulo = isset($_GET['titulo'])?$_GET['titulo']:'';
		$unidad = isset($_GET['unidad'])?$_GET['unidad']:'';
		$libro = isset($_GET['libro'])?$_GET['libro']:'';
	}else
	{
		$archivo = utf8_encode(isset($_GET['archivo'])?$_GET['archivo']:'');
		$pagina = isset($_GET['pagina'])?$_GET['pagina']:'';
		$ruta = isset ($_GET['ruta'])?$_GET['ruta']:'';
		$tema = replaceAcute(isset($_GET['tema'])?$_GET['tema']:'');
		$tipo = isset ($_GET['tipo'])?$_GET['tipo']:'';
		$titulo = isset($_GET['titulo'])?$_GET['titulo']:'';
		$unidad = isset($_GET['unidad'])?$_GET['unidad']:'';
		$libro = isset($_GET['libro'])?$_GET['libro']:'';
	}


	if(isset($_SESSION['usuario'])){
		switch ($tipo) {
			case 'pdf':
				$iconUrl = "img/descargaPDFIcon.png";
				break;
			case 'ppt':
				$iconUrl = "img/descargaPPTIcon.png";
				break;
			default:
				$iconUrl = "";
				break;
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
	<link rel="stylesheet" type="text/css" href="css/skinDescargas.css">
	<style type="text/css">
	h1{
		color: white;
		font-size: 14px;
		margin: 3px 0 0 3px;
	}
	</style>

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
	<div class="EnvolturaLogin">

	<div class="lateralIzq">
		<div class="barrita"></div>
		<div class="barrita"></div>
		<div class="barrita"></div>
	</div>
	
	<section class="skinDescargas">
		<h1 id="tituloDescarga"><?php echo $titulo ?></h1>
		<image id="iconDescarga" src="<?php echo $iconUrl ?>"/>
		<span id="nombreArchivo" class="descargaInfo"><?php echo $archivo ?> <img src="img/clip.png" /></span>
		<span id="unidad" class="descargaInfo"><?php echo $unidad ?></span>
		<span id="temaYPagina" class="descargaInfo">Tema: <?php echo $tema ?>&nbsp;&nbsp;<img src="img/descargasSeparador.png" />&nbsp;&nbsp;<img src="img/librito.png" />&nbsp;&nbsp;P&aacute;gina <?php echo $pagina ?></span>
		<a href=<?php echo $ruta ?> download><image id="descargaBoton" class="descargaInfo" src="img/descargaBoton.png"/></a>
		<p id="importante">© ETM. Todos los derechos reservados.</p>
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