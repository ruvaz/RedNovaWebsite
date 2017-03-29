<!DOCTYPE html>
<html  ng-app="dtes">
	<head>
		<base href="/dtes/admin">
		<title>DTES</title>
		<link rel="stylesheet" href="{{asset('css_services/normalize.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>
		<link rel="stylesheet" href="{{asset('css_services/bootstrap.min.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>		
		<link rel="stylesheet" href="{{asset('css_services/dashboard.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>
		<link rel="stylesheet" href="{{asset('css/loading-bar.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css" media="screen" title="bootstrap" charset="utf-8"/>
	</head>
	<body>
					
		<div ng-view></div>
		
		<!-- javascript libraries -->
		<script type="text/javascript" src="{{asset('angular/lib/angular.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/angular-locale_es-mx.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/ui-bootstrap-tpls-2.1.3.min.js')}}"></script>		
		<script type="text/javascript" src="{{asset('angular/lib/angular-route.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/ngStorage.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/angular-animate.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/lib/loading-bar.js')}}"></script>		
		<!-- javascript application files -->
		<script type="text/javascript" src="{{asset('angular/app.js')}}"></script>
				
		<script type="text/javascript" src="{{asset('angular/controllers/auth.js')}}"></script>				
		<script type="text/javascript" src="{{asset('angular/controllers/application.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/controllers/applicationHistory.js')}}"></script>		
		<script type="text/javascript" src="{{asset('angular/controllers/venue.js')}}"></script>		
		<script type="text/javascript" src="{{asset('angular/controllers/operator.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/controllers/product.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/controllers/candidate.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/controllers/user.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/controllers/payment.js')}}"></script>
		
		
		<script type="text/javascript" src="{{asset('angular/services/auth.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/application.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/state.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/venue.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/product.js')}}"></script>				
		<script type="text/javascript" src="{{asset('angular/services/operator.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/candidate.js')}}"></script>
		<script type="text/javascript" src="{{asset('angular/services/user.js')}}"></script>
		
		<script type="text/javascript" src="{{asset('angular/directives.js')}}"></script>
		
	</body>
</html>