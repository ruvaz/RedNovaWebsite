<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="RedNova Consultants es una organizaci&oacute;n educativa vers&aacute;til que ofrece una gama de cursos de desarrollo profesional y soluciones de evaluaci&oacute;n para los profesionales de la ense&ntilde;anza del ingl&eacute;s y la educaci&oacute;n en general.">
		<title>RedNova Consultants | @yield('title')</title>		
		<meta name="keywords" content="rednova,consultants,exams,test,opt,dtes,profesionalizacion,certificación,cet,cec,english,education,macmillan,mpo,elt,teacher,student,register exam,register,examenes,diagnostic,placement">
		       
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
		<meta name="keywords" content="macmillan,rednova,consultants,cursos,ingles,examenes,publishers,english,dtes,idioma,profesional,cenni,desarrollo,docentes,educacion,enseñanza,certificacion,course,teachers,examen,students,profesionalizacion,language,universidad,mcer,training,access,evaluate,linguistica,proceso,profesores,certificate,conocimiento,development,grades,habilidades,learning,teaching,academic,aprendizaje,cet,classroom,edu,education,estudiantes,placement,acreditacion,ceneval,cetys,communicative,dgair,estudio,europeo,practice,professional,tesol,capacitacion,courses,developing,dilip,diseñado,efl,grupomacmillan,inforednova,mexico,rednovaconsultants,skills,assess,assessment">	   
		<link rel="apple-touch-icon" href="{{ asset('images/favicon.ico') }}">
		<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
  		<!-- css files - archivos css del nuevo diseño -->
	    <link href="/css/museo-webfonts.css " rel="stylesheet" type="text/css" media="all">  
	    <link href="/css/jquery.fancybox.css" rel="stylesheet" media="all" />	    
	    <link href="/css/screen.css" rel="stylesheet" media="all" />
	    <link href="/css/color.css" rel="stylesheet" media="all" />  
	    <link href="/css/font-awesome.min.css" rel="stylesheet" media="all" />
	    <link href="/css/flexslider.css" rel="stylesheet" media="all" />
	    <link href="/css/menu.css" rel="stylesheet" media="all" />
	    <link href="/css/dev.css" rel="stylesheet" media="all" />
	    <style type="text/css">.fancybox-margin{margin-right:0px;}</style>
	    <!-- end css files -->  
	    <script>var badIE = false;</script>
	    <!--[if (lt IE 8)]>
	    <script type="text/javascript">var badIE = true;</script>
	    <![endif]-->
	    <!-- js -->
	    <noscript>
	    <style>
	    	#menu, #tools { display: table !important; }
	    </style>
	    </noscript>	
	    <script src="/js/jquery-1.10.2.js" type="text/javascript"></script>	    
	</head>
	
	<body class="red-col">				
		<div class="form-body"> <!-- This div close in footer.inc -->
			<div class="mp-pusher" id="mp-pusher">	<!-- This div close in footer.inc -->
				<div class="scroller">	<!-- This div close in footer.inc -->					
					<nav id="mp-menu" class="mp-menu mp-cover">
					  <div data-level="1" class="mp-level">
					    <h2 class="">
					      <a href="#" class="mp-back">
					        {{trans('messages.menu.sections')}} <i class="fa fa-close fr"></i>
					      </a>
					    </h2>
					    <ul>
					      <li class="" id="mnu_23">
					        <a href="/{{App::getLocale()}}" target="_self">
					          <i class="fa fa-home"></i> 
					          {{trans('messages.menu.home')}}
					        </a>
					      </li>
					      <li class="" id="mnu_24">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">
					          RedNova Consultants
					          <i class="fa fa-angle-right"></i>
					        </a>
					        <div data-level="2" class="mp-level">
					          <h2 class="">
					            <a class="mp-back" href="#">
					              RedNova Consultants
					              <i class="fa fa-arrow-left rightAlign"></i>
					            </a>
					          </h2>
					          <ul class="dropdown-menu">
					            <li>
					              <a href="#" target="_self">
					                <b>RedNova Consultants</b>
					              </a>
					            </li>
					            <li>
					              <a href="/{{App::getLocale()}}/{{trans('messages.menu.who_we_are_url')}}" target="_self">{{ trans('messages.menu.who_we_are') }}</a>
					            </li>
					          </ul>
					        </div>
					      </li>
					      <li class="" id="mnu_25">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">
					          {{ trans('messages.menu.what_we_do') }}
					          <i class="fa fa-angle-right"></i>
					        </a>
					        <div data-level="2" class="mp-level">
					          <h2 class="">
					            <a class="mp-back" href="#">
					              {{ trans('messages.menu.what_we_do') }}
					              <i class="fa fa-arrow-left rightAlign"></i>
					            </a>
					          </h2>
					          <ul class="dropdown-menu">
					            <li>
					              <a href="#" target="_self">
					                <b>{{ trans('messages.menu.what_we_do') }}</b>
					              </a>
					            </li>
					            <li>
						            <a href="/{{App::getLocale()}}/{{ trans('messages.menu.professional_development_url') }}" target="_self">{{ trans('messages.menu.professional_development') }}</a>
						        </li>
					            <li>
						            <a href="/{{App::getLocale()}}/{{ trans('messages.menu.exams_url') }}" target="_self">{{ trans('messages.menu.exams') }}</a>
						        </li>
						        <li>
						            <a href="/{{App::getLocale()}}/{{ trans('messages.menu.other_services_url') }}" target="_self">{{ trans('messages.menu.other_services') }}</a>
						        </li>
					          </ul>
					        </div>
					      </li>
					      <li class="" id="mnu_26">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">
					          {{ trans('messages.menu.contact') }}
					          <i class="fa fa-angle-right"></i>
					        </a>
					        <div data-level="2" class="mp-level">
					          <h2 class="">
					            <a class="mp-back" href="#">
					              {{ trans('messages.menu.contact') }}
					              <i class="fa fa-arrow-left rightAlign"></i>
					            </a>
					          </h2>
					          <ul class="dropdown-menu"> 
					          	<li>
					              <a href="#" target="_self">
					                <b>{{ trans('messages.menu.contact') }}</b>
					              </a>
					            </li>           
					            <li>
						            <a href="/{{App::getLocale()}}/{{ trans('messages.menu.send_message_url') }}" target="_self">{{ trans('messages.menu.send_message') }}</a>                
						        </li>	      
					          </ul>
					        </div>
					      </li>
					      <li class="" id="mnu_27">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#" target="_self">
					          {{ trans('messages.menu.help_center') }}
					          <i class="fa fa-angle-right"></i>
					        </a>
					        <div data-level="2" class="mp-level">
					          <h2 class="">
					            <a class="mp-back" href="#">
					              {{ trans('messages.menu.help_center') }}
					              <i class="fa fa-arrow-left rightAlign"></i>
					            </a>
					          </h2>
					          <ul class="dropdown-menu">
					          	<li>
					              <a href="#" target="_self">
					                <b>{{ trans('messages.menu.help_center') }}</b>
					              </a>
					            </li>   
						        <!-- <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.faqs_url') }}" target="_self">{{ trans('messages.menu.faqs') }}</a>
					            </li> -->
					            <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.glosary_url') }}" target="_self">{{ trans('messages.menu.glosary') }}</a>
					            </li>
					          </ul>
					        </div>                
					      </li>
					    </ul>
					  </div>
					</nav>	
					<div class="globalMenu">
					    <div id="ctl00_HeaderTop_contentB1">
							<div class="wrapper">
								<div class="header-inner">
									<a href="#" id="trigger">
										<em class="fa fa-bars menu"></em>
										{{trans('messages.menu.menu')}}
									</a>&nbsp;									 								
									<ul>
										<li class="option">
											<a>{{Lang::locale()}}</a>
											<ul>
												@if(Lang::locale() === 'en')
													@if(Request::segment(2))
														<li><a href="/es/change/{{Request::segment(2)}}/">ES</a></li>
													@else
														<li><a href="/es/">ES</a></li>
													@endif	
												@else
													@if(Request::segment(2))
														<li><a href="/en/change/{{Request::segment(2)}}/">EN</a></li>
													@else
														<li><a href="/en/">EN</a></li>
													@endif
												@endif
											</ul>
										</li>
									</ul>									
									<a href="http://macmillan.com.mx/" class="global-l last" target="_blank">										
										<em aria-hidden="true" class="fa fa-globe"></em> 
										<span> Macmillan Education Mexico</span> 
									</a>							
								</div>
							</div>
						</div>
					</div>
					<div class="wrapper">                    
					  <div class="header-inner">
					    <header id="MacEd_logo" class="clearfix">
					      <div id="ctl00_HeaderMiddle_headerblock">
					        <a href="/{{App::getLocale()}}" class="home"><img style="max-width: 270px" src="/images/Logo_rednova.png" alt="Macmillan education"></a>
					      </div>
					    </header>
					  </div>                  
					</div> 
					<div class="wrapper desktop">                    
					  <div class="inner-hld">
					    <nav class="nav cbp-hrmenu menuInn">
					      <ul>
					        <li class="" id="mnu_23">
					          <a href="/{{App::getLocale()}}" target="_self">
					            <i class="fa fa-home"></i>
					          </a>
					        </li>
					        <li class="" id="mnu_24">
					          <a class="dropdown-toggle menu-link" data-toggle="dropdown" href="#" target="_self">
					            RedNova Consultants<i class="fa fa-angle-down"></i>
					          </a>
					          <div class="subMenu" style="display: none;">
					            <ul class="dropdown-menu" style="margin-left: 118.219px;">
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.who_we_are_url') }}" target="_self">{{ trans('messages.menu.who_we_are') }}</a>
					              </li>              
					            </ul>
					          </div>
					        </li>
					        <li class="" id="mnu_25">
					          <a class="dropdown-toggle menu-link" data-toggle="dropdown" href="#" target="_self">
					            {{ trans('messages.menu.what_we_do') }}<i class="fa fa-angle-down"></i>
					          </a>
					          <div class="subMenu">
					            <ul class="dropdow-menu">
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.professional_development_url') }}" target="_self">{{ trans('messages.menu.professional_development') }}</a>
					              </li>
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.exams_url') }}" target="_self">{{ trans('messages.menu.exams') }}</a>
					              </li>
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.other_services_url') }}" target="_self">{{ trans('messages.menu.other_services') }}</a>
					              </li>
					            </ul>
					          </div>
					        </li>
					        <li class="" id="mnu_26">
					          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					            {{ trans('messages.menu.contact') }}<i class="fa fa-angle-down"></i>
					          </a>
					          <div class="subMenu">
					            <ul class="dropdown-menu">
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.send_message_url') }}" target="_self">{{ trans('messages.menu.send_message') }}</a>                
					              </li>                            
					            </ul>
					          </div>
					        </li>
					        <li class="" id="mnu_27">
					          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					            {{ trans('messages.menu.help_center') }}
					            <i class="fa fa-angle-down"></i>
					          </a>
					          <div class="subMenu">
					            <ul class="dropdown-menu">              
					              <!-- <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.faqs_url') }}" target="_self">{{ trans('messages.menu.faqs') }}</a>
					              </li> -->
					              <li>
					                <a href="/{{App::getLocale()}}/{{ trans('messages.menu.glosary_url') }}" target="_self">{{ trans('messages.menu.glosary') }}</a>
					              </li>  
					            </ul>
					          </div>          
					        </li>
					      </ul> 
					    </nav> 
					  </div>
					</div>
					
					@yield('content')
					
					<section class="footer-hld clearfix">
						<div class="wrapper">
							<footer class="inner-hld">
								<div class="row">
									<div class="col-4">
										<div class="related-link">
											<h4>{{trans('messages.footer.related_sites')}}</h4>						
											<ul class="siteMenu">													
												<li id="mnu_47">
													<a href="http://www.macmillaneducation.com/" target="_blank">Macmillan Education</a>
												</li>
												<li id="mnu_48">
													<a href="http://www.macmillandictionary.com/" target="_blank">Macmillan English Dictionary</a>
												</li>
												<li id="mnu_4294967295">
													<a href="http://www.onestopenglish.com/" target="_blank">Onestopenglish</a>
												</li>
												<li id="mnu_49">
													<a href="http://www.macmillanenglish.com/" target="_blank">Macmillan English</a>
												</li>							
											</ul>
										</div>
									</div>
									<div class="col-4">
										<div class="related-link rel-link-mobview">
											<h4>{{trans('messages.footer.quick_links')}}</h4>												
											<ul class="siteMenu">															
												<li id="mnu_45">
													<a href="http://ecatalog.macmillan.mx/level-index/#RedNova" target="_blank">ecatalog</a>
												</li>
												<li id="mnu_51">
													<a href="http://www.macmillan.com.mx" target="_blank">Macmillan Publishers</a>
												</li>
												<li id="mnu_52">
													<a href="http://www.macmillanenglishcampus.com" target="_blank">Macmillan English Campus</a>
												</li>
												<li id="mnu_53">
													<a href="http://www.macmillanpracticeonline.com/" target="_blank">Macmillan Practice Online</a>
												</li>										
											</ul>
										</div>
									</div>
									<div class="col-4">
										<div class="related-link">
											<div id="ctl00_FooterTop_contentBlockmnu">
												<h4>{{trans('messages.footer.office_mx')}}</h4>
												<ul class="siteMenu">
													<li>Tel: (55) 5482-2200, ext. 2417</li>
													<li>{{trans('messages.email')}}:&nbsp;
														<a href="mailto:inforednova@grupomacmillan.com">inforednova@grupomacmillan.com</a>
													</li>
												</ul>
											</div>  
										</div>
									</div>
								</div>									
							</footer>
						</div>
					
					</section>
					<section class="copyright clearfix">
						<div class="wrapper">
							<div class="inner-hld">
								<ul class="lastBar">
									<li>
										<div id="ctl00_FooterBottom_copyrightFooter">
											© 2017 Macmillan Publishers
										</div>
									</li>
									<li>
										<a id="ftp1-41" href="/es/{{trans('messages.policy_privacy_url')}}">{{trans('messages.policy_privacy')}}</a>
									</li>
									<li>
										<a id="ftp1-42" href="http://www.macmillanenglish.com/terms-of-use/" target="_blank">{{trans('messages.terms_use')}}</a>
									</li>
									<li>
										<a id="ftp1-43" href="http://www.macmillanenglish.com/cookies-policy/" target="_blank">{{trans('messages.cookie_policy')}}</a>
									</li>
								</ul>							
							</div>
						</div>
					</section>									
				</div>
			</div>
		</div>
	</body>      
    
	<!-- Javascript Files -->	
	<script src="/js/modernizr.js"></script>
	<script src="/js/classie.js"></script>
	<script src="/js/mlpushmenu.js"></script>
	<script src="/js/jquery.fancybox.js"></script>	
	<script src="/js/respond.js"></script>
	<script src="/js/jquery.hoverIntent.js"></script>
	<script src="/js/jquery.flexslider.js"></script>
	<script type="text/javascript" language="javascript">
	    var _mp = null;
	    $(function () {
	        _mp = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
	            type: 'cover'
	        });
	    });
	</script>   		
	<script src="/js_services/scripts.js "></script>
	<script src="/js_services/fastclick.js"></script>
	<script src="/js/show_details.js"></script>	
</html>
