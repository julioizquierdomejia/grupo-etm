<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: app/frmConsulta.php");
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/ie-emulation-modes-warning.js"></script>
<link href="signin.css" rel="stylesheet">
</head>
<body>

    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading" align="center">Grupo ETM <br> Acceso al sistema de pedidos</h2>
        <label for="inputEmail" class="sr-only">Dirección de correo</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="username">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordarme
           </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Ingresar</button>
      </form>

    </div> <!-- /container -->
  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>