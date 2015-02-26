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
  

/*	function updatePedido(pPedido){
	  $.post("updPedido.php?"+$("#Pedido").serialize(), function(){
			  $("#crearPedido").dialog("close");
			  CargaPedidos();		  
		  });
	};*/
  
	
	function fillPromotor(){
	  
	  $.getJSON("selPromotor.php","", function(promotores){
		$("#promotor").selectmenu() //.html("");
		$.each(promotores, function(i, promotor){
			var newOption = "<option value='"+promotor.promotor+"'>"+promotor.promotor+"</option>";
				$(newOption).appendTo('#selpromotor,#promotor');
			});
		});
  	};
  
  $(function() {
	var dialogConsulta, formConsulta;

    $( "#CrearHojaPicking" ).button().on( "click", function() {
		if ($("input[name='seleccion']:checked").length=1){
		//console.log($("input[name='seleccion[]']:checked").serialize());
			$.getJSON("insPicking.php?"+$("input[name='seleccion']:checked").serialize(), function(picking){
				console.log(picking["Picking"]);
				$("#NroPicking").html(picking["Picking"]);
			});
				$("#dialog-message").dialog( "open" );
				CargaPedidos();
		}
		else{
			alert("Solo se puede generar el picking en por un pedido");	
		}
		
    });
	
	$( "#CerrarSesion" ).button().on("click", function(){
		location="../logout.php";
	});
	
		$( "#dialog-message" ).dialog({
		  autoOpen: false,
		  modal: true,
		  buttons: {
			"Imprimir": function() {
				location="Picking.php";
			  $( this ).dialog( "close" );
			}
		  }
		});
	
	
	
	
		dialogConsulta = $( "#ConsultaPedido" ).dialog({
		  autoOpen: false,
		  height: 600,
		  width: 800,
		  modal: true,
		  buttons: {
			  "Cerrar": function() {
				$( this ).dialog( "close" );
			  }
			},
		  close: function() {
			formConsulta[ 0 ].reset();
			$("#books-contain2 tbody").html("");
			//allFields.removeClass( "ui-state-error" );
		  }
		});		
	
		/*$( "#DespacharPedido" ).dialog({
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
		*/
	
		$( "#divConsultaTracking" ).dialog({
		  autoOpen: false,
		  height: 400,
		  width: 600,
		  modal: true,
		  buttons: {
			  "Cerrar": function() {
				$( this ).dialog( "close" );
			  }
			},
		  close: function() {
			$("#books-contain3 tbody").html("");
			//allFields.removeClass( "ui-state-error" );
		  }
		});		
		

		formConsulta = dialogConsulta.find( "form" ).on( "submit", function( event ) {
		  event.preventDefault();
		});
		
		$( "#Filtros" ).submit(function( event ) {
		  event.preventDefault();
		});
	
		
		$( "#estado" ).selectmenu();

		$( "#accordion" ).accordion();
	
  	});
		
    $(document).ready(function() {
		CargaPedidos();	
		fillPromotor();
		$("#refrescar").button().on("click", function(event){
			CargaPedidos();
			});
	});
	
/*
	function DespachoParcial(){
		
		$.post("updEstados.php?tipo=Despacho parcial&"+$("#frmPedido").serialize(),function(){
			$("#DespacharPedido").dialog("close");
			CargaPedidos();
			//$("#DespacharPedido").dialog("close");
		});
	
	}
*/
	
	
	function CargaPedidos(){
		var url="selPedidos.php?"+$("#Filtros").serialize();
		$("#pedidos tbody").html("");
		$.getJSON(url,function(pedidos){
			$.each(pedidos, function(i, pedido){
				
				var newRow = 
				"<tr title='"+pedido.pedido+"'>"
				+"<td>";
				
				if (pedido.estado == 'Aprobado' || pedido.estado == 'Despacho parcial')
					newRow = newRow + "<input type='checkbox' name='seleccion' value='"+pedido.pedido+"'>";
					
				newRow = newRow + "</td>"
				+"<td>"+pedido.pedido+"</td>"
				+"<td>"+pedido.fecha_registro+"</td>"
				+"<td>"+pedido.motivo+"</td>"
				+"<td>"+pedido.colegio+"</td>"
				+"<td>"+pedido.promotor+"</td>"
				+"<td>"+pedido.estado+"</td>"
				+"<td><img src='../images/tracking.png' title='Seguimiento de pedido' class='buttonTrack' id='"+pedido.pedido+"' name='Tracking'>"+AsignaBotones(pedido.pedido, pedido.estado)+"</td>"
				+"</tr>";
				$(newRow).appendTo('#pedidos tbody');
				});
			});	
	}
	
	$(document).on("dblclick", "#pedidos tbody tr", function(){
		
		$.getJSON("selPedido.php?pedido="+$(this).attr("title"), function(pedidos){
			
			$("#books-contain2 tbody").html("");
			
			$.each(pedidos, function(i, pedido){
				if (i=1){
				$("#ctxtcolegio").val(pedido.colegio);
				$("#cselmotivo").val(pedido.motivo);
				$("#cselpromotor").val(pedido.promotor);
				$("#ctxtfechaentrega").val(pedido.fecha_estimada_entrega);
				$("#ctxtobservaciones").val(pedido.observaciones);
				}
				
				var libro = 
				"<tr>"+
				"<td>"+pedido.nivel+"</td>"+
				"<td>"+pedido.coleccion+"</td>"+
				"<td>"+pedido.producto+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_1==0 ? "" : pedido.nivel_1)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_1==0 ? "" : pedido.saldo_nivel_1)+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_2==0 ? "" : pedido.nivel_2)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_2==0 ? "" : pedido.saldo_nivel_2)+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_3==0 ? "" : pedido.nivel_3)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_3==0 ? "" : pedido.saldo_nivel_3)+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_4==0 ? "" : pedido.nivel_4)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_4==0 ? "" : pedido.saldo_nivel_4)+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_5==0 ? "" : pedido.nivel_5)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_5==0 ? "" : pedido.saldo_nivel_5)+"</td>"+
				"<td style='font-weight:bold;'>"+(pedido.nivel_6==0 ? "" : pedido.nivel_6)+"</td>"+
				"<td style='font-weight:bold;color:red;'>"+(pedido.saldo_nivel_6==0 ? "" : pedido.saldo_nivel_6)+"</td>"+
				"</tr>";

				$("#books-contain2 tbody").append(libro);
			});
		});
		$("#ConsultaPedido").dialog("open");
	});
	
	
	
	function AsignaBotones(pPedido, pEstado)
	{
		var Icon = "";
		
		/*if (pEstado == "Aprobado" && <?php ValidaPrivilegio(4, $privilegios) ?>){
			Icon = "<img src='../images/proceso.png' title = 'En proceso' id='"+pPedido+"' name = 'En proceso' class='buttonAprobar'>";
			}
		if (pEstado == "En proceso" && <?php ValidaPrivilegio(5, $privilegios) ?>){
			Icon = "<img src='../images/preparado.png' title = 'Preparado' id='"+pPedido+"' name = 'Preparado' class='buttonAprobar'>";
			}
		if (pEstado == "Preparado" && <?php ValidaPrivilegio(6, $privilegios) ?>){
			Icon = "<img src='../images/despacho_parcial.png' title = 'Despacho Parcial' id= 'Despacho_Parcial' name = '"+pPedido+"' class='buttonAprobar'><img src='../images/despacho.png' title = 'Despacho Total' id='Despacho Total' name = '"+pPedido+"' class='buttonAprobar'>";
			}
		if (pEstado = "Despacho parcial" && <?php ValidaPrivilegio(7, $privilegios) ?>){
			Icon = "<img src='../images/despacho.png' title = 'Despacho Total' id='Despacho Total' name = '"+pPedido+"' class='buttonAprobar'>";
			}*/
		return Icon;
	}
	
/*	$(document).on("click", ".buttonAprobar", function(){
		$.post("updEstados.php?tipo="+$(this).attr("id")+"&pedido="+$(this).attr("name"),"",function(){
			CargaPedidos();
			});
		
	});*/
	
	$(document).on("click", "#Despacho_Parcial", function(){
		$("#DespachoLibros tbody").html("");
		$.getJSON("selPedido.php?pedido="+$(this).attr("name"),function(pedidos){
			$.each(pedidos, function(i, pedido){
				
				if (i = 1){
					$("#pedido").val(pedido.pedido);
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
				if (pedido.nivel_1>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_1+"</td><td><input name = 'nivel_1[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_1[]' type='hidden' width='20px' value='0'></td>";	
				if (pedido.nivel_2>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_2+"</td><td><input name = 'nivel_2[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_2[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.nivel_3>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_3+"</td><td><input name = 'nivel_3[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_3[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.nivel_4>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_4+"</td><td><input name = 'nivel_4[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_4[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.nivel_5>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_5+"</td><td><input name = 'nivel_5[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_5[]' type='hidden' width='20px' value='0'></td>";
				if (pedido.nivel_6>0)
					newRow = newRow +"<td style='text-align:right;'>"+pedido.nivel_6+"</td><td><input name = 'nivel_6[]' type='text' value='0' width='20px'></td>";
				else
					newRow = newRow +"<td style='text-align:right;'></td><td><input name = 'nivel_6[]' type='hidden' width='20px' value='0'></td>";
				newRow = newRow +"</tr>"
				$(newRow).appendTo('#DespachoLibros tbody');
				});
			});	
		$("#DespacharPedido").dialog("open");
				
	});
	
	
	
	$(document).on("click", ".buttonTrack", function(){
		$("#estados tbody").html("");
		$.getJSON("selEstados.php?pedido="+$(this).attr("id"),function(estados){
			$.each(estados, function(i, estado){
				if (i>0){
				var newRow = "<tr>"
				+"<td>"+estado.Estado+"</td>"
				+"<td>"+estado.Fecha+"</td>"
				+"<td>"+estado.Usuario+"</td>"
				+"</tr>"
				$(newRow).appendTo('#estados tbody');
				}
				});
			});	
		$("#divConsultaTracking").dialog("open");
		//$.post("selEstados.php?tipo="+$(this).attr("name")+"&pedido="+$(this).attr("id"));
		//CargaPedidos();
		
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
	
	table#DespachoLibros tbody td input{
		height:25px;
		width:40px;
		padding-left:5px;
		padding-right:2px;
		text-align:right;
	}
	
	.myfields label, .myfields input {
  		display:inline-block;
	}
	label{
  		font-weight:bold;
	}
    div#orders-contain { width: 90%; margin: 10px 0; }
    div#orders-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#orders-contain table td, div#orders-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	div#books-contain { width: 100%; margin: 20px 0; }
    div#books-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }

	div#books-contain2 { width: 90%; margin: 20px 0; }
    div#books-contain2 table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain2 table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	
	div#books-contain3 { width: 90%; margin: 20px 0; }
    div#books-contain3 table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain3 table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }

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
   <li class='active'><a href='#'>Despacho</a></li>
   <li><a href='Picking.php'>Picking</a></li>
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
              <option selected="selected">Aprobado</option>
              <option>Preparado</option>
              <option>Despacho parcial</option>
              <option>Despacho total</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <label for="promotor">Promotor:</label>&nbsp;
		<select name = "promotor" id="promotor" style="width:200px;">
        <option></option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="refrescar">Filtrar</button>
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	</form>
</div>
</div>

<!-------------------DIALOGO DE GENERACION DE PICKING--------------------->
<div id="dialog-message" title="Picking generado">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    El picking ha sido generado.
  </p>
  <p>
    El n&uacute;mero de picking es: <b id="NroPicking"> PICKING </b>.
  </p>
</div>


<!-------------------FORMULARIO DE CONSULTA DE PEDIDO------------->
<div id="ConsultaPedido" title="ConsultaPedido">
 
  <form id="ConsultaPedido">
    <fieldset>
      <div class="Table">
      <div class="Row">
      <div class="Cell">
      <label for="ctxtcolegio">Colegio/Cliente</label>
      <input type="text" disabled name="ctxtcolegio" id="ctxtcolegio" style="width:200px;" class="ui-widget-content ui-corner-all">
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="selmotivo">Motivo</label>
      <input type ="text" disabled name="selmotivo" id="cselmotivo" style="width:200px;" class="ui-widget-content ui-corner-all">
	  </div>
      <div class="Cell">
      <label for="selpromotor">Promotor</label>
      <input type="text" disabled name="selpromotor" id="cselpromotor" style="width:200px;" class="ui-widget-content ui-corner-all">
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="txtfechaentrega">Fecha entrega:</label>
      <input type="text" disabled name="txtfechaentrega" id="ctxtfechaentrega" class="ui-widget-content ui-corner-all" style="width:200px;">
      </div>
      <div class="Cell" style="vertical-align:middle;">
      <label for="txtobservaciones">Observaciones:</label>
      <textarea rows="2" cols="36" name="txtobservaciones" id="ctxtobservaciones" class="ui-widget-content ui-corner-all" disabled>
      </textarea>
      </div>
      </div>
      </div>
	  <hr><br>
    </fieldset>
  
  <div id="books-contain2" class="ui-widget">
  <table id="libros" class="ui-widget ui-widget-content" style="width:110%">
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

<!----------------------------TRACKING DE ESTADOS-------------------------------->

<div id="divConsultaTracking" title="ConsultaTracking">
 
  <form id="ConsultaTracking">
  
  <div id="books-contain3" class="ui-widget">
  <table id="estados" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Estado</th>
        <th>Fecha/Hora</th>
        <th>Usuario</th>
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
        <th>Sel</th>
        <th>Pedido</th>
        <th>Fecha Registro</th>
        <th>Motivo</th>
        <th>Cliente</th>
        <th>Promotor</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<button id="CrearHojaPicking">Crear Hoja Picking</button>
<button id="CerrarSesion">Cerrar sesion</button>
</div>
</body>
</html>