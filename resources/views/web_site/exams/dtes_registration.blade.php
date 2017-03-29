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
                      <li><a href="/es/change/{{Request::segment(2)}}/{{Request::segment(3)}}">ES</a></li>
                    @else
                      <li><a href="/es/">ES</a></li>
                    @endif  
                  @else
                    @if(Request::segment(2))
                      <li><a href="/en/change/{{Request::segment(2)}}/{{Request::segment(3)}}">EN</a></li>
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
                    <span>{{trans('messages.menu.home')}}</span>
                  </a>
                </li>
                <!-- <li>
                  <a class="help" href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}" target="_blank">
                    <span>{{trans('messages.menu.faqs')}}</span>
                  </a>
                </li> -->
                <li>
                  <a class="login" data-toggle="modal" data-target="#myresults_dtes" href="#">
                    <span>{{trans('messages.my_results')}}</span>
                  </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<article id="main" class="main">
  <div class="wrap">
    <div class="content-cols">        
      <div class="col-50">
        <a href="/{{App::getLocale()}}/dtes" class="page-action button back solid">
        	<span>
        		{{trans('messages.back')}}
        	</span>
        </a>
        
        <h2>
        	{!! trans('messages.dtes.registration.title2') !!}
        </h2>
        <div></div>
        <div class="intro editorial">
          <p>
          	{{trans('messages.dtes.registration.description1')}}
          </p>
          <p>
          	{{trans('messages.dtes.registration.description2')}}
          </p>
        </div>
      </div>
      <div class="col-50">
        <img src="{{asset('images/services/dtes_product.png')}}" alt="Diagnostic Test for English Students" />
      </div>      
    </div>
    <div class="heading-row"></div>
    <div class="file-list alt-colour">
    	<ol class="products-list">
			@foreach($products as $key => $product)
				@if(count($product))
				<li>
					<a href="#" class="toggle {{str_replace('-','_',$key)}}">
						{{str_replace('-',' ',$key)}}
					</a>
					<ol>
						<li class="desktop-labels">
							<span>
								<strong>{{trans('messages.dtes.registration.state')}}</strong>
							</span>
							<span>
								<strong>{{trans('messages.dtes.registration.city')}}</strong>
							</span>								
							<span>
								<strong>{{trans('messages.dtes.registration.institution_1')}}</strong>
							</span>
							<span>
								<strong>{{trans('messages.dtes.registration.application_date')}}</strong>
							</span>
							<span></span>
							<span></span>
						</li>
						@foreach($product as $app)
							<li class="">
								<span>
									<span class="mobile-labels">
										<strong>{{trans('messages.dtes.registration.state')}}</strong>
									</span>
									{{$app->estado}}
								</span>
								<span>
									<span class="mobile-labels">
										<strong>{{trans('messages.dtes.registration.city')}}</strong>
									</span>
									{{$app->ciudad}}
								</span>								
								<span>
									<span class="mobile-labels">
										<strong>{{trans('messages.dtes.registration.institution_1')}}</strong>
									</span>
									{{$app->sede}}
								</span>
								<span>
									<span class="mobile-labels">
										<strong>{{trans('messages.dtes.registration.application_date')}}</strong>
									</span>		
									{{ Carbon\Carbon::parse($app->f_aplic)->format('d/m/Y H:i')}}
								</span>
								
								@if($app->cerrada)
								<span>
									<a class="button solid" target="_blank" id="viewBasket" href="http://dtes.rednovaconsultants.com/terminos_es.php?e={{ $app->codigo }}&paso=2&se={{ $app->id_act }}">{{trans('messages.registration')}}</a>
								</span>	
								@else
									<span><a class="button solid" target="_blank" id="viewBasket" href="http://dtes.rednovaconsultants.com/terminos.php?paso=2&se={{ $app->id_act }}">{{trans('messages.registration')}}</a></span>
									<span><a class="button alt-colour" target="_blank" href="http://dtes.rednovaconsultants.com/terminos_conv.php?paso=2&se={{ $app->id_act }}">FOLIO ME</a></span>																				
								@endif														
							</li>
						@endforeach
					</ol>
				</li>
				@endif
			@endforeach
    	</ol>      
    </div>    
  </div>
</article>
<div class="modal fade" id="myresults_dtes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="WS_fancybox-form">
    <div class="WS_forms_div">
      <form name="myresults_dtes" id="form_myresults_dtes" class="WS_standalone_login_form WS_forms" method="post" action="http://rednovaconsultants.com/en/dtes/results/" target="_blank">
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
          <input type="Submit" name="Login" class="prev" value="{{trans('messages.submit')}}"> 
          
          <input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
          </span>
        </fieldset>
      </form>
    </div>              
  </div>       
  </div>
</div>
<script type="text/javascript" src="{{asset('js_services/svg_map.js')}}"></script>
@endsection