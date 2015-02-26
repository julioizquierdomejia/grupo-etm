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
	  
	  var formConsulta;
/*
    $( "#CrearHojaPicking" ).button().on( "click", function() {
		$.getJSON("insPicking.php?"+$("input[name='seleccion[]']:checked").serialize(), function(picking){
			$("#NroPicking").html(picking["Picking"]);
		});
			$("#dialog-message").dialog( "open" );
			CargaPicking();		
    });
	*/
	$( "#CerrarSesion" ).button().on("click", function(){
		location="../logout.php";
	});
		
		
	$( "#DespacharPedido" ).dialog({
		  autoOpen: false,
		  height: 600,
		  width: 1000,
		  modal: true,
		  buttons: {
			  "Registrar Despacho Parcial": DespachoParcial,
			  "Cerrar": function() {
				$( this ).dialog( "close" );
			  }
			},
		  close: function() {
			formConsulta[ 0 ].reset();
			$("#books-contain tbody").html("");
			//allFields.removeClass( "ui-state-error" );
		  }
	});		
	
	formConsulta = $( "#DespacharPedido" ).find( "form" ).on( "submit", function( event ) {
		  event.preventDefault();
	});
	
	$( "#Filtros" ).submit(function( event ) {
	  event.preventDefault();
	});
	
	$( "#estado" ).selectmenu();
	$( "#despacho" ).selectmenu();
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
		var url="selPicking.php?"+$("#Filtros").serialize();
		$("#pedidos tbody").html("");
		$.getJSON(url,function(pickings){
			$.each(pickings, function(i, picking){

				var newRow = 
				"<tr title='"+picking.picking+"'>"
				+"<td>"+picking.picking+"</td>"
				+"<td>"+picking.fecha_picking+"</td>"
				+"<td>"+picking.username+"</td>"
				+"<td>"+picking.pedido+"</td>"
				+"<td>"+picking.colegio+"</td>"
				+"<td>"+picking.motivo+"</td>"
				+"<td><input type='checkbox' disabled "+picking.prep+"></td>"
				+"<td><input type='checkbox' disabled "+picking.desp+"></td>"
				+"<td><img src='../images/imprimir.png' title='Hoja de picking' class='buttonPrint' id='"+picking.picking+"' name='Picking'>";
				if (picking.prep != "checked")
				newRow = newRow + "<img src='../images/preparado.png' title = 'Preparado' id='Preparado' name = '"+picking.picking+"'></td>";
				else {
					if (picking.desp == "")
				newRow = newRow + "<img src='../images/despacho_parcial.png' title = 'Despacho Parcial' id= 'Despacho_Parcial' name = '"+picking.picking+"'><img src='../images/despacho.png' title = 'Despacho Total' id='Despacho_Total' name = '"+picking.picking+"'></td>";
				}
				newRow = newRow + "</tr>";
				$(newRow).appendTo('#pedidos tbody');
				});
			});	
	}
	
	
	$(document).on("click", "#Preparado", function(){
		$.post("updPicking.php?picking="+$(this).attr("name"),function(){
			CargaPicking();
			});	
	});	
	
	$(document).on("click", "#Despacho_Parcial", function(){
		$("#DespachoLibros tbody").html("");
		$.getJSON("selPickingDetalle.php?picking="+$(this).attr("name"),function(pedidos){
			$.each(pedidos, function(i, pedido){
				
				if (i = 1){
					$("#picking").val(pedido.picking);
					$("#txtcolegio").val(pedido.colegio);
					$("#selmotivo").val(pedido.motivo);
					$("#selpromotor").val(pedido.promotor);
					$("#txtfechaentrega").val(pedido.fecha_estimada_entrega);
					$("#txtobservaciones").val(pedido.observaciones);
				}
				var newRow = "<tr>"
				+"<td>"+pedido.nivel+"</td>"
				+"<td>"+pedido.coleccion+"</td>"
				+"<td>"+pedido.producto+"<input type='hidden' value='"+pedido.id+"' name = 'producto[]'></td>"
				if (pedido.saldo_nivel_1>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_1+"</td>"+
					"<td><input name = 'nivel_1[]' type='number' min=0 max="+pedido.saldo_nivel_1+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_1[]' type='hidden' width='20px' value='0'></td>";	
				if (pedido.saldo_nivel_2>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_2+"</td>"+
					"<td><input name = 'nivel_2[]' type='number' min=0 max="+pedido.saldo_nivel_2+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_2[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.saldo_nivel_3>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_3+"</td>"+
					"<td><input name = 'nivel_3[]' type='number' min=0 max="+pedido.saldo_nivel_3+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_3[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.saldo_nivel_4>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_4+"</td>"+
					"<td><input name = 'nivel_4[]' type='number' min=0 max="+pedido.saldo_nivel_4+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_4[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.saldo_nivel_5>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_5+"</td>"+
					"<td><input name = 'nivel_5[]' type='number' min=0 max="+pedido.saldo_nivel_5+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_5[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.saldo_nivel_6>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.saldo_nivel_6+"</td>"+
					"<td><input name = 'nivel_6[]' type='text' min=0 max="+pedido.saldo_nivel_6+" value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td>"+
					"<td><input name = 'nivel_6[]' type='hidden' width='20px' value='0'></td>";
				newRow = newRow +"</tr>"
				$(newRow).appendTo('#DespachoLibros tbody');
			});
			
		$("#DespacharPedido").dialog("open");
		});	
		
	});	
	
	$(document).on("click", "#Despacho_Total", function(){
		$.post("insPickingTotal.php?picking="+$(this).attr("name"),function(){
			CargaPicking();
			});	
	});	
	
	$(document).on("click", ".buttonPrint", function(){
		window.open("hojapicking.php?picking="+$(this).attr("id"));		
	});
	
	function DespachoParcial(){
		$.post("insPickingParcial.php?"+$("#frmPedido").serialize(),function(data){
			if (data == "success"){
				$("#DespacharPedido").dialog("close");
				CargaPicking();
			}
			else
			{
				alert("Se ha presentado un error al momento de registrar el despacho parcial. Comuniquese con su administrador de sistema \n\nError: "+data);
				}
		});
	}

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
	
	table#DespachoLibros tbody td input{
		height:25px;
		width:40px;
		padding-left:5px;
		padding-right:2px;
		text-align:right;
	}
	
    div#orders-contain { width: 90%; margin: 20px 0; }
    div#orders-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#orders-contain table td, div#orders-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	div#books-contain { width: 100%; margin: 20px 0; }
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
    	<!--label for="datepicker1">Fecha Inicio:&nbsp;</label>
		<input type="text" name="FInicio" id="datepicker1" class="text ui-widget-content ui-corner-all" style="width:80px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
      	<label for="datepicker2">Fecha Fin:&nbsp;</label>
		<input type="text" name = "FFin" id="datepicker2" class="text ui-widget-content ui-corner-all" style="width:80px;"-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
      	<label for="txtcliente">Cliente:&nbsp;</label>
		<input type="text" name = "txtcliente" id="txtcliente" class="text ui-widget-content ui-corner-all" style="width:300px;"-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
        
        <label for="estado">Preparado:&nbsp;</label>
        <select name="estado" id="estado" style="width:120px;">
              <option></option>
              <option selected="selected">Pendiente</option>
              <option>Listo</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <label for="despacho">Despachado:&nbsp;</label>
        <select name="despacho" id="despacho" style="width:80px;">
              <option selected="selected"></option>
              <option>Si</option>
              <option>No</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <button id="refrescar">Filtrar</button>
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	</form>
</div>
</div>


<!--------------------------Despacho de picking------------------------->

<div id="DespacharPedido" title="Despacho Pedido">
 
  <form id="frmPedido">
    <fieldset>
      <div class="Table">
      <div class="Row">
      <div class="Cell">
      <input type="hidden" id="picking" name="picking">
      <label for="txtcolegio">Colegio/Cliente</label>
      <input type="text" id="txtcolegio" name="txtcolegio" style="width:250px;" class="ui-widget-content ui-corner-all" disabled>
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="selmotivo">Motivo</label>
      <input type="text" name="selmotivo" id="selmotivo" class="ui-widget-content ui-corner-all" disabled>
	  </div>
      <div class="Cell">
      <label for="selpromotor">Promotor</label>
      <input type="text" name="selpromotor" id="selpromotor" class="ui-widget-content ui-corner-all" disabled>
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="txtfechaentrega">Fecha entrega:</label>
      <input type="text" name="txtfechaentrega" id="txtfechaentrega" class="ui-widget-content ui-corner-all" disabled>
      </div>
      <div class="Cell" style="vertical-align:middle;">
      <label for="txtobservaciones">Observaciones:</label>
      <textarea rows="2" cols="36" name="txtobservaciones" id="txtobservaciones" class="ui-widget-content ui-corner-all" value="" style="width:250px;" disabled>
      </textarea>
      </div>
      </div>
      </div>
	  <hr><br>
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  
  <div id="books-contain" class="ui-widget">
  <table id="DespachoLibros" class="ui-widget ui-widget-content" style="width:100%">
    <thead>
      <tr class="ui-widget-header ">
        <th rowspan="2">Nivel</th>
        <th rowspan="2">Colecci&oacute;n</th>
        <th rowspan="2">T&iacute;tulo</th>
        <th colspan="2" style="text-align:center">1&deg;</th>
        <th colspan="2" style="text-align:center">2&deg;</th>
        <th colspan="2" style="text-align:center">3&deg;</th>
        <th colspan="2" style="text-align:center">4&deg;</th>
        <th colspan="2" style="text-align:center">5&deg;</th>
        <th colspan="2" style="text-align:center">6&deg;</th>
      </tr>
      <tr class="ui-widget-header ">
        <th>Q Sol</th>
        <th>Q Prep</th>
        <th>Q Sol</th>
        <th>Q Prep</th>
        <th>Q Sol</th>
        <th>Q Prep</th>
		<th>Q Sol</th>
        <th>Q Prep</th>
        <th>Q Sol</th>
        <th>Q Prep</th>
        <th>Q Sol</th>
        <th>Q Prep</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</form>	
</div>

<!---------------------LISTADO DE PEDIDOS-------------------------------------->
<div id="orders-contain" class="ui-widget" style="overflow:scroll; height:400px;">
  <table id="pedidos" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Picking</th>
        <th>Fecha Registro</th>
        <th>Usuario</th>
        <th>Pedido</th>
        <th>Cliente</th>
        <th>Motivo</th>
        <th title="Preparado">Prep</th>
        <th title="Despachado">Desp</th>
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