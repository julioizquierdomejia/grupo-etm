<?php
include('../session.php');
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" href="../scripts/jquery-ui-1.11.2/jquery-ui.css">
    <link rel="stylesheet" href="../css/estilo1.css">
    
    <link rel="stylesheet" href="../cssmenu/styles.css">
    <script src="../cssmenu/script.js"></script>
    
    <script src="../scripts/jquery-2.1.3.js"></script>
    <script src="../scripts/jquery-ui-1.11.2/jquery-ui.js"></script>
    
    <script>
	
	$(function() {
		$( "#datepicker1,#datepicker2,#txtfechaentrega" ).datepicker({
		  showOtherMonths: true,
		  selectOtherMonths: true,
		  dateFormat:'dd/mm/yy',
		  showButtonPanel: true,
		  currentText: "Hoy",
		  autoSize: true,
		  beforeShow: function(){
			  $(".ui-datepicker").css('font-size', 10)
			  }
		});
	});
 
	
  $(function() {

    $( "#CrearHojaPicking" ).button().on( "click", function() {
		$.getJSON("insPicking.php?"+$("input[name='seleccion[]']:checked").serialize(), function(picking){
			$("#NroPicking").html(picking["Picking"]);
		});
			$("#dialog-message").dialog( "open" );
			CargaPicking();		
    });
	
	$( "#CerrarSesion" ).button().on("click", function(){
		location="../logout.php";
	});
		
	
	$( "#Filtros" ).submit(function( event ) {
	  event.preventDefault();
	});
	
	$( "#estado" ).selectmenu();
	$( "#accordion" ).accordion();
	
  });
		
    $(document).ready(function() {
		CargaPicking();	
		$("#refrescar").button().on("click", function(event){
			CargaPicking();
			});
	});
	
	$(document).on("click", "#CrearHojaPicking", function(){
		$( "#crearPedido" ).dialog( "option", "buttons",{
			"Crear Hoja Picking": addPedido,
			"Cancelar": function() {
			  $( "#crearPedido" ).dialog( "close" )
			}	
		});
	});
	
	function CargaPicking(){
		var url="selPicking.php";
		$("#pedidos tbody").html("");
		$.getJSON(url,function(pickings){
			$.each(pickings, function(i, picking){

				var newRow = 
				"<tr title='"+picking.picking+"'>"
				+"<td>"+picking.picking+"</td>"
				+"<td>"+picking.fecha_picking+"</td>"
				+"<td>"+picking.username+"</td>"
				+"<td>"+picking.observaciones+"</td>"
				+"<td>"+picking.preparado+"</td>"
				+"<td><img src='../images/imprimir.png' title='Hoja de picking' class='buttonPrint' id='"+picking.picking+"' name='Picking'><img src='../images/preparado.png' title = 'Preparado' id='Preparado' name = '"+picking.picking+"'></td>"
				+"</tr>";
				$(newRow).appendTo('#pedidos tbody');
				});
			});	
	}
	
	$(document).on("click", "#Preparado", function(){
		$.post("updPicking.php?picking="+$(this).attr("name"),function(){
			CargaPicking();
			});	
	});	
	
	$(document).on("click", ".buttonPrint", function(){
		window.open("hojapicking.php?picking="+$(this).attr("id"));		
	});

  </script>

  <style>

	body {
		font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
		/*font-size: 62.5%;*/
		font-size: 10px;
	}
	fieldset { padding:0; border:0; margin-top:25px; }
    select, span {
		width: 200px;
		vertical-align:middle;
    }
    .overflow {
		height: 200px;
    }
	input[type=text]{
		height:25px;
		width:150px;
		padding-left:10px;
	}
	.myfields label, .myfields input {
  		display:inline-block;
	}
	label{
  		font-weight:bold;
	}
    div#orders-contain { width: 90%; margin: 20px 0; }
    div#orders-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#orders-contain table td, div#orders-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	div#books-contain { width: 90%; margin: 20px 0; }
    div#books-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }

	/*.ui-selecting, .ui-selected { background: lightBlue; }*/
	.ui-dialog .ui-state-error { padding: .3em; }
	.ui-widget-content{ vertical-align:middle; }
	/*Revisar el diseño*/
	.ui-dialog-content, .ui-dialog-buttonpane{ background:#FFF !important; }
	
  </style>
    
</head>

<body>
<div style="position:relative; z-index:1000; width:150px; float:right; padding-right:20px;">

<div align="right" style="font-size:14px; color:white;"><p style="padding:0px; margin-bottom:5px;">Hola <?php echo $name_session;?></p><a href="../logout.php"><img src="../images/logout.png" style="vertical-align:middle">Cerrar Sesi&oacute;n</a>
</div>
</div>
<div id='cssmenu'>
<ul>
   <li><a href='#'>Home</a></li>
   <li><a href='ListadoPedidos.php'>Pedidos</a></li>
   <li><a href='Despacho.php'>Despacho</a></li>
   <li class='active'><a href='#'>Picking</a></li>
</ul>

</div>
<br><br>
<div align="center">
<div id="accordion" style="width:90%;">
<h3 align="left">Filtros</h3>
	<div class="myfields">
    <form id="Filtros">
    	<label for="datepicker1">Fecha Inicio:&nbsp;</label>
		<input type="text" name="FInicio" id="datepicker1" class="text ui-widget-content ui-corner-all" style="width:80px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
      	<label for="datepicker2">Fecha Fin:&nbsp;</label>
		<input type="text" name = "FFin" id="datepicker2" class="text ui-widget-content ui-corner-all" style="width:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <label for="estado">Estado:&nbsp;</label>
        <select name="estado" id="estado" style="width:120px;">
              <option></option>
              <option selected="selected">Aprobado</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <button id="refrescar">Filtrar</button>
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	</form>
</div>
</div>



<!---------------------LISTADO DE PEDIDOS-------------------------------------->
<div id="orders-contain" class="ui-widget" style="overflow:scroll; height:400px;">
  <table id="pedidos" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Picking</th>
        <th>Fecha Registro</th>
        <th>Usuario</th>
        <th>Observaciones</th>
        <th>Preparado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</div>
</body>
</html>