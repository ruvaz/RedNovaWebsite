@extends('layouts/master_service')

@section('title','CEC')

@section('content')

<header role="banner">
    <div class="banner" style="background: url('../images/services/cec.jpg')">
    	<div class="wrap container-text"> 
        	<h1 class="banner-text" style="bottom: 10%">Certificado para Coordinadores en Gestión Educativa Estratégica</h1>
        </div>	
    </div>
    <nav class="main-nav">
        <div class="wrap">
            <a href="/{{App::getLocale()}}">
            	<img class="logo-blanco" src="{{asset('images/Logo_rednova_blanco.png')}}"/>
            </a>
            <ul  class="lang">
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
            <ul>
                <li>
                	<a class="home" href="/{{App::getLocale()}}/">
                		<span>{{ trans('messages.menu.home') }}</span>
                	</a>
                </li>
                <!-- <li>
                	<a class="help" href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}">
                		<span>{{ trans('messages.menu.faqs') }}</span>
                	</a>
                </li> -->
                <li>
                	<a class="login" data-toggle="modal" data-target="#login_cec" href="">
                		<span>{{ trans('messages.login') }}</span>
                	</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<article id="main" role="main">
	<div class="wrap">
		<div class="content-cols">
			<div class="col-50">				
			  	<div class="intro editorial">				  		
					<p>
						{!! trans('messages.cec.description') !!}					
					</p>																  
			  	</div>
			</div>
			<div class="col-50">					
				<img src="../images/services/cec_product2.png" alt="Certificado para Coordinadores en Gestión Educativa Estratégica"/>				
			</div>
		</div>
		
		<div class="heading-row"></div>
		
		<div class="limit-width editorial intro">
			<p>
				{{ trans('messages.cec.objetives') }}
			</p>
		</div>
		<div class="file-list alt-colour">
			<ol>					
				<li>
					<a class="toggle" href="#">
						{{ trans('messages.cec.course_content.title') }}
					</a>
					<ol>
						<li>
							<span class="col-1">
								{{ trans('messages.cec.course_content.profession.title') }}
							</span>									
							<span class="col-1 lh-medium">
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.profession.c1') }}
								<br>
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.profession.c2') }}
								<br>
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.profession.c3') }}
								<br>
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.profession.c4') }}
								<br>									
							</span>
						</li>	
						<li>
							<span class="col-1">
								{{ trans('messages.cec.course_content.institution.title') }}
							</span>
							<span class="col-1 lh-medium">
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.institution.c1') }}
								<br>
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.institution.c2') }}
								<br>
							</span>								
						</li>
						<li>
							<span class="col-1">
								{{ trans('messages.cec.course_content.program.title') }}
							</span>	
							<span class="col-1 lh-medium">
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.program.c1') }}
								<br>
								<i class="fa fa-check" aria-hidden="true"></i> 
									{{ trans('messages.cec.course_content.program.c2') }}
								<br>
							</span>															
						</li>
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{ trans('messages.cec.evaluation.title') }}
					</a>
					<ol>
						<li class="padding-medium">
							<p>
								{{ trans('messages.cec.evaluation.paragraph1') }}
							</p class="lh-medium">
							<p>
								{{ trans('messages.cec.evaluation.paragraph2') }}
							</p>
							<p class="lh-medium">
								{{ trans('messages.cec.evaluation.paragraph3') }}
							</p>
							<p class="lh-medium">
								<span class="col-1">
									<b>A</b>: 
										{{ trans('messages.cec.evaluation.criterionA') }}
									<br>
									<b>B</b>: 
										{{ trans('messages.cec.evaluation.criterionB') }}
									<br>
									<b>C</b>: 
										{{ trans('messages.cec.evaluation.criterionC') }}
									<br>
								</span>	
							</p>
							<p>
								{{ trans('messages.cec.evaluation.paragraph4') }}
							</p>
						</li>	
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{ trans('messages.cec.admission_requirements.title') }}
					</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								{{ trans('messages.cec.admission_requirements.description') }}
							</p>
							<p class="lh-medium">
								<span class="col-1">
									<b><i class="fa fa-check" aria-hidden="true"></i></b> 
										{{ trans('messages.cec.admission_requirements.r1') }}
									<br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> 
										{{ trans('messages.cec.admission_requirements.r2') }}
									<br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> 
										{{ trans('messages.cec.admission_requirements.r3') }}
									<br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> 
										{{ trans('messages.cec.admission_requirements.r4') }}
									<br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> 
										{{ trans('messages.cec.admission_requirements.r5') }}
									<br>
								</span>	
							</p>
						</li>	
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">Descargas</a>
					<ol>
						<li>
							<span class="col-1">
								{{ trans('messages.cec.downloads.diptych') }}
							</span>
							<span class="col-2">
								<a href="../documents/RN_Produ_CEC_Brochure_2015_Web.pdf" class="button view alt-colour" target="_blank">
									<b>
										{{ trans('messages.watch') }}
									</b>
								</a>
							</span>
							<span class="col-3">
								617 kb									
								<a href="../documents/RN_Produ_CEC_Brochure_2015_Web.pdf" download="" class="button download">
									<b>
										{{ trans_choice('messages.download',1) }}
									</b>
								</a>
							</span>
						</li>	
					</ol>
				</li>
			</ol>
		</div>
	</div>
</article>
<div class="modal fade" id="login_cec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="WS_fancybox-form">
		<div class="WS_forms_div">
			<form name="login_cec" id="form_login_cec" class="WS_standalone_login_form WS_forms" method="post" action="http://eroom.rednovaconsultants.com/login/index.php" target="_blank">
				<fieldset class="WS_fancybox_form_step1">
					<h3>{{ trans('messages.login') }}</h3>						
					<label> 
						<input type="text" name="username" class="WS_input_full_length" placeholder="{{trans('messages.username')}}"> 
					</label> 
					<label> 
						<input type="password" name="password" class="WS_input_full_length" placeholder="{{trans('messages.password')}}"> 
					</label> 
					<a href="http://eroom.rednovaconsultants.com/login/forgot_password.php" target="_blank">{{ trans('messages.forgot_password') }}</a>					
					<input type="Submit" name="Login" class="prev" value="{{trans('messages.submit')}}"> 
					
					<input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
					</span>
				</fieldset>
			</form>
		</div>							
	</div>       
  </div>
</div>	

@endsection
