<!DOCTYPE html>

<html lang="en" class="">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    
	    <meta name="description" content="">    
	    <meta name="viewport" content="width=device-width,initial-scale=1">
	    <link rel="apple-touch-icon" href="{{ asset('images/favicon.ico') }}">
		<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
	    <title>@yield('title')</title>      
	
	    <link rel="alternate" type="application/rss+xml" title="" href="">
	    
	    <style type="text/css">
	        img.wp-smiley,
	        img.emoji {
	        	display: inline !important;
	        	border: none !important;
	        	box-shadow: none !important;
	        	height: 1em !important;
	        	width: 1em !important;
	        	margin: 0 .07em !important;
	        	vertical-align: -0.1em !important;
	        	background: none !important;
	        	padding: 0 !important;
	        }
	    </style>
	    <link href="{{asset('css_services/bootstrap.min.css')}}" rel="stylesheet">
	    <link rel="stylesheet" id="contact-form-7-css" href="{{asset('css_services/styles.css')}}" type="text/css" media="all">
	    <link rel="stylesheet" id="css-main-css" href="{{asset('css_services/main.css')}}" type="text/css" media="all">
	    <link rel="stylesheet" id="css-main-css" href="{{asset('css/font-awesome.min.css')}}" type="text/css" media="all">      
	    <script type="text/javascript" src="{{asset('js_services/jquery-1.11.3.min.js')}}"></script>
	    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
		<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
	    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="{{asset('js_services/fastclick.js')}}"></script>
	    <script type="text/javascript" src="{{asset('js_services/scripts.js')}}"></script>
	    <script type="text/javascript" src="{{asset('js_services/gbn8cte.js')}}"></script>
	    <script type="text/javascript" src="{{asset('js_services/function-min.js')}}"></script>    
	    <script type="text/javascript" src="{{asset('js_services/main-latest.js')}}"></script>    
	</head>
	<body data-timeout="30" class="page page-id-9 page-template page-template-page-templates page-template-page-help page-template-page-templatespage-help-php js-enabled">
		<input type="hidden" id="lang" value="{{App::getLocale()}}"/>
		<script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled')</script>    
	    <div id="container">
	    	
			@yield('content')
			
			<aside class="widgets">
				<div class="wrap">
					<div class="editorial">
						<h3>{{trans('messages.footer_service.who_we_are')}}</h3>
						<p>
							{{trans('messages.footer_service.who_we_are_text')}}
						</p>
						<a href="/{{App::getLocale()}}/{{trans('messages.menu.who_we_are_url')}}">{{trans('messages.more_info')}}</a>
					</div>
					<div class="editorial">
						<h3>{{trans('messages.menu.help_center')}}</h3>
						<p>
							{!! trans('messages.footer_service.help_text') !!}
						</p>
						<!-- <a href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}">{{trans('messages.menu.faqs')}}</a> -->
					</div>
					<div class="socials">
						<h3>{{trans('messages.footer_service.follow_us')}}</h3>
						<ul>
							<li>
								<a target="_blank" href="https://www.facebook.com/RedNovaConsultants" class="facebook">FACEBOOK</a>
							</li>
							<li>
								<a target="_blank" href="https://twitter.com/RedNovaMexico" class="twitter">TWITTER</a>
							</li>
						</ul>
					</div>	
				</div>
			</aside>        
		
			<footer role="contentinfo">
				<div class="wrap">		
					<div class="cols-3">
						<div>
							<h4>{{trans('messages.menu.contact')}}</h4>
							<p>
								RedNova Consultants<br>
								Insurgentes Sur 1886<br>
								Col. Florida,<br>
								{{trans('messages.footer_service.city')}} CP. 01030<br>											
								Tel: (55) 5482-2200, ext. 2417,<br>
								     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;01-800-614-7650, ext. 2417<br>
								<!-- Web: 
								<a href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}" target="_blank">rednovaconsultants.com/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}</a> -->
							</p>
						</div>
						<div>
							<h4>{{trans('messages.footer_service.useful_links')}}</h4>
							<ul>
								<li>
									<a href="http://macmillan.com.mx" target="_blank">Macmillan Mexico</a>
								</li>
								<li>
									<a href="http://www.macmillandictionary.com/" target="_blank">Macmillan English Dictionary</a>
								</li>
							</ul>
						</div>
						<div>
							<h4>{{trans('messages.footer_service.other_macmillan_sites')}}</h4>
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
						<a href="mailto:inforednova@grupomacmillan.com">{{trans('messages.menu.contact')}}</a>
					</h4>
					<div class="cols-2">
						<div>© 2017 Macmillan Publishers</div>
						<div>
							<ul>
								<li>
									<a href="/{{App::getLocale()}}/{{trans('messages.policy_privacy_url')}}" target="_blank">{{trans('messages.policy_privacy')}}</a>
								</li>
								<li>
									<a href="http://www.macmillanenglish.com/terms-of-use/" target="_blank">{{trans('messages.terms_use')}}</a>
								</li>
								<li>
									<a href="http://www.macmillanenglish.com/cookies-policy/" target="_blank">{{trans('messages.cookie_policy')}}</a>
								</li>
							</ul>
						</div>
					</div>		
				</div>
			</footer>
		</div>
		<script type="text/javascript" src="{{asset('js_services/jquery.form.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js_services/scripts_main.js')}}"></script>
	<!-- <div id="WS_loadingparent" style="display:none"><div id="loading"></div><img id="loading-image" src="https://code.ws.macmillaneducation.com/integrate/loading.gif" alt="Loading..."></div> -->
	</body>
</html>