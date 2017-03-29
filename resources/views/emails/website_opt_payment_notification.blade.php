<!DOCTYPE html>

<html>
	
	<head>
		
	</head>
	<body>
		<h3>Notificación de pago Paypal</h3>		
		
		<h4>Datos del remitente</h4>
		<strong>Nombre:</strong> {{$data['name']}}<br>
		<strong>Teléfono:</strong> {{$data['phone']}}<br>
		<strong>Correo electrónico:</strong> {{$data['email']}}<br>
		<strong>Mensaje:</strong> {{$data['comment']}}<br>
		<br>
		
		<h4>Datos del pago</h4>		
		<strong>Fecha:</strong> {{$data['payment_date']}}<br>
		<strong>Hora y minuto:</strong> {{$data['payment_time']}}<br>
		<strong>Importe:</strong> {{$data['amount']}}<br>
		<strong>Número de sucursal:</strong> {{$data['office']}}<br>
		<strong>Número de transacción:</strong> {{$data['transaction_number']}}<br>		
		@if(isset($data['invoice']))
			<br>
			<h4>Datos de facturacíon</h4>		
			<strong>Razón social:</strong> {{$data['business_name']}}<br>
			<strong>RFC:</strong> {{$data['rfc']}}<br>
			<strong>Domicilio fiscal:</strong> {{$data['business_office']}}<br>
			<strong>Correo electrónico:</strong> {{$data['invoice_email']}}<br>
		@endif		
	</body>	
</html>