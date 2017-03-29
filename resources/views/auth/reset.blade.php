<!DOCTYPE html>
<html  ng-app="ResetPWD">
	<head>
		<title>DTES</title>
		<link rel="stylesheet" href="{{asset('css_services/bootstrap.min.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>
		<link rel="stylesheet" id="css-main-css" href="/css_services/main.css" type="text/css" media="all">	
	</head>
	<body ng-app="ResetPWD">
		<header role="banner">
		    <div class="banner" style="background: url('/images/services/dtes.jpg')">
		      <div class="wrap container-text">
		        <h1 class="banner-text">Diagnostic Test for English Students</h1>
		      </div>
		    </div>
		</header>
		<div class="container-fluid" ng-controller="Pwd">
			<div class="row" style="margin-top:20px">
				<div class="col-sm-12">
					<h1 class="text-center">Restaurar Contraseña</h1>
				</div>
			</div>
			<div class="row" style="margin-top:20px" ng-init="user.email = '{{$email}}';user.token = '{{$token}}'">
				<div class="center-block col-xs-7" style="float: none;font-size: 18px !important">											  			
				  	<div class="center-block">
				  		<div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert($index)" dismiss-on-timeout="5000">@{{alert.msg}}</div>
						<form name="reset_password" ng-submit="reset_password.$valid && resetPassword()" ng-show="!success">
							<input type="hidden" ng-model="user.token">
							
							<div class="form-group" ng-class="user.email ? '' : 'has-error'">
								<div class="input-group">
								  <span class="input-group-addon">Correo electrónico</span>
								  <input type="email" class="form-control" ng-model="user.email" ng-value="'{{$email}}'">
								</div>
								<span class="text-danger" role="alert" ng-show="error.email[0]" ng-hide="user.email">@{{error.email[0]}}</span>
							</div>
							
							<div class="form-group" ng-class="user.password ? '' : 'has-error'">
								<div class="input-group">
									<span class="input-group-addon">Contraseña</span>							
									<input type="password" class="form-control" ng-model="user.password">									
								</div>								
							</div>
							<div class="form-group" ng-class="user.password_confirmation ? '' : 'has-error'">
								<div class="input-group">
									<span class="input-group-addon">Confirmar Contraseña</span>							
									<input type="password" class="form-control" ng-model="user.password_confirmation">
								</div>
								<span class="text-danger" role="alert" ng-show="error.password[0]">@{{error.password[0]}}</span>							
							</div>
	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									Enviar
								</button>
							</div>
						</form>
					</div>
					<br>
					<div class="center-block text-center">
						<h4>
							<a href="/dtes/login" ng-show="success">Iniciar sesión</a>
						</h4>
					</div>
					<br>
				</div>
			</div>
		</div>
		<footer role="contentinfo" style="margin-top:30px">
			<div class="wrap">
				<div class="cols-3">
					<div>
						<h4>Contacto</h4>
						<p>
							RedNova Consultants<br>
							Insurgentes Sur 1886<br>
							Col. Florida,<br>
							Ciudad de México CP. 01030<br>											
							Tel: (55) 5482-2200, ext. 2417<br>
							Lada sin costo: 01-800-614-7650, ext. 2417<br>
							Web: 
							<a href="/es/preguntas-frecuentes" target="_blank">rednovaconsultants.com/es/preguntas-frecuentes</a>
						</p>
					</div>
					<div>
						<h4>Enlaces útiles</h4>
						<ul>
							<li>
								<a href="http://www.macmillaneducation.com/" target="_blank">Macmillan Education</a>
							</li>
							<li>
								<a href="http://www.macmillandictionary.com/" target="_blank">Macmillan English Dictionary</a>
							</li>
						</ul>
					</div>
					<div>
						<h4>Otros sitios de Macmillan</h4>
						<ul>
							<li>
								<a href="http://www.onestopenglish.com/" target="_blank">Onestopenglish</a>
							</li>
							<li>
								<a href="http://www.macmillanenglish.com/" target="_blank">Macmillan English</a>
							</li>
						</ul>
					</div>
				</div>
				<h4>
					<a href="mailto:inforednova@grupomacmillan.com">Contacto</a>
				</h4>
				<div class="cols-2">
					<div>© 2016 RedNova Consultants</div>
					<div>
						<ul>
							<li>
								<a href="/es/politica-de-privacidad" target="_blank">Política de Privacidad</a>
							</li>
							<li>
								<a href="http://www.macmillanenglish.com/terms-of-use/" target="_blank">Términos de Uso</a>
							</li>
							<li>
								<a href="http://www.macmillanenglish.com/cookies-policy/" target="_blank">Política de Cookies</a>
							</li>
						</ul>
					</div>
				</div>		
			</div>
		</footer>
		<script type="text/javascript" src="{{asset('angular/lib/angular.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/ui-bootstrap-tpls-2.1.3.min.js')}}"></script>
		
		<script type="text/javascript" src="{{asset('angular/pwd.js')}}"></script>
		
		<script type="text/javascript" src="{{asset('angular/services/auth.js')}}"></script>
	</body>
</html>