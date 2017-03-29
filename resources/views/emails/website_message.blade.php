<!DOCTYPE html>

<html>	
	<body>
		<h3>Se ha recibido un mensaje del sitio web</h3>		
		<h4>Datos del remitente</h4>
		<strong>Nombre:</strong> {{$data['full_name']}}<br>
		<strong>Tel&eacute;fono:</strong> {{$data['phone']}}<br>
		<strong>Correo electr&oacute;nico personal:</strong> {{$data['email']}}<br>
		<strong>Mensaje:</strong> {{$data['message']}}<br>
	</body>
</html>