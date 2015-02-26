<?php 

	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['comentario'];

	$para = 'fchavez@grupo-etm.com, julioizquierdomejia@gmail.com';
	$titulo = 'Mensaje desde la web';
	$header = 'From: ' . $correo;
	$msjCorreo = "Nombre: $nombre $apellidos\nE-Mail: $correo\nMensaje:\n$mensaje";

	mail($para, $titulo, $msjCorreo, $header);

	 
	if ($_POST['submit']) {
		if (mail($para, $titulo, $msjCorreo, $header)) {
		echo "<script language='javascript'>
		alert('Mensaje enviado, muchas gracias.');
		window.location.href = 'http://TUSITIOWEB.COM';
		</script>";
		}
		else {
			echo 'Falló el envio';
		}
	}
	
?>