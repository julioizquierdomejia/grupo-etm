<?php
	session_start();

	$url = "treeComs.xml";

	if(isset($_SESSION['usuario'])){

	$xml = simplexml_load_file($url);
	$title = $xml->attributes()->title;
	$tree = "<ul id='red' class='filetree'>";

	foreach($xml->libro as $libro)
	{
		$libro_title = $libro->attributes()->title;
		$tree .= "<li class='libro'><img src='img/treeSeparador.png'/><span class='folder'>".$libro_title."</span><ul>";

		foreach ($libro->unidad as $unidad)
		{
			$unidad_title = $unidad->attributes()->title;
			$tree .= "<li class='unidad'><span>".$unidad_title."</span><ul>";

			foreach ($unidad->file as $file)
			{
				$file_title = $file->attributes()->title;
				$file_link = $file->attributes()->url;
				$file_tipo = $file->attributes()->tipo;
				$tree .= "<li><a href='".$file_link."''><span class='".$file_tipo."'>".$file_title."&nbsp;&nbsp;&nbsp;<img src='img/treeDescargar.png'/></span></a></li>";
			}

			$tree .= "</ul></li>";
		}

		$tree .= "</ul></li>";
	}

	$tree .= "</ul>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Grupo Editorial Tercer Milenio</title>

	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/include.js"></script>
	<script src="js/jquery.cookie.js" type="text/javascript"></script>
	<script src="js/jquery.treeview.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/skinValores.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.treeview.css">
	<!--
	<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
	-->
	<script type="text/javascript">
	    $(function() {
	        $( "#dialog" ).dialog();
	    });

	    $(document).ready(function(){
	
			// third example
			$("#red").treeview({
				animated: "fast",
				collapsed: true,
				unique: true,
				persist: "cookie",
				toggle: function() {
					window.console && console.log("%o was toggled", this);
				}
			});
		});
	</script>

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
	<div class="main">

	<div class="lateralIzq">
		<div class="barrita"></div>
		<div class="barrita"></div>
		<div class="barrita"></div>
	</div>
	
	<section class="skinValores">
		<h1 id="tituloValores"><?php echo $title; ?></h1>
		<div id="envolturaTree">
			<?php echo $tree; ?>
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
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		setcookie("referer", $actual_link, $expire);

		header('Location:http://grupo-etm.com/login.php');
	}
?>