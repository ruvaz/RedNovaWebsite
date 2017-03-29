<html>
	<head>
		<title>PRE-REGSITRO DTES</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">			
		<style>
			button,hr,input{overflow:visible}audio,canvas,progress,video{display:inline-block}progress,sub,sup{vertical-align:baseline}html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0} menu,article,aside,details,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{}button,select{text-transform:none}[type=submit], [type=reset],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}[hidden],template{display:none}
			table{
				border-collapse:collapse !important;
			}
			@media screen and (max-width:500px){
				table{
					width: 100% !important;
				}
				td,p{
					display: block !important;
					width: 95% !important;					
				}
			}
		</style>	
	</head>
	<body>
		<table  align="center" cellspacing="0" cellpadding="0" style="background: #EEE;width:100%!important;max-width: 700px !important">
			<tbody>
				<tr>
					<th colspan="3">							
						<img src="{{$message->embed('images/mailing/dtes.jpg')}}" style="width:100%;max-width: 700px;">
					</th>
				</tr>
				<tr style="font-size: 14px">
					<td colspan="3" style="padding:10px;text-align: left">
						<h2 style="margin:0">BIENVENIDO {{$candidate->firstname}}</h2>
					</td>
				</tr>
				<tr style="font-size: 14px">
					<td colspan="3" style="padding:10px;text-align: left">
						<h3 style="color: #2B9AF3;margin:0">DATOS DE TU REGISTRO</h3>
					</td>
				</tr>
				<tr style="font-size: 13px;">
					<td style="padding: 5px 10px;text-align: left">
						<strong>NOMBRE COMPLETO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->firstname.' '.$candidate->lastname}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>NACIONALIDAD</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->nationality}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>GÉNERO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->genere}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>FECHA DE NACIMIENTO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->birthdate}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>LUGAR DE NACIMIENTO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->city.', '.$candidate->birthplace_state}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>DOMICILIO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->street}}
						{{'NE: '.$candidate->n_exterior}}
						@if($candidate->n_interior)
							{{'NI: '.$candidate->n_interior}}
						@endif
						{{' COL '.$candidate->colony.' '.$candidate->town.', '.$candidate->state}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>CURP</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->curp}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>TELÉFONO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$candidate->phone}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>CORREO ELECTRÓNICO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">						
						{{strtoupper($candidate->email)}}
					</td>
				</tr>
				<tr style="font-size: 14px">
					<td colspan="3" style="padding:10px;text-align: left">
						<h3 style="color: #2B9AF3;margin:0">INFORMACIÓN DE TU EXÁMEN</h3>
					</td>						
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>EXÁMEN</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->product->name}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>FECHA DE APLICACIÓN</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->application_date}}
					</td>
				</tr>
				<tr style="font-size: 14px">
					<td colspan="3" style="padding:10px;text-align: left">
						<h3 style="color: #2B9AF3;margin:0">INFORMACIÓN DE LA SEDE</h3>
					</td>						
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>ESTADO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->venue_data->state->name}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>CIUDAD</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->venue_data->city->name}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>INSTITUCIÓN</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->venue_data->school}}
					</td>
				</tr>				
				<tr style="font-size: 13px">
					<td style="padding: 5px 10px;text-align: left">
						<strong>DOMICILIO</strong>
					</td>
					<td colspan="2" style="padding: 5px 10px;text-align: left">
						{{$application->venue_data->address}}
					</td>
				</tr>
				<tr style="font-size: 13px">
					<td colspan="3" style="padding: 5px 10px;text-align: left">
						HAS CLICK AQUÍ PARA VER LA
						<a style="color: #2B9AF3;" target="_blank" href="{{strtolower($application->venue_data->location)}}">
							<strong>UBICACIÓN</strong>
						</a>
					</td>						
				</tr>
				<tr style="font-size: 14px">
					<td colspan="3" style="padding:10px;text-align: left">
						<h3 style="color: #f32b2b;margin:0">RECOMENDACIONES</h3>
					</td>						
				</tr>
				<tr>
					<td colspan="3" style="font-size: 13px;text-align: left">
						<div style="padding:10px;text-align: left">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>							
					</td>
				</tr>
				<tr style="background: #5a5858;color: #FFF">						
					<td style="width:233px;vertical-align: top">
						<div style="padding:10px">
							<h4 style="margin:0 !important;text-align: left">Contacto</h4>							
							<p style="text-align: left;margin:0 !important;font-size: 12px;line-height: 20px">
								RedNova Consultants<br>
								Insurgentes Sur 1886<br>
								Col. Florida México,<br>
								Distrito Federal CP. 01030<br>											
								Tel: (55) 5482-2200, ext. 2412<br>
								Lada sin costo: 01-800-614-7650, ext. 2412<br>
								Sitio web:<br>
								<a style="color: #FFF;opacity: .5;transition: opacity .3s;" href="{{url('/es/preguntas_frecuentes')}}" target="_blank">rednovaconsultants.com/es/preguntas-frecuentes</a>
							</p>
						</div>
					</td>
					<td style="width:233px;vertical-align: top;text-align: left">
						<div style="padding: 10px;text-align: left">							
							<h4 style="margin:0 !important;">Enlaces útiles</h4>
							<div style="padding:5px 0">
								<a style="font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.macmillaneducation.com/" target="_blank">Macmillan Education</a>
							</div style="padding:5px 0">
							<div style="padding:5px 0">
								<a style="font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.macmillandictionary.com/" target="_blank">Macmillan English Dictionary</a>
							</div>
						</div>		
					</td>
					<td style="width:233px;vertical-align: top;text-align: left">
						<div style="padding: 10px;text-align: left">
							<h4 style="margin:0 !important">Otros sitios de Macmillan</h4>
							<div style="padding:5px 0">
								<a style="font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.onestopenglish.com/" target="_blank">Onestopenglish</a>
							</div>
							<div style="padding:5px 0">
								<a style="font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.macmillanenglish.com/" target="_blank">Macmillan English</a>
							</div>
						</div>
					</td>					
				</tr>
				<tr style="background: #5a5858;color: #FFF;font-size: 12px">
					<td>
						<div style="padding: 10px;text-align: left">
							<p>© 2016 RedNova Consultants</p>
						</div>
					</td>
					<td colspan="2" style="text-align: left">
						<a style="padding-left:10px;font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="{{url('/en/policy-privacy')}}" target="_blank">Política de Privacidad</a>														
						<a style="padding-left:10px;font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.macmillanenglish.com/terms-of-use/" target="_blank">Términos de Uso</a>					
						<a style="padding-left:10px;font-size: 12px;color: #FFF;opacity: .5;transition: opacity .3s;" href="http://www.macmillanenglish.com/cookies-policy/" target="_blank">Política de Cookies</a>						
					</td>
				</tr>
				<tr style="background: #5a5858">
					<td colspan="3" style="height: 8px;"></td>
				</tr>				
			</body>
		</table>
	</body>
</html>
