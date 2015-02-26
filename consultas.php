<?php 
    require_once 'datafiles/config/sqlConnection.php'; //Requiere el archivo 'SqlConnection.php 

    $nombres = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $comentario = $_POST["comentario"];
    

    $query = 'SELECT * FROM contactos';
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

    
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>jQuery Tablas</title>
<!-- Link para las tablas jquery -->
<style type="text/css" title="currentStyle">
	@import "media/css/demo_page.css";
	@import "media/css/jquery.dataTables.css";
	@import "media/css/demo_table_jui.css";
	/*@import "examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css"; Tema Gris*/
	@import "examples_support/themes/ui-lightness/jquery-ui-1.8.4.custom.css"; /*Tema Naranja*/
	@import "media/css/TableTools_JUI.css";
	@import "media/css/TableTools.css";
</style>
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="media/js/TableTools.js"></script>
<!-- END jQuery table -->
<style>
body{
	background:#F8F7BE;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}

#main{
	margin:0 auto;
	width:960px;
}

#tabla2{
	margin-top:43px;
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
<section id="main">
    <section>
    <table id="tablaBasica">
    	<thead>
        	<th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Mensaje</th>
        </thead>
        <tbody>
        <?php
            while($row = mysql_fetch_array($result))
            {
        ?>
        	<tr>
            	<td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombres']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['fecha'];?></td>
                <td><?php echo $row['mensaje']; ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    </section>
</section>
</body>
</html>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tablaBasica').dataTable();
		
		
		oTable = $('#tablaTema').dataTable({
			"bJQueryUI": true,
			//"sDom": 'T<"clear">lfrtip',
			"sDom": '<"H"Tfr>t<"F"ip>',
			"sPaginationType": "full_numbers",
			"oTableTools": {
				"aButtons": [
					"copy", "csv", "xls", "pdf"
				]
			}
			
		});
		
	} );
</script>