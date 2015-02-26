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
		
		$("#txtcolegio").on("autocompleteselect", function(event, ui){
			$("#cliente_id").val(ui.item.id);
		});
	});
  
	function addPedido(){
		if ($("#Libros > tbody > tr").length>0){
		  $.post("insPedido.php?"+$("#Pedido").serialize(), function(){
				  $("#crearPedido").dialog("close");
				  CargaPedidos();		  
			  });	  
		}else{
			alert("No puede registrar un pedido vacio");	
		}
	};
	
	function updatePedido(){
	  $.post("updPedido.php?"+$("#Pedido").serialize(), function(){
			  $("#crearPedido").dialog("close");
			  CargaPedidos();		  
		  });
	};
  	
	/*function fillDepartamento(){
	  
	  $.getJSON("selCliente.php","tipo=Departamento", function(clientes){
		$("#seldepartamento").html("");
		$("#selprovincia").html("");
		$("#seldistrito").html("");
		$("#selcolegio").html("");
		$.each(clientes, function(i, cliente){
			var newOption = "<option>"+cliente.departamento+"</option>"
				$(newOption).appendTo('#seldepartamento');
			});
		});
	};
	
	function fillProvincia(pDepartamento){
	  
	  $.getJSON("selCliente.php","tipo=Provincia&departamento="+pDepartamento, function(clientes){
		$("#selprovincia").html("");
		$("#seldistrito").html("");
		$("#selcolegio").html("");
		$.each(clientes, function(i, cliente){
			var newOption = "<option>"+cliente.provincia+"</option>"
				$(newOption).appendTo('#selprovincia');
				$("#selprovincia").selectmenu("refresh");
			});
		});
	};
	
	function fillDistrito(pDepartamento, pProvincia){
	  
	  $.getJSON("selCliente.php","tipo=Distrito&departamento="+pDepartamento+"&provincia="+pProvincia, function(clientes){
		$("#seldistrito").html("");
		$("#selcolegio").html("");
		$.each(clientes, function(i, cliente){
			var newOption = "<option>"+cliente.distrito+"</option>"
				$(newOption).appendTo('#seldistrito');
				$("#seldistrito").selectmenu("refresh");
			});
		});
	};
  
	function fillCliente(pObjeto, pDepartamento, pProvincia, pDistrito){
	
	  var changeTipo = "";
	  $.ajaxSetup({cache:true});
	  $.getJSON("selCliente.php","tipo=Cliente&departamento=" + pDepartamento + "&provincia=" + pProvincia + "&distrito=" + pDistrito, function(clientes){
		
		$("#"+pObjeto).html("");

		$.each(clientes, function(i, cliente){
			if (changeTipo == ""){
				changeTipo = cliente.tipo;
				var newOption = "<optgroup label='"+cliente.tipo+"'>";
				$(newOption).appendTo("#"+pObjeto);

			}
			else{
				if (changeTipo==cliente.tipo){
					changeTipo = cliente.tipo
				}
				else{
					changeTipo = cliente.tipo
					var newOption = "</optgroup>";
					$(newOption).appendTo("#"+pObjeto);
					var newOption = "<optgroup label='"+cliente.tipo+"'>";
					$(newOption).appendTo("#"+pObjeto);
				}
			}
			var newOption = "<option value='"+cliente.nombre+"' id='"+cliente.cliente_id+"'>"+cliente.nombre+"</option>";
			$(newOption).appendTo("optgroup[label='"+cliente.tipo+"']");
			
			});
			$("#txtcolegio").selectmenu("destroy");
			$("#txtcolegio").selectmenu({
				select: function(){
					$("#cliente_id").val($("#txtcolegio").find(":selected").attr("id"));
				}	
			});
			$( "#txtcolegio" ).selectmenu("menuWidget").addClass( "overflow" )
		});
		return true;
	};*/
  
	function fillNivel(){
	  
	  $.getJSON("selNivel.php","tipo=Nivel", function(productos){
		$("#selNivel").html("");
		$("#selColeccion").html("");
		$("#selProducto").html("");
		$.each(productos, function(i, producto){
			var newOption = "<option>"+producto.nivel+"</option>"
				$(newOption).appendTo('#selNivel');
			});
		});
	};
  
	function fillColeccion(pNivel){
	  
	  $.getJSON("selNivel.php","tipo=Coleccion&nivel="+pNivel, function(productos){
		$("#selColeccion").html("");
		$("#selProducto").html("");
		$.each(productos, function(i, producto){
			var newOption = "<option>"+producto.coleccion+"</option>"
				$(newOption).appendTo('#selColeccion');
				$("#selColeccion").selectmenu("refresh");
			});
		});
  	};
	
	function fillProducto(pNivel, pColeccion){
	  
	  $.getJSON("selNivel.php","tipo=Producto&nivel="+pNivel+"&coleccion="+pColeccion, function(productos){
		$("#selProducto").html("");
		$.each(productos, function(i, producto){
			var newOption = "<option value='"+producto.ID+"'>"+producto.producto+"</option>"
				$(newOption).appendTo('#selProducto');
				$("#selProducto").selectmenu("refresh");
			});
		});	
  	};
	
	function fillPromotor(){
	  
	  $.getJSON("selPromotor.php","", function(promotores){
		$("#selpromotor,#promotor").selectmenu() //.html("");
		$.each(promotores, function(i, promotor){
			var newOption = "<option value='"+promotor.promotor+"'>"+promotor.promotor+"</option>";
				$(newOption).appendTo('#selpromotor,#promotor');
			});
		});
  	};
  
  $(function() {
	var dialog, dialogConsulta, form, formConsulta;

    $( "#dlgCrearPedido" ).button().on( "click", function() {
		  //$.getJSON("selCliente.php","tipo=Otros", function(clientes){
			  var cache = {};
			  $("#txtcolegio").autocomplete({
				  minLength: 2,
				  source: function( request, response ) {
					var term = request.term;
					if ( term in cache ) {
					  response( cache[ term ] );
					  return;
					}
					
					$.getJSON( "selCliente.php", request, function( data, status, xhr ) {
					  cache[ term ] = data;
					  response( data );
					});	
				  }
				});
		  //});
		  //fillDepartamento();
		  fillNivel();
		  dialog.dialog( "open" );
    });
	
	$( "#CerrarSesion" ).button().on("click", function(){
		location="../logout.php";
	});
	
	$("#AddProducto").on("click", function() {
			if  (($("#n1").val()+$("#n2").val()+$("#n3").val()+$("#n4").val()+$("#n5").val()+$("#n6").val())>0 && $("#selProducto").val()!=null)
			{
			var libro = 
				"<tr>"+
				"<td>"+$("#selNivel").val()+"</td>"+
				"<td>"+$("#selColeccion").val()+"</td>"+
				"<td><input type='hidden' name='producto[]' value='"+$("#selProducto").val() +"'>"+$("#selProducto option:selected").text()+"</td>"+
				"<td><input type='hidden' name='n1[]' value='"+$("#n1").val()+"'>"+$("#n1").val()+"</td>"+
				"<td><input type='hidden' name='n2[]' value='"+$("#n2").val()+"'>"+$("#n2").val()+"</td>"+
				"<td><input type='hidden' name='n3[]' value='"+$("#n3").val()+"'>"+$("#n3").val()+"</td>"+
				"<td><input type='hidden' name='n4[]' value='"+$("#n4").val()+"'>"+$("#n4").val()+"</td>"+
				"<td><input type='hidden' name='n5[]' value='"+$("#n5").val()+"'>"+$("#n5").val()+"</td>"+
				"<td><input type='hidden' name='n6[]' value='"+$("#n6").val()+"'>"+$("#n6").val()+"</td>"+
				"<td><img class='buttonDelItem' src='../images/delete.png' onclick='delItem();'></td>"+
				"</tr>";

			$("#books-contain tbody").append(libro);
			}
	});
	
		dialog = $( "#crearPedido" ).dialog({
		  autoOpen: false,
		  height: 600,
		  width: 800,
		  modal: true,
		  buttons: {
			"Crear Pedido": addPedido,
			"Cancelar": function() {
			  dialog.dialog( "close" );
			}
		  },
		  close: function() {
			form[ 0 ].reset();
			$("#books-contain tbody").html("");
			//allFields.removeClass( "ui-state-error" );
		  },
		  open: function() {
			  //fillCliente("txtcolegio");
			  //fillNivel();
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
		
		
		form = dialog.find( "form" ).on( "submit", function( event ) {
		  event.preventDefault();
		  return false;
		});
		
		formConsulta = dialogConsulta.find( "form" ).on( "submit", function( event ) {
		  event.preventDefault();
		});
		
		$( "#Filtros" ).submit(function( event ) {
		  event.preventDefault();
		});
		
		/*
		Lo deshabilito porque est�� fallando el uso de los botones.
		$('#pedidos').selectable({
			filter:'tbody tr',
		});
		*/
		
		$( "#estado" ).selectmenu();
		$( "#selmotivo" ).selectmenu();
		$( "#accordion" ).accordion();
		
		
		/*$( "#seldepartamento" ).selectmenu({
			select: function(){
				fillProvincia($("#seldepartamento").val());
			},	
		});
		
		$( "#seldepartamento" ).selectmenu("menuWidget").addClass( "overflow" )
		
		$( "#selprovincia" ).selectmenu({
			select: function(){
				fillDistrito($("#seldepartamento").val(), $("#selprovincia").val());
			},	
		});
		$( "#selprovincia" ).selectmenu("menuWidget").addClass( "overflow" )
		
		$( "#seldistrito" ).selectmenu({
			select: function(){
				$("#txtcolegio").html("");
				var newOption = "<option>Cargando...</option>";
				$(newOption).appendTo("#txtcolegio");
				$("#txtcolegio").selectmenu("refresh");
				fillCliente("txtcolegio", $("#seldepartamento").val(), $("#selprovincia").val(), $("#seldistrito").val())
			},	
		});
		$( "#seldistrito" ).selectmenu("menuWidget").addClass( "overflow" )
		*/
		//$( "#txtcolegio" ).selectmenu();
		
		//$( "#ctxtcolegio").selectmenu();
		
		$("#selNivel").selectmenu({
			select: function(){
				fillColeccion($("#selNivel").val());
			},
			width: 90
		});
		
		$("#selColeccion").selectmenu({
			select: function(){
				fillProducto($("#selNivel").val(), $("#selColeccion").val());
			},
			width: 150
		});
		$("#selProducto").selectmenu({
			width: 180
		});
	
  	});
	
	function delItem(){
		$(".buttonDelItem").click(function(event){
			var tr = $(this).closest('tr');
			tr.fadeOut(400, function(){
            	tr.remove();
			});
		});
	}
		
    $(document).ready(function() {
		CargaPedidos();	
		fillPromotor();
		$("#refrescar").button().on("click", function(event){
			CargaPedidos();
			});
	});
	
	$(document).on("click", "#dlgCrearPedido", function(){
		$( "#crearPedido" ).dialog( "option", "buttons",{
			"Crear Pedido": addPedido,
			"Cancelar": function() {
			  $( "#crearPedido" ).dialog( "close" )
			}	
		});
	});
	

	
	$(document).on("click", ".buttonVer", function(){
		
		$( "#crearPedido" ).dialog( "option", "buttons",{
			"Actualizar Pedido": function(){
				updatePedido();
				},
			"Cancelar": function() {
			  $( "#crearPedido" ).dialog( "close" )
			}	
		});
		
			//fillCliente("txtcolegio");
			//fillDepartamento();
			fillNivel();
			
		$.getJSON("selPedido.php?pedido="+$(this).attr("name"), function(pedidos){
			
			$("#books-contain tbody").html("");
			
			$.each(pedidos, function(i, pedido){
				if (i=1){
				$("#txtpedido").val(pedido.pedido);
				/*fillProvincia(pedido.departamento);
				fillDistrito(pedido.departamento, pedido.provincia);
				fillCliente("txtcolegio", pedido.departamento, pedido.provincia, pedido.distrito);
				$("#seldepartamento").val(pedido.departamento).attr("selected", "selected");
				$("#selprovincia").val(pedido.provincia).attr("selected", "selected");
				$("#seldistrito").val(pedido.distrito).attr("selected", "selected");
				*/
				//$("#txtcolegio").val(pedido.colegio).attr("selected", "selected");
				$("#txtcolegio").val(pedido.colegio);
				$("#selmotivo").val(pedido.motivo).attr("selected", "selected");
				$("#selmotivo").selectmenu("refresh");
				$("#selpromotor").val(pedido.promotor).attr("selected", "selected");
				$("#selpromotor").selectmenu("refresh");
				$("#txtfechaentrega").datepicker("setDate", pedido.fecha_estimada_entrega);
				$("#txtobservaciones").val(pedido.observaciones);
				}
				
				var libro = 
				"<tr>"+
				"<td>"+pedido.nivel+"</td>"+
				"<td>"+pedido.coleccion+"</td>"+
				"<td><input type='hidden' name='producto[]' value='"+pedido.id +"'>"+pedido.producto+"</td>"+
				"<td><input type='hidden' name='n1[]' value='"+pedido.nivel_1+"'>"+pedido.nivel_1+"</td>"+
				"<td><input type='hidden' name='n2[]' value='"+pedido.nivel_2+"'>"+pedido.nivel_2+"</td>"+
				"<td><input type='hidden' name='n3[]' value='"+pedido.nivel_3+"'>"+pedido.nivel_3+"</td>"+
				"<td><input type='hidden' name='n4[]' value='"+pedido.nivel_4+"'>"+pedido.nivel_4+"</td>"+
				"<td><input type='hidden' name='n5[]' value='"+pedido.nivel_5+"'>"+pedido.nivel_5+"</td>"+
				"<td><input type='hidden' name='n6[]' value='"+pedido.nivel_6+"'>"+pedido.nivel_6+"</td>"+
				"<td><img class='buttonDelItem' src='../images/delete.png' onclick='delItem();'></td>"+
				"</tr>";

				$("#books-contain tbody").append(libro);
			});
		});
		
			$("#crearPedido").dialog("open");
	});
	
	function CargaPedidos(){
		var url="selPedidos.php?"+$("#Filtros").serialize();
		$("#pedidos tbody").html("");
		$.getJSON(url,function(pedidos){
			$.each(pedidos, function(i, pedido){
				var newRow = 
				"<tr title='"+pedido.pedido+"'>"
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
				"<td><input type='hidden' name='producto[]' value='"+pedido.id +"'>"+pedido.producto+"</td>"+
				"<td><input type='hidden' name='n1[]' value='"+pedido.nivel_1+"'>"+pedido.nivel_1+"</td>"+
				"<td><input type='hidden' name='n2[]' value='"+pedido.nivel_2+"'>"+pedido.nivel_2+"</td>"+
				"<td><input type='hidden' name='n3[]' value='"+pedido.nivel_3+"'>"+pedido.nivel_3+"</td>"+
				"<td><input type='hidden' name='n4[]' value='"+pedido.nivel_4+"'>"+pedido.nivel_4+"</td>"+
				"<td><input type='hidden' name='n5[]' value='"+pedido.nivel_5+"'>"+pedido.nivel_5+"</td>"+
				"<td><input type='hidden' name='n6[]' value='"+pedido.nivel_6+"'>"+pedido.nivel_6+"</td>"+
				"</tr>";

				$("#books-contain2 tbody").append(libro);
			});
		});
		$("#ConsultaPedido").dialog("open");
	});
	
	
	
	function AsignaBotones(pPedido, pEstado)
	{
		var Icon = "";
		
		if (pEstado == "Registrado" && <?php ValidaPrivilegio(2, $privilegios) ?>){
			Icon = "<img src='../images/editar.png' title='Editar Pedido' class='buttonVer' name='"+pPedido+"'><img src='../images/emitir.png' title = 'Emitir' id='"+pPedido+"' name = 'Emitido' class='buttonAprobar'>";
			}
		if (pEstado == "Emitido" && <?php ValidaPrivilegio(3, $privilegios) ?>){
			Icon = "<img src='../images/aprobar.png' title = 'Aprobar' id='"+pPedido+"' name = 'Aprobado' class='buttonAprobar'>";
		}
		/*if (pEstado == "Aprobado" && <?php ValidaPrivilegio(4, $privilegios) ?>){
			Icon = "<img src='../images/proceso.png' title = 'En proceso' id='"+pPedido+"' name = 'En proceso' class='buttonAprobar'>";
			}
		if (pEstado == "En proceso" && <?php ValidaPrivilegio(5, $privilegios) ?>){
			Icon = "<img src='../images/preparado.png' title = 'Preparado' id='"+pPedido+"' name = 'Preparado' class='buttonAprobar'>";
			}
		if (pEstado == "Preparado" && <?php ValidaPrivilegio(6, $privilegios) ?>){
			Icon = "<img src='../images/despacho_parcial.png' title = 'Despacho Parcial' id='"+pPedido+"' name = 'Despacho Parcial' class='buttonAprobar'><img src='../images/despacho.png' title = 'Despacho Total' id='"+pPedido+"' name = 'Despacho Total' class='buttonAprobar'>";
			}
		if (pEstado == "Despacho Parcial" && <?php ValidaPrivilegio(7, $privilegios) ?>){
			Icon = "<img src='../images/despacho.png' title = 'Despacho Total' id='"+pPedido+"' name = 'Despacho Total' class='buttonAprobar'>";
			}*/
		if (pEstado == "Despacho Total" && <?php ValidaPrivilegio(8, $privilegios) ?>){
			Icon = "<img src='../images/recibir.png' title = 'Recibido' id='"+pPedido+"' name = 'Recibido' class='buttonAprobar'>";
			}
		return Icon;
	}
	
	$(document).on("click", ".buttonAprobar", function(){
		$.post("updEstados.php?tipo="+$(this).attr("name")+"&pedido="+$(this).attr("id"),"",function(){
			CargaPedidos();
			});
		
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

	div#books-contain2 { width: 90%; margin: 20px 0; }
    div#books-contain2 table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain2 table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
	
	div#books-contain3 { width: 90%; margin: 20px 0; }
    div#books-contain3 table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain3 table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }

	/*.ui-selecting, .ui-selected { background: lightBlue; }*/
	.ui-dialog .ui-state-error { padding: .3em; }
	.ui-widget-content{ vertical-align:middle; }
	/*Revisar el dise�0�9o*/
	.ui-dialog-content, .ui-dialog-buttonpane{ background:#FFF !important; }
	
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
	  }	
	
	/*.ui-autocomplete-loading { background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;}*/
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
   <li class='active'><a href='#'>Pedidos</a></li>
   <?php if (ValidaPrivilegio2(4, $privilegios)){
	   echo "<li><a href='Despacho.php'>Despacho</a>";
	   echo "<li><a href='Picking.php'>Picking</a>";
   }
   ?>
     </li>
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
              <option selected="selected">Registrado</option>
              <option>Emitido</option>
              <option>Aprobado</option>
              <option>En proceso</option>
              <option>Preparado</option>
              <option>Despacho Parcial</option>
              <option>Despacho Total</option>
              <option>Recibido</option>
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

<!-------------------DIALOGO DE CREACION DE PEDIDO--------------------->
<div id="crearPedido" title="Crear Pedido">
 
  <form id="Pedido">
    <fieldset>
      <div class="Table">
      <div class="Row ui-widget">
     
      <input type="hidden" id="txtpedido" name="txtpedido">
      <label for="txtcolegio" style="position:absolute;left:30px;top:37px;">Colegio/Cliente</label>
      <input id="txtcolegio" name="txtcolegio" style="width:500px; height:25px;position:absolute; left:120px;" class="ui-widget-content ui-corner-all" size ="10">
	<input type="hidden" id = "cliente_id" name = "cliente_id">
      <!--label for="seldepartamento">Departamento</label>
      <select id="seldepartamento" style="width:200px;"></select>
      </div>
      <div class="Cell">
      <label for="selprovincia">Provincia</label>
      <select id="selprovincia" style="width:200px;"></select>
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="seldistrito">Distrito</label>
      <select id="seldistrito" style="width:200px;"></select>
      </div>
      <div class="Cell">
      <label for="txtcolegio">Colegio/Cliente</label>
      <select id="txtcolegio" name="txtcolegio" style="width:200px;"></select>
      
      </div-->
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="selmotivo">Motivo</label>
      <select name="selmotivo" id="selmotivo">
          <option value="Venta">Venta</option>
          <option value="Muestra">Muestra</option>
          <option value="Consignaci��n">Consignaci&oacute;n</option>
          <option value="Feria">Feria</option>
	  </select>
	  </div>
      <div class="Cell">
      <label for="selpromotor">Promotor</label>
      <select name="selpromotor" id="selpromotor">
	  </select>
      </div>
      </div>
      <div class="Row">
      <div class="Cell">
      <label for="txtfechaentrega">Fecha entrega:</label>
      <input type="text" name="txtfechaentrega" id="txtfechaentrega" class="ui-widget-content ui-corner-all" style="width:200px;">
      </div>
      <div class="Cell" style="vertical-align:middle;">
      <label for="txtobservaciones">Observaciones:</label>
      <textarea rows="2" cols="36" name="txtobservaciones" id="txtobservaciones" class="ui-widget-content ui-corner-all" value="">
      </textarea>
      </div>
      </div>
      </div>
	  <hr><br>
  	  <div style="margin-left:10px;">
      <table class="ui-widget">
          <thead>
              <tr>
              <th>Nivel</th>
              <th>Colecci&oacute;n</th>
              <th>T&iacute;tulo</th>
              <th>1&deg;</th>
              <th>2&deg;</th>
              <th>3&deg;</th>
              <th>4&deg;</th>
              <th>5&deg;</th>
              <th>6&deg;</th>
              </tr>
          </thead>
          <tbody>
          	<tr>
            	<td><select id="selNivel"></select></td>
            	<td><select id="selColeccion"></select></td>
            	<td><select id="selProducto"></select></td>
            	<td><input id="n1" type="number" min="0" class="ColNivel"></input></td>
                <td><input id="n2" type="number" min="0" class="ColNivel"></input></td>
                <td><input id="n3" type="number" min="0" class="ColNivel"></input></td>
                <td><input id="n4" type="number" min="0" class="ColNivel"></input></td>
                <td><input id="n5" type="number" min="0" class="ColNivel"></input></td>
                <td><input id="n6" type="number" min="0" class="ColNivel"></input></td>
                <td><img src="../images/agregar.png" id="AddProducto"></td>
            </tr>
          </tbody>
      </thead>
      </table>
      </div>
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  
  <div id="books-contain" class="ui-widget">
  <table id="libros" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Nivel</th>
        <th>Colecci&oacute;n</th>
        <th>T&iacute;tulo</th>
        <th>1&deg;</th>
        <th>2&deg;</th>
        <th>3&deg;</th>
        <th>4&deg;</th>
        <th>5&deg;</th>
        <th>6&deg;</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
</form>	
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
  <table id="libros" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Nivel</th>
        <th>Colecci&oacute;n</th>
        <th>Producto</th>
        <th>1&deg;</th>
        <th>2&deg;</th>
        <th>3&deg;</th>
        <th>4&deg;</th>
        <th>5&deg;</th>
        <th>6&deg;</th>
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
<?php if (ValidaPrivilegio2(1, $privilegios))
	echo '<button id="dlgCrearPedido">Crear Pedido</button>'; 
?>
<button id="CerrarSesion">Cerrar sesion</button>
</div>
</body>
</html>