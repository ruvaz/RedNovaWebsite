@extends('layouts/master_service')

@section('title','CET')

@section('content')

 <header role="banner">
    <div class="banner" style="background: url('../images/services/cet.jpg')">	        
        <h1 class="banner-text">Certificate for English Teachers</h1>
    </div>
    <nav class="main-nav">
        <div class="wrap">
            <a href="/{{App::getLocale()}}">
            	<img class="logo-blanco" src="{{asset('images/Logo_rednova_blanco.png')}}"/>
            </a>
            <ul  class="lang">
				<li class="option">
					<a>{{ Lang::locale() }}</a>
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
                	<a class="home" href="/{{App::getLocale()}}">
                		<span>{{ trans('messages.menu.home') }}</span>
                	</a>
                </li>
                <!-- <li>
                	<a class="help" href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}">
                		<span>{{ trans('messages.menu.faqs') }}</span>
                	</a>
                </li> -->
                <li>
                	<a class="login" data-toggle="modal" data-target="#login_cet" href="">
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
				<h1>
					<b>						
						<br>
						{{ trans('messages.introduction') }}
					</b>
				</h1>
				<div class="intro editorial">
					<p>
						{!! trans('messages.cet.description_paragraph1_1') !!}
						<a title="Direcci&oacute;n General de Acreditaci&oacute;n, Incorporaci&oacute;n y Revalidaci&oacute;n de la Secretar&iacute;a de Educaci&oacute;n P&uacute;blica " target="_blank" href="http://www.cenni.sep.gob.mx/work/models/cenni/Resource/PDFs/Anexo8_Instrumento_Practica_Docente.pdf">
						{!! trans('messages.dgair') !!}	
						</a>.
						{{ trans('messages.cet.description_paragraph1_2') }} 
						<br>
						<br>
						{!! trans('messages.cet.description_paragraph2') !!}
					</p>
				</div>
			</div>
			<div class="col-50">
				<img src="../images/services/cet_product.jpg" alt="Certificate for English Teachers"/>
			</div>
		</div>	
		<div class="file-list alt-colour">
		  <ol>
		  	<li>
		  		<a class="toggle" href="#">{{ trans_choice('messages.modules',2) }}</a>
		  		<ol>
		  			<li class="padding-medium">
		  				<p class="lh-medium">
		  					{{ trans('messages.cet.modules.description') }}
		  				</p>
		  				<p class="lh-medium">
							<span class="col-1">
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m1') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m2') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m3') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m4') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m5') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m6') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m7') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m8') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m9') }} <br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{ trans('messages.cet.modules.m10') }} <br>
							</span>	
						</p>	
		  			</li>
		  		</ol>
		  	</li>
		  	<li>
		  		<a class="toggle" href="#">{{ trans('messages.cet.admission_profile.title') }}</a>
		  		<ol>
		  			<li class="padding-medium">
		  				<p>
		  					{{ trans('messages.cet.admission_profile.description') }}
		  				</p>
		  				<p class="lh-medium">
							<span class="col-1">
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
									{{ trans('messages.cet.admission_profile.r1') }}
								<br>								
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
									{{ trans('messages.cet.admission_profile.r2_1') }} 
								<a target="_blank" href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#cenni" title="Certificación Nacional de Nivel de Idioma"> 
									{!! trans('messages.cenni') !!} 
								</a> 12 
									{{ trans('messages.cet.admission_profile.r2_2') }}
								<a>
									{{ trans('messages.mcer') }}
								</a> B2
								<br>
								
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
									{{ trans('messages.cet.admission_profile.r3') }} 
								<br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
									{{ trans('messages.cet.admission_profile.r4') }} 
								<br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
									{{ trans('messages.cet.admission_profile.r5') }} 
								<br>								
							</span>	
						</p>
		  			</li>
		  		</ol>
		  	</li>
		  	<li>
		  		<a class="toggle" href="#">{{ trans('messages.cet.validation.title') }}</a>
		  		<ol>
		  			<li class="padding-medium">
		  				<p class="lh-medium">
							{!! trans('messages.cet.validation.paragraph1_1') !!} 
							(<a title="Direcci&oacute;n General de Acreditaci&oacute;n, Incorporaci&oacute;n y Revalidaci&oacute;n de la Secretar&iacute;a de Educaci&oacute;n P&uacute;blica " target="_blank" href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#dgair">DGAIR</a>) 
							{{ trans('messages.cet.validation.paragraph1_2') }}
							{!! trans('messages.cet.validation.paragraph1_3') !!}
						</p>
						<p>
							{{ trans('messages.cet.validation.paragraph2') }}
						
							{!! trans('messages.cet.validation.paragraph2_1') !!} 
							(<a target="_blank" href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#copei" target="_blank"  title="Colegio de Profesionales de la Enseñanza de Inglés">COPEI</a>).
						
						</p>
		  			</li>
		  		</ol>
		  	</li>
		  	<li>
		  		<a class="toggle" href="#">{{ trans('messages.results') }}</a>
		  		<ol>
		  			<li class="padding-medium">
		  				<p class="lh-medium">
							{{ trans('messages.cet.results.paragraph1') }} 							
							<a title="Direcci&oacute;n General de Acreditaci&oacute;n, Incorporaci&oacute;n y Revalidaci&oacute;n de la Secretar&iacute;a de Educaci&oacute;n P&uacute;blica " target="_blank" href="/{{App::getLocale()}}/{{trans('messages.menu.glosary_url')}}#dgair">
								{!! trans('messages.dgair') !!}.
							</a>
						</p>
		  			</li>
		  		</ol>
		  	</li>
		  	<li>
		  		<a class="toggle" href="#">{{ trans('messages.cet.downloads.title') }}</a>
		  		<ol>
					<li>
						<span class="col-1">{{ trans('messages.cet.downloads.diptych') }}</span>
						<span class="col-2">
							<a href="../documents/RN_Produ_CTE_brochure_2015_Espanol.pdf" class="button view alt-colour" target="_blank"><b>
								{{ trans('messages.watch') }}
								</b>
							</a>
						</span>
						<span class="col-3">
							288 kb
							<a href="../documents/RN_Produ_CTE_brochure_2015_Espanol.pdf" download="" class="button download">
								<b>{{ trans_choice('messages.download',1) }}</b>
							</a>
						</span>
					</li>	
					<li>
						<span class="col-1">{{ trans('messages.cet.downloads.anexo') }} 8</span>
						<span class="col-2">
							<a href="../documents/Anexo8_Instrumento_Practica_Docente.pdf" class="button view alt-colour" target="_blank"><b>
								{{ trans('messages.watch') }}
								</b>
							</a>
						</span>
						<span class="col-3">
							288 kb
							<a href="../documents/Anexo8_Instrumento_Practica_Docente.pdf" download="" class="button download">
								<b>{{ trans_choice('messages.download',1) }}</b>
							</a>
						</span>
					</li>
				</ol>
		  	</li>		  			  	
		  </ol>
		</div>				
	</div>				
</article>
<div class="modal fade" id="login_cet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="WS_fancybox-form">
		<div class="WS_forms_div">
			<form name="login_cet" id="form_login_cet" class="WS_standalone_login_form WS_forms" method="post" action="http://eroom.rednovaconsultants.com/login/index.php" target="_blank">
				<fieldset class="WS_fancybox_form_step1">
					<h3>{{ trans('messages.login') }}</h3>
					<label>
						<input type="text" name="username" class="WS_input_full_length" placeholder="{{trans('messages.username')}}"> 
					</label>
					<label>
						<input type="password" name="password" class="WS_input_full_length" placeholder="{{trans('messages.password')}}">
					</label> 
					<a href="http://eroom.rednovaconsultants.com/login/forgot_password.php" target="_blank">
						{{ trans('messages.forgot_password') }}
					</a>
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
