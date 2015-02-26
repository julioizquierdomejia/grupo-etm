<?php
/*
session_start();
if(isset($_SESSION['usuario'])){
	echo "
		<div class='session'>
			<p>El nombre del usuario</p>
			<a href='datafiles/config/sesionclose.php'><img src='img/cerrarSesion.png'></a>
		</div>
	";
}
else{
}
*/
?>
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

	<!-- para el banner -->
	<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

    <!-- para el PageFlip-->
    <link href="css/booklet/jquery.booklet.latest.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
    <script type="text/javascript" src="js/include.js"></script>
    <script type="text/javascript" src="js/greensock/TweenMax.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <!-- fin del pageFlip -->


    <script type="text/javascript">
	    $(document).ready(function(){
	    	$('#slider').nivoSlider({
	        	effect:'sliceUpLeft',
	        	pauseTime: 6000
	        });

	        $("#mybook").booklet({
	        	pagePadding: 0,
                width: 936, //967
                height: 328, //348
                arrows: false,
                pageNumbers: false,
                nextControlTitle: 'Página siguiente',
                previousControlTitle: 'Página Anterior',
        		shadows: true,

            });

            var $botones = $('.botoneraCatalogo')
            var $inicio = $botones.find('#inicio')
            var $fin = $botones.find('#final')
            var $next = $botones.find('#siguiente')
            var $prev = $botones.find('#anterior')

			$inicio.click(function(e){
				e.preventDefault();
				$('#mybook').booklet("gotopage", 1);
			});

			$fin.click(function(e){
				e.preventDefault();
				$('#mybook').booklet("gotopage", 32);
			});

			$next.click(function(e){
				e.preventDefault();
				$('#mybook').booklet("next");
			});

			$prev.click(function(e){
				e.preventDefault();
				$('#mybook').booklet("prev");
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
		<a href="aficheInictel.php">
			<div class="banner-amarillo">
				<img src="img/banner/banner-amarillo.jpg">
			</div>
			<div class="banner-naranja">
				<img src="img/banner/banner-naranja.jpg">
			</div>
		</a>
		<!--	
		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            	<a href="jad.php"><img src="img/banner/jad.jpg" data-thumb="img/banner/jad.jpg" alt="JAD 2014w" /></a>
				<a href="feria.php"><img src="img/banner/6.jpg" data-thumb="img/banner/6.jpg" alt="¡Vamos a la feria!" /></a>				
            	<a href="jornadasDirectivas.php"><img src="img/banner/jornadasDirectivas.jpg" data-thumb="img/banner/jornadasDirectivas.jpg" alt="Jornadas Directivas" /></a>
            </div>
        </div>
        -->
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
            <div id="mybook">
                <div title="first page"></div>
					<div title="Pagina1"><div class="img"><img src="images/catalogo/1.jpg" alt="Pagina 1"/></div></div>
					<div title="Pagina2"><div class="img"><img src="images/catalogo/2.jpg" alt="Pagina 2"/></div></div>
					<div title="Pagina3"><div class="img"><img src="images/catalogo/3.jpg" alt="Pagina 3"/></div></div>
					<div title="Pagina4"><div class="img"><img src="images/catalogo/4.jpg" alt="Pagina 4"/></div></div>
					<div title="Pagina5"><div class="img"><img src="images/catalogo/5.jpg" alt="Pagina 5"/></div></div>
					<div title="Pagina6"><div class="img"><img src="images/catalogo/6.jpg" alt="Pagina 6"/></div></div>
					<div title="Pagina7"><div class="img"><img src="images/catalogo/7.jpg" alt="Pagina 7"/></div></div>
					<div title="Pagina8"><div class="img"><img src="images/catalogo/8.jpg" alt="Pagina 8"/></div></div>
					<div title="Pagina9"><div class="img"><img src="images/catalogo/9.jpg" alt="Pagina 9"/></div></div>
					<div title="Pagina10"><div class="img"><img src="images/catalogo/10.jpg" alt="Pagina 10"/></div></div>
					<div title="Pagina11"><div class="img"><img src="images/catalogo/11.jpg" alt="Pagina 11"/></div></div>
					<div title="Pagina12"><div class="img"><img src="images/catalogo/12.jpg" alt="Pagina 12"/></div></div>
					<div title="Pagina13"><div class="img"><img src="images/catalogo/13.jpg" alt="Pagina 13"/></div></div>
					<div title="Pagina14"><div class="img"><img src="images/catalogo/14.jpg" alt="Pagina 14"/></div></div>
					<div title="Pagina15"><div class="img"><img src="images/catalogo/15.jpg" alt="Pagina 15"/></div></div>
					<div title="Pagina16"><div class="img"><img src="images/catalogo/16.jpg" alt="Pagina 16"/></div></div>
					<div title="Pagina17"><div class="img"><img src="images/catalogo/17.jpg" alt="Pagina 17"/></div></div>
					<div title="Pagina18"><div class="img"><img src="images/catalogo/18.jpg" alt="Pagina 18"/></div></div>
					<div title="Pagina19"><div class="img"><img src="images/catalogo/19.jpg" alt="Pagina 19"/></div></div>
					<div title="Pagina20"><div class="img"><img src="images/catalogo/20.jpg" alt="Pagina 20"/></div></div>
					<div title="Pagina21"><div class="img"><img src="images/catalogo/21.jpg" alt="Pagina 21"/></div></div>
					<div title="Pagina22"><div class="img"><img src="images/catalogo/22.jpg" alt="Pagina 22"/></div></div>
					<div title="Pagina23"><div class="img"><img src="images/catalogo/23.jpg" alt="Pagina 23"/></div></div>
					<div title="Pagina24"><div class="img"><img src="images/catalogo/24.jpg" alt="Pagina 24"/></div></div>
					<div title="Pagina25"><div class="img"><img src="images/catalogo/25.jpg" alt="Pagina 25"/></div></div>
					<div title="Pagina26"><div class="img"><img src="images/catalogo/26.jpg" alt="Pagina 26"/></div></div>
					<div title="Pagina27"><div class="img"><img src="images/catalogo/27.jpg" alt="Pagina 27"/></div></div>
					<div title="Pagina28"><div class="img"><img src="images/catalogo/28.jpg" alt="Pagina 28"/></div></div>
					<div title="Pagina29"><div class="img"><img src="images/catalogo/29.jpg" alt="Pagina 29"/></div></div>
					<div title="Pagina30"><div class="img"><img src="images/catalogo/30.jpg" alt="Pagina 30"/></div></div>
					<div title="Pagina31"><div class="img"><img src="images/catalogo/31.jpg" alt="Pagina 31"/></div></div>
					<div title="Pagina32"><div class="img"><img src="images/catalogo/32.jpg" alt="Pagina 32"/></div></div>
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