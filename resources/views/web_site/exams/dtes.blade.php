@extends('layouts/master_service')

@section('title','DTES')

@section('content')
<header role="banner">
    <div class="banner" style="background: url('{{asset('images/services/dtes.jpg')}}')">	    
    	<div class="wrap container-text">
    		<h1 class="banner-text" style="bottom: 20% !important">Diagnostic Test for English Students</h1>	        
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
                	<a class="home" href="/{{App::getLocale()}}">
                		<span>{{ trans('messages.menu.home') }}</span>
                	</a>
                </li>
                <!-- <li>
                	<a class="help" href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}" target="_blank">
                		<span>{{ trans('messages.menu.faqs') }}</span>
                	</a>
                </li> -->
                <li>
                	<a class="login" data-toggle="modal" data-target="#myresults_dtes" href="">
                		<span>{{ trans('messages.my_results') }}</span>
                	</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<article id="main" class="main">	
	<div class="wrap">		
		<div class="content-cols">
			<div class="col-50" style="margin-bottom: 0px">
				<h2>{{ trans('messages.introduction') }}</h2>
				<div></div>
				<div class="intro editorial">
					<p>
						{!! trans('messages.dtes.description') !!}
					</p>						
				</div>
			</div>
			<div class="col-50" style="margin-bottom: 0px">
				<img src="{{asset('images/services/dtes_product.png')}}" alt="Diagnostic Test for English Students" />
			</div>			
		</div>		
		<div class="content-cols intro">
			<p>
				{{ trans('messages.dtes.sections_description') }}<br>
				<span><i class="fa fa-check" aria-hidden="true"></i>  
					{{ trans('messages.dtes.section1') }}
				</span><br>
				<span><i class="fa fa-check" aria-hidden="true"></i> 
					{{ trans('messages.dtes.section2') }}
				</span><br>				
			</p>
			<p>
				{{ trans('messages.dtes.objectives') }}
			</p>
		</div>
		<div class="file-list alt-colour">
			<ol>
				<li>
					<a href="#" class="toggle">{{ trans('messages.dtes.levels.title') }}</a>
					<ol>
						<!-- <li>
							<span class="col-2"><b>{{trans('messages.dtes.levels.dtes_e_col1')}}</b></span>
							<span class="col-1 lh-medium">{{trans('messages.dtes.levels.dtes_e_col2')}}</span>
						</li> -->
						<li>
							<span class="col-2"><b>{{ trans('messages.dtes.levels.dtes_1_col1') }}</b></span>
							<span class="col-1 lh-medium">{{ trans('messages.dtes.levels.dtes_1_col2') }}</span>
						</li>
						<li>
							<span class="col-2"><b>{{ trans('messages.dtes.levels.dtes_2_col1') }}</b></span>
							<span class="col-1 lh-medium">{{ trans('messages.dtes.levels.dtes_2_col2') }}</span>
						</li>
						<li>
							<span class="col-2"><b>{{ trans('messages.dtes.levels.dtes_3_col1') }}</b></span>
							<span class="col-1 lh-medium">{{ trans('messages.dtes.levels.dtes_3_col2') }}</span>
						</li>
						<li>
							<span class="col-1">{{ trans('messages.dtes.levels.levels_graph') }}</span>
							<span class="col-2">
								<a href="#" class="button view alt-colour" data-toggle="modal" id="btn_levelchart" data-target="#levelchart_dtes"><b>{{ trans('messages.watch') }}</b></a>
							</span>
							<span class="col-3">
								48.5 kb									
								<a href="{{asset('images/niv-dtes-cenni.png')}}" download="" class="button download"><b>{{ trans_choice('messages.download',1) }}</b></a>
							</span>
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">{{ trans('messages.dtes.validation.title') }}</a>
					<ol>
						<li class="padding-medium">							
							<p class="lh-medium">
								{{ trans('messages.dtes.validation.paragraph1') }}
							</p>
							<p class="lh-medium">
								{!! trans('messages.dtes.validation.paragraph2') !!} 
								<a href="http://www.cenni.sep.gob.mx/es/cenni/2" target="_blank" title="Certificaci&oacute;n Nacional de Nivel de Idioma">
									{!! trans('messages.cenni') !!}.
								</a>
							</p>
							<p class="lh-medium">
								{{ trans('messages.dtes.validation.paragraph3_1') }}
								 <a href="http://www.cenni.sep.gob.mx/es/cenni/2" target="_blank" title="Certificaci&oacute;n Nacional de Nivel de Idioma">
								 	{!! trans('messages.cenni') !!}
								 </a> 
								{{ trans('messages.dtes.validation.paragraph3_2') }}
							</p>
							<p>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{!! trans('messages.dtes.validation.document1') !!}															
							</p>
							<p>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{!! trans('messages.dtes.validation.document2') !!}								
							</p>
							<p>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{!! trans('messages.dtes.validation.document3') !!}								
							</p>
							<p>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{!! trans('messages.dtes.validation.document4') !!}								
							</p>
							
							<!-- <li>
								<span class="col-1">{{trans('messages.dtes.validation.datasheet')}} DTES 1</span>
								<span class="col-3">
									<a href="http://www.cenni.sep.gob.mx/work/models/cenni/Resource/PDFs/DTES_1_2016.pdf" class="button view alt-colour" target="_blank"><b>{{trans('messages.watch')}}</b></a>
								</span>								
							</li>
							<li>
								<span class="col-1">{{trans('messages.dtes.validation.datasheet')}} DTES 2</span>
								<span class="col-3">
									<a href="http://www.cenni.sep.gob.mx/work/models/cenni/Resource/PDFs/DTES_2_2016.pdf" class="button view alt-colour" target="_blank"><b>{{trans('messages.watch')}}</b></a>
								</span>								
							</li>
							<li>
								<span class="col-1">{{trans('messages.dtes.validation.datasheet')}} DTES 3</span>
								<span class="col-3">
									<a href="http://www.cenni.sep.gob.mx/work/models/cenni/Resource/PDFs/DTES_3_2016.pdf" class="button view alt-colour" target="_blank"><b>{{trans('messages.watch')}}</b></a>
								</span>								
							</li> -->
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">{{trans('messages.dtes.requirements.title')}}</a>
					<ol>
						<li>
							<p class="padding-medium">
								{{trans('messages.dtes.requirements.paragraph1_1')}}
								<a href="/{{App::getLocale()}}/{{ trans('messages.menu.glosary_url') }}#cenni" target="_blank" title="Certificaci&oacute;n Nacional de Nivel de Idioma">CENNI</a>
								{{trans('messages.dtes.requirements.paragraph1_2')}}
								<br><br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{{trans('messages.dtes.requirements.r1')}}
								<span class="block text-requisitos padding-medium">
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  {{trans('messages.dtes.requirements.r1_1')}}</span>
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  {{trans('messages.dtes.requirements.r1_2')}}</span>
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  {{trans('messages.dtes.requirements.r1_3')}}</span>
									 {!! trans('messages.dtes.requirements.r1_4') !!}
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  {{trans('messages.dtes.requirements.r1_5')}}</span>
								</span>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{!! trans('messages.dtes.requirements.r2') !!}
								<br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> 
								{{trans('messages.dtes.requirements.r3')}}
								<br>
								<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.dtes.requirements.r4_solicitude1')}} <a href="/{{App::getLocale()}}/{{ trans('messages.menu.glosary_url') }}#cenni" target="_blank" title="Certificaci&oacute;n Nacional de Nivel de Idioma">CENNI</a> 
								{{trans('messages.dtes.requirements.r4_solicitude2')}}
								<br><br>
								<b>{{trans('messages.dtes.requirements.notes')}}:</b><br><br>
								<b>
									<i class="fa fa-check" aria-hidden="true"></i>
								</b>
								{{trans('messages.dtes.requirements.r5')}}
								<br>
								<span class="block text-requisitos padding-medium">
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  
										{{trans('messages.dtes.requirements.r5_1')}}
									</span>
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  
										{{trans('messages.dtes.requirements.r5_2')}}
									</span>
									<span class="block text-requisitos"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>  
										{{trans('messages.dtes.requirements.r5_3')}}
									</span>
								</span>
							</p>
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">{{trans('messages.dtes.registration.title')}}</a>
					<ol>
						<li class="padding-medium">
							<p class="n-margin">
								{{trans('messages.dtes.registration.check')}}
								<strong>									
									<a href="/{{App::getLocale()}}/{{ trans('messages.dtes.practice_pack.buy_link_url') }}">{{trans('messages.dtes.registration.here')}}</a>
								</strong>
								{{trans('messages.dtes.registration.description')}}
							</p>													
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">{{trans('messages.dtes.practice_pack.title')}}</a>
					<ol>
						<li class="padding-medium">
							<p>
								{!! trans('messages.dtes.practice_pack.description1_1') !!}	
							</p>							
							<p class="lh-medium">
								<a href="/{{App::getLocale()}}/{{ trans('messages.dtes.practice_pack.buy_link_url') }}" class="btn n-padding" id="viewBasket" target="_blank">{!! trans('messages.dtes.practice_pack.buy_link') !!}</a>
								{!! trans('messages.dtes.practice_pack.buy_description') !!}
							</p>
							<a href="/{{App::getLocale()}}/{{ trans('messages.menu.other_services_url') }}" class="btn n-padding" target="_blank">{{ trans('messages.dtes.practice_pack.more_info') }}</a> 							
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">{{trans('messages.results')}}</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								{{trans('messages.dtes.results.paragraph1')}}
								<br/><br/>  
								{!! trans('messages.dtes.results.paragraph2_1') !!} 
								(<a title="Direcci&oacute;n General de Acreditaci&oacute;n, Incorporaci&oacute;n y Revalidaci&oacute;n de la Secretar&iacute;a de 
								Educaci&oacute;n P&uacute;blica " href="/{{App::getLocale()}}/{{ trans('messages.menu.glosary_url') }}#dgair" target="_blank">DGAIR</a>),
								{{trans('messages.dtes.results.paragraph2_2')}}
							</p>							
							<a href="" data-target="#myresults_dtes" data-toggle="modal" class="btn n-padding">{{trans('messages.dtes.results.check_results')}}</a>
						</li>
					</ol>
				</li>
				<li>
					<a href="#" class="toggle">
						{{trans('messages.dtes.authorized_centers.title')}}
					</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								{{trans('messages.dtes.registration.check')}}															
								{{trans('messages.dtes.authorized_centers.description')}}
								<strong>
									<a href="/{{App::getLocale()}}/dtes/{{ trans('messages.dtes.authorized_centers.url') }}">{{trans('messages.dtes.registration.here')}}.</a>
								</strong>								
							</p>														
						</li>
					</ol>
				</li>	
			</ol>	
		</div>
	</div>	
</article>		
<div class="modal fade" id="myresults_dtes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="WS_fancybox-form">
    <div class="WS_forms_div">
      <form name="myresults_dtes" id="form_myresults_dtes" class="WS_standalone_login_form WS_forms" method="post" action="http://dtes.rednovaconsultants.com/en/dtes/results/" target="_blank">
        <fieldset class="WS_fancybox_form_step1">
          <h3>
          	{{trans('messages.dtes.results.modal.title')}}
          </h3>          
          <p>
          	{{trans('messages.dtes.results.modal.description')}}
          </p>
          <label> 
            <input type="text" name="curp" class="WS_input_full_length" placeholder="CURP" data-validation="required" data-validation-error-msg="This field is required."> 
          </label> 
          <label> 
            <input type="password" name="folio" class="WS_input_full_length" placeholder="Folio" data-validation="required" data-validation-error-msg="This field is required."> 
          </label> 
          <!-- <a href="#" class="close WS_forgot_password_email_reset_link">Forgot your username or password?</a> -->
          <input type="Submit" name="Login" id="send" class="prev" value="{{trans('messages.submit')}}"> 
          
          <input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
          </span>
        </fieldset>
      </form>
    </div>              
  </div>       
  </div>
</div>

<div class="modal fade" id="levelchart_dtes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:80%; max-width: 1200px">  
    <div class="WS_forms_div WS_fancybox-dtes">
		<div class="">		   
		       <img style="width:100% !important" src="{{asset('images/niv-dtes-cenni.png')}}" alt="DTES Level Chart"/>
		       <input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.close')}}"/>
		</div> 
	</div>                
  </div>
</div>
@endsection
