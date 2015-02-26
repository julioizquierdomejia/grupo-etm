<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>Grupo Editorial Tercer Milenio</title>
	<link rel="stylesheet" type="text/css" href="css/normalizr.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--
	<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
	-->

	<script type="text/javascript" src='js/greensock/TweenMax.min.js'></script>
	<script type="text/javascript" src='js/greensock/easing/EasePack.min.js'></script>

	<!-- para el banner -->
	<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

    <!-- para el PageFlip Tunr-->
	<script type="text/javascript" src='js/lib/turn.min.js'></script>
	<script type="text/javascript" src="js/lib/hash.js"></script>
	<!-- Fin dePageFlip Tunr-->

	<style type="text/css">
	#flipbook .shadow,
	#flipbook.shadow{
	  -webkit-box-shadow: 0 4px 10px #666;
	  -moz-box-shadow: 0 4px 10px #666;
	  -ms-box-shadow: 0 4px 10px #666;
	  -o-box-shadow: 0 4px 10px #666;
	  box-shadow: 0 4px 10px #666;
	}
	</style>

    <script type="text/javascript">
	    $(document).ready(function(){

	    	$('#slider').nivoSlider({
	        	effect:'sliceUpLeft',
	        	pauseTime: 6000
	        });

	    	$("#flipbook").addClass('animated');

	        $("#flipbook").turn({
				width: 940,
				height: 665,
				autoCenter: false,
				gradients: true,
				elevation: 250,
				duration: 1000,
				pages: 40
			});

	    	
            var $botones = $('.botoneraCatalogo')
            var $inicio = $botones.find('#inicio')
            var $fin = $botones.find('#final')
            var $next = $botones.find('#siguiente')
            var $prev = $botones.find('#anterior')

			$inicio.click(function(e){
				e.preventDefault();
				//$('#mybook').booklet("gotopage", 1);
				$("#flipbook").turn("page", 1);
			});

			$fin.click(function(e){
				e.preventDefault();
				//$('#mybook').booklet("gotopage", 32);
				$("#flipbook").turn("page", 40);
			});

			$next.click(function(e){
				e.preventDefault();
				//$('#mybook').booklet("next");
				$("#flipbook").turn("next");
			});

			$prev.click(function(e){
				e.preventDefault();
				//$('#mybook').booklet("prev");
				$("#flipbook").turn("previous");
			});

			$inicio.hover(function(){document.body.style.cursor='pointer';},function(){document.body.style.cursor='default';})
			$fin.hover(function(){document.body.style.cursor='pointer';},function(){document.body.style.cursor='default';})
			$prev.hover(function(){document.body.style.cursor='pointer';},function(){document.body.style.cursor='default';})
			$next.hover(function(){document.body.style.cursor='pointer';},function(){document.body.style.cursor='default';})
			
	    })

    </script>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51056605-1', 'grupo-etm.com');
		ga('send', 'pageview');

	</script>

    <!-- para el banner -->

    <style type="text/css">
    .nivo-controlNav{
		margin-top: -55px;
		z-index: 5;
		position: relative;
    }

    /*body {background:#ccc; font:normal 12px/1.2 arial, verdana, sans-serif;}*/
        .flip{background: transparent url('images/img_fondo_flip.jpg') bottom center no-repeat;padding-bottom: 24px;overflow: hidden;}
        .page{overflow: hidden;}
        .page img{display: block}

    </style>

    

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
	<div class="banner">
		<!--
		<a href="aficheInictel.php">
			<div class="banner-naranja">
				<img src="img/banner/banner-naranja.jpg" width="967" height="372">
			</div>
			<div class=".banner-amarillo">
				<img src="img/banner/banner-amarillo.jpg" width="967" height="372">
			</div>
		</a>
		-->
		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            	<a href="foto2.php"><img src="img/banner/foto2.jpg" data-thumb="img/banner/foto2.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
				<a href="foto68.php"><img src="img/banner/foto68.jpg" data-thumb="img/banner/foto68.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="foto83.php"><img src="img/banner/foto83.jpg" data-thumb="img/banner/foto83.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="foto106.php"><img src="img/banner/foto106.jpg" data-thumb="img/banner/foto106.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="foto129.php"><img src="img/banner/foto129.jpg" data-thumb="img/banner/foto129.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="robotica.php"><img src="img/banner/robotica.jpg" data-thumb="img/banner/robotica.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="aiec.php"><img src="img/banner/aiec.jpg" data-thumb="img/banner/aiec.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            	<a href="LaUnion.php"><img src="img/banner/fotoLaUnion.jpg" data-thumb="img/banner/fotoLaUnion.jpg" alt="Lanzamiento comercial ETM 2015" /></a>
            </div>
        </div>
	</div>
	<div id="htmlcaption" class="nivo-html-caption">
		<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
	</div>
	<div class="noticias">
		<div class="tituloNoticias">
			<h6>NOTICIAS</h6>
			<img src="img/flechaNoticias.png">
		</div>
		<div class="noticiasSlider">
			<div class="fi"><img src="img/flechaIzqNoticiasSlider.png"></div>
				<div class="noticia">
					<h2>ETM en nueva sede </h2>
					<p>Nos preparamos cada día más para ofrecerles no solo colecciones de alta calidad en contenido y presentación sino [...]</p>
					<a href="nuevaSede.php" class="botonNoticias">Leer más</a>
				</div>
			<div class="fd"><img src="img/flechaDerNoticiasSlider.png"></div>
		</div>
		<div class="tituloBlog">
			<h5>SALA DE</h5>
			<h6>PROFESORES</h6>
			<a href="http://www.saladeprofesoresetm.blogspot.com" class="botonBlog">Visita nuestro blog</a>
		</div>
	</div>

	<div class="catalogo">
	<div class="botoneraCatalogo">
		<div class="botonirA" id="inicio">Ir al inicio</div>
		<div class="botonirA" id="anterior"><img src="img/catalogoAnterior.jpg"></div>
		<div class="botonirA" id="siguiente"><img src="img/catalogoSiguiente.jpg"></div>
		<div class="botonirA" id="final">ir al final</div>
	</div>
	<img id='cabeceraCatalogo' src="img/cabeceraCatalogo.jpg">
	
		<section class="flip">
			<div class="magazine-viewport">
				<div class="container">
		            <div id="flipbook">
						<div><img src="images/catalogo/2015/1.jpg"></div>
						<div><img src="images/catalogo/2015/2.jpg"></div>
						<div><img src="images/catalogo/2015/3.jpg"></div>
						<div><img src="images/catalogo/2015/4.jpg"></div>
						<div><img src="images/catalogo/2015/5.jpg"></div>
						<div><img src="images/catalogo/2015/6.jpg"></div>
						<div><img src="images/catalogo/2015/7.jpg"></div>
						<div><img src="images/catalogo/2015/8.jpg"></div>
						<div><img src="images/catalogo/2015/9.jpg"></div>
						<div><img src="images/catalogo/2015/10.jpg"></div>
						<div><img src="images/catalogo/2015/11.jpg"></div>
						<div><img src="images/catalogo/2015/12.jpg"></div>
						<div><img src="images/catalogo/2015/13.jpg"></div>
						<div><img src="images/catalogo/2015/14.jpg"></div>
						<div><img src="images/catalogo/2015/15.jpg"></div>
						<div><img src="images/catalogo/2015/16.jpg"></div>
						<div><img src="images/catalogo/2015/17.jpg"></div>
						<div><img src="images/catalogo/2015/18.jpg"></div>
						<div><img src="images/catalogo/2015/19.jpg"></div>
						<div><img src="images/catalogo/2015/20.jpg"></div>
						<div><img src="images/catalogo/2015/21.jpg"></div>
						<div><img src="images/catalogo/2015/22.jpg"></div>
						<div><img src="images/catalogo/2015/23.jpg"></div>
						<div><img src="images/catalogo/2015/24.jpg"></div>
						<div><img src="images/catalogo/2015/25.jpg"></div>
						<div><img src="images/catalogo/2015/26.jpg"></div>
						<div><img src="images/catalogo/2015/27.jpg"></div>
						<div><img src="images/catalogo/2015/28.jpg"></div>
						<div><img src="images/catalogo/2015/29.jpg"></div>
						<div><img src="images/catalogo/2015/30.jpg"></div>
						<div><img src="images/catalogo/2015/31.jpg"></div>
						<div><img src="images/catalogo/2015/32.jpg"></div>
						<div><img src="images/catalogo/2015/33.jpg"></div>
						<div><img src="images/catalogo/2015/34.jpg"></div>
						<div><img src="images/catalogo/2015/35.jpg"></div>
						<div><img src="images/catalogo/2015/36.jpg"></div>
						<div><img src="images/catalogo/2015/37.jpg"></div>
						<div><img src="images/catalogo/2015/38.jpg"></div>
						<div><img src="images/catalogo/2015/39.jpg"></div>
						<div><img src="images/catalogo/2015/40.jpg"></div>
					</div>
				</div>
			</div>
        </section>
		<!--<img src="img/pagaFlipFondo.png">-->
	</div>


	<div class="carpetas">
		<div class="carpeta">
			<div class="gorritoCarpeta"></div>
			<h4 class="subTituloCarpeta">EDUCACIÓN</h4>
			<h5 class="tituloCarpeta">EN VALORES</h5>
			<a href="dviaudios.php" class="ver1">Ver actividades DVI<img src="img/iconoVerMas.png"></a>
			<a href="valores.php" class="ver2">Ver actividades DVS<img src="img/iconoVerMas.png"></a>
		</div>
		<div class="carpeta">
			<div class="gorritoCarpeta"></div>
			<h4 class="subTituloCarpeta">EDUCACIÓN</h4>
			<h5 class="tituloCarpeta">PRIMARIA</h5>
			<a href="comp.php" class="ver1">Ver actividades COMP<img src="img/iconoVerMas.png"></a>
		</div>
		<div class="carpeta">
			<div class="gorritoCarpeta"></div>
			<h4 class="subTituloCarpeta">EDUCACIÓN</h4>
			<h5 class="tituloCarpeta">SECUNDARIA</h5>
			<a href="coms.php" class="ver1">Ver actividades COMS<img src="img/iconoVerMas.png"></a>
		</div>
	</div>

</div>
<footer>
	<?php include 'footer.php'; ?>
</footer>
</body>
</html>