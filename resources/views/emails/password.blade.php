<html>
	<body>
		<p>Hola {{$user->firstname}} {{$user->lastname}},</p>
		<p>{!! $msg !!}:</p>
		<a href="{{ url('dtes/password-reset/'.$user->email.'/'.$token) }}"> Haz click aqui</a>
		ó
		<p>Copia y pega el siguiente link al explorador de internet para continuar</p>
		{{ url('dtes/password-reset/'.$user->email.'/'.$token) }}
	</body>
</html>