<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h3>Se realizó un pago con paypal</h3>
		<div>
			<div>
				<strong>ID de Transacción: </strong> {{$data['tx']}}
			</div>
			<div>
				<strong>Status: </strong> {{$data['st']}}
			</div>
			<div>
				<strong>Cantidad: </strong> {{$data['amt']}}
			</div>
		</div>
	</body>
</html>