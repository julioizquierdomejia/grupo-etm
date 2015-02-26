(function(window){
	$(document).ready(function(e)
	{
		function Permisos()
		{
			//console.log("EmailForm");
		}

		Permisos.prototype.verificarPermisos = verificarPermisos;

		window.Permisos = Permisos;
	});

	function verificarPermisos(_user,_libro)
	{
		$.post( "datafiles/config/permisos.php", { user: _user, libro: _libro }, successHandler);
	}

	function successHandler(data)
	{
		if (data != 1)
		{
			window.location = "../../sinpermiso.php";
		} else
		{
			$("body").show();
		}
	}
	
}(window));