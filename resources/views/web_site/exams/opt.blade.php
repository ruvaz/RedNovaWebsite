@extends('layouts/master_service')

@section('title','OPT')

@section('content')
<header role="banner">	
    <div class="banner" style="background: url('../images/services/opt.jpg')">	 
    	<div class="wrap container-text"> 
        	<h1 class="banner-text" style="bottom: 30% !important">Online Placement Test</h1>
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
                	<a class="login" data-toggle="modal" data-target="#myresults_opt" href="#">
                		<span>{{ trans('messages.my_results') }}</span>
                	</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<article id="main" role="main">
	<div class="wrap">
		<div class="account-actions">                       
            <div class="login">                
                <a class="button-large alt-colour" href="http://opt.rednovaconsultants.com/index.php?id=1" target="_blank">
                	{{ trans('messages.opt.start_exam') }}
                </a>                
            </div>
        </div>
		<div class="content-cols">
			<div class="col-50">
				<h2>
					{{ trans('messages.introduction') }}
				</h2>	
			  	<div class="intro editorial">				  		
					<p>
						{!! trans('messages.opt.exam_description_paragraph1') !!}
					</p>																					 
			  	</div>
			</div>
			<div class="col-50">					
				<img src="../images/services/opt_product.jpg" alt="Certificado para Coordinadores en Gestión Educativa Estratégica"/>				
			</div>
		</div>
		
		<div class="heading-row"></div>
		
		<div class="limit-width editorial intro">			
			<p>
				{{ trans('messages.opt.exam_description_paragraph2') }}
			</p>			
		</div>
		<div class="file-list alt-colour">
			<ol>
				<li>
					<a class="toggle" href="#">
						{{ trans('messages.opt.content.title') }}
					</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								{{ trans('messages.opt.content.paragraph1_1') }} 
								<a target="_blank" href="help-glossary.php#cenni" title="Certificaci&oacute;n Nacional de Nivel de Idioma">CENNI</a>
								{{trans('messages.opt.content.paragraph1_2')}} 
								<a target="_blank" href="help-glossary.php#mcer" title="Marco Común Europeo de Referencia Lingüística">{{trans('messages.mcer')}}</a> 
								{{trans('messages.opt.content.paragraph1_3')}}
							</p>
							<p class="lh-medium">
								{{trans('messages.opt.content.paragraph2')}}
							</p>
						</li>
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{trans('messages.opt.requirements.title')}}
					</a>
					<ol>
						<li class="padding-medium">
							<p>
								{!! trans('messages.opt.requirements.description') !!}
							</p>
							<p class="lh-medium">
								<span class="col-1">
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r1')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r2')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r3')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r4')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r5')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r6')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r7')}} <br>
									<b><i class="fa fa-check" aria-hidden="true"></i></b> {{trans('messages.opt.requirements.r8')}} <br>
								</span>
							</p>
						</li>
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{trans('messages.results')}}
					</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								{!! trans('messages.opt.results.paragraph1_1') !!}
								@if(App::getLocale() == 'es')
									(<i>statement of results</i>)
								@else
									statement of results
								@endif
								{!! trans('messages.opt.results.paragraph1_2') !!}
							</p>
						</li>
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{trans('messages.opt.get_exam.title')}}
					</a>
					<ol>
						<li id="exam" class="padding-medium lh-medium">
							<span class="col-2">
								<p class="text-center">
									1.- <b>
											{{trans('messages.opt.get_exam.buy_licence')}}				
										</b>
								</p>
								<div class="col-100 text-center">
									<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="WS_forms">
										<input type="hidden" name="cmd" value="_s-xclick">
										<input type="hidden" name="hosted_button_id" value="WQW6EZ2UAS8XQ">
										<table>
										<tr><td><input type="hidden" name="on0" value="Número de exámenes">
											{{trans('messages.opt.get_exam.exam_number')}}
											</td></tr><tr><td><select name="os0" class="WS_input_full_length">
										<option value="1 -">1 - $93.00 MXN</option>
										<option value="2 -">2 - $186.00 MXN</option>
										<option value="3 -">3 - $279.00 MXN</option>
										<option value="4 -">4 - $372.00 MXN</option>
										<option value="5 -">5 - $465.00 MXN</option>
										<option value="6 -">6 - $558.00 MXN</option>
										<option value="7 -">7 - $651.00 MXN</option>
										<option value="8 -">8 - $744.00 MXN</option>
										<option value="9 -">9 - $837.00 MXN</option>
										<option value="10 -">10 - $930.00 MXN</option>
										</select> </td></tr>
										</table>
										<input type="hidden" name="currency_code" value="MXN">
										<!-- <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
										<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1"> -->
										@if(App::getLocale() == 'en')
										<input type="image" name="submit" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_cc_171x47.png" alt="PayPal - The safer, easier way to pay online">																			
										@else
										<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">																													
										@endif										
										<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
									</form>
		
									<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="WS_forms">
										<input type="hidden" name="cmd" value="_s-xclick">
										<input type="hidden" name="hosted_button_id" value="EHRCR2AGBK4SS">
										<table>
										<tr>
											<td>
												<input type="hidden" name="on0" value="Número de exámenes">
												{{trans('messages.opt.get_exam.exam_number')}}
											</td></tr><tr><td><select name="os0" class="WS_input_full_length">
											<option value="1">1 - $89.00 MXN</option>
											<option value="2">2 - $178.00 MXN</option>
											<option value="3">3 - $267.00 MXN</option>
											<option value="4">4 - $356.00 MXN</option>
											<option value="5">5 - $445.00 MXN</option>
											<option value="6">6 - $534.00 MXN</option>
											<option value="7">7 - $623.00 MXN</option>
											<option value="8">8 - $712.00 MXN</option>
											<option value="9">9 - $801.00 MXN</option>
											<option value="10">10 - $890.00 MXN</option>
										</select> </td></tr>
										</table>		
										<input type="hidden" name="item_name" value="OPT">																				
										<input type="hidden" name="currency_code" value="MXN">										
										<input type="hidden" name="first_name" value="">
										<input type="hidden" name="custom" value="{{App::getLocale()}}">
										@if(App::getLocale() == 'en')
										<input type="image" name="submit" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_cc_171x47.png" alt="PayPal - The safer, easier way to pay online">																			
										@else
										<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">																													
										@endif										
										<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
									</form> -->
									
								</div>
							</span>
							<span class="col-2">
								<p class="text-center">									
									2.- <b>
										{{trans('messages.opt.get_exam.payment_notification')}}
										</b>
								</p>
								<p>
									{{trans('messages.opt.get_exam.payment_notification_p1')}} 
								</p>
								<p>
									{{trans('messages.opt.get_exam.payment_notification_p2')}}
								</p>
								<p>
									<a class="cta text-left"  id="viewBasket" data-toggle="modal" data-target="#payment_notification" href="#">
										{{trans('messages.opt.get_exam.payment_notification')}}
									</a></td>
								</p>														
							</span>
							<span class="col-2">
								<p>
									3.- <b>
										{{trans('messages.opt.get_exam.wait_license')}}
										</b>
								</p>	
								<p >
									{{trans('messages.opt.get_exam.wait_license_p1')}}
								</p> 
								<p>
									{{trans('messages.opt.get_exam.wait_license_p2')}}
								</p>
								<p>
									<a href="/{{App::getLocale()}}/{{trans('messages.menu.send_message_url')}}" target="_blank" class="text-left">
										{{trans('messages.menu.contact')}}
									</a>
								</p>
							</span>
						</li>	
					</ol>
				</li>
				<li>
					<a class="toggle" href="#">
						{{trans('messages.opt.resources')}}
					</a>
					<ol>
						<li class="padding-medium">
							<p class="lh-medium">
								<a href="http://opt.rednovaconsultants.com/opt-results/guia.pdf" target="_blank">
									{{trans('messages.opt.users_guide')}}
								</a>
							</p>
							<p class="lh-medium">
								<a href="http://opt.rednovaconsultants.com/test/" target="_blank">
									{{trans('messages.opt.technical_review')}}
								</a>
							</p>
						</li>
					</ol>
				</li>
			</ol>
		</div>
		<header>	
	</div>		
</article>		

<div class="modal fade" id="myresults_opt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="WS_fancybox-form">
		<div class="WS_forms_div">
			<form name="myresults_opt" id="form_myresults_opt" class="WS_standalone_login_form WS_forms" method="post" action="http://opt.rednovaconsultants.com/opt-results/index.php" target="_blank">
		        <fieldset class="WS_fancybox_form_step1">
		          <h3>
		          	{{trans('messages.opt.modal_results.title')}}
		          </h3>
		          <p>
		          	{{trans('messages.opt.modal_results.description')}}
		          </p>
		          <label> 
		            <input type="text" name="user" class="WS_input_full_length required" placeholder="{{trans('messages.username')}}"> 
		          </label> 
		          <label> 
		            <input type="password" name="pass" class="WS_input_full_length required" placeholder="{{trans('messages.password')}}"> 
		          </label> 		          <!-- <a href="#" class="close WS_forgot_password_email_reset_link">Forgot your username or password?</a> -->          
		          <input type="submit" name="" class="prev" value="{{trans('messages.submit')}}"> 
		          <input type="hidden" name="i" value="1">
		          <input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
		          </span>
		        </fieldset>
		    </form>
		</div>
	</div>   
  </div>
</div>
<div class="modal fade" id="login_opt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="WS_fancybox-form">
    <div class="WS_forms_div">
      <form name="login_opt" id="form_login_opt" class="WS_standalone_login_form WS_forms" method="post" action="http://opt.rednovaconsultants.com/index.php?id=1" target="_blank">
        <fieldset class="WS_fancybox_form_step1">
          <h3>{{trans('messages.login')}}</h3>
          <label>
            <input type="text" name="username" class="WS_input_full_length required" placeholder="{{trans('messages.username')}}"> 
          </label>
          <label>
            <input type="password" name="password" class="WS_input_full_length required" placeholder="{{trans('messages.password')}}"> 
          </label>
          <!-- <a href="#" class="close WS_forgot_password_email_reset_link">Forgot your username or password?</a> -->          
          <input type="Submit" name="cmdweblogin" class="prev" value="{{trans('messages.submit')}}">
          <input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
          </span>
        </fieldset>
      </form>
    </div>
  </div>
  </div>
</div>
<!-- <div class="modal fade" id="documents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="WS_fancybox-form">
		<div class="WS_forms_div">
			<fieldset class="WS_fancybox_form_step1">
				<h3>Recursos</h3>
				<h5>
					<a href="http://opt.rednovaconsultants.com/opt-results/guia.pdf" target="_blank">Guía de usuario</a>
				</h5>
				<h5>
					<a href="http://opt.rednovaconsultants.com/test/" target="_blank">Revisión técnica</a>
				</h5>										
				<h5>
					<a href="http://rednovaconsultants.com/internet/" target="_blank">Velocidad de internet</a>
				</h5>
			</fieldset>			
			<input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="Cerrar"/>					
		</div>							
	</div>       
  </div>
</div> -->

<div class="modal fade" id="payment_notification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="WS_fancybox-paypal">
		<div class="WS_forms_div">			
			<form name="payment_notification" id="form_payment_notification" class="WS_standalone_login_form WS_forms">				
				<fieldset class="WS_fancybox_form_step1">
					<h3>{{trans('messages.opt.modal_payment_notification.title')}}</h3>					
					<p>{{trans('messages.opt.modal_payment_notification.paragraph1')}}</p>
					<p>{{trans('messages.opt.modal_payment_notification.paragraph2')}}</p>
					 <label> 
			            <input type="text" id="name" name="name" data-msg="{{trans('validation.custom.name.required')}}" class="required" placeholder="{{trans('messages.opt.modal_payment_notification.form.full_name')}}">
			        </label> 
			        <label> 
			        	<input type="text" id="phone" name="phone" class="" placeholder="{{trans('messages.opt.modal_payment_notification.form.phone')}}">
			        </label> 
			        <label>
			        	<input type="email" id="email" name="email" data-msg="{{trans('validation.custom.invoice_email.required')}}" class="required" placeholder="{{trans('messages.opt.modal_payment_notification.form.email')}}">
			        </label>			        
			        <span>{{trans('messages.opt.modal_payment_notification.form.transaction_number')}}</span>
			        <label>			        	
			        	<input name="transaction_number" type="text" id="transaction_number" placeholder="{{trans('messages.opt.modal_payment_notification.form.transaction_number')}}">
			        </label>
			        <label>
			        	<input name="office" type="text" id="office" placeholder="{{trans('messages.opt.modal_payment_notification.form.office')}}">
			        </label>
			        <span>{{trans('messages.opt.modal_payment_notification.form.payment_date')}}</span>
			        <label>					        		        
			        	<input name="payment_date" data-msg="{{trans('validation.custom.payment_date.required')}}" value="{{date('d/m/Y')}}" type="text" data-date-format="mm/dd/yyyy" data-provide="datepicker" class="required" placeholder="{{trans('messages.opt.modal_payment_notification.form.payment_date')}}" id="payment_date">
			        </label>
			        <label>
			        	<span>{{trans('messages.opt.modal_payment_notification.form.payment_time')}}</span>
			        </label>
			        <label>			        	
			        	<select name="hours" style="width: 49%;min-width: 49%">			        		
			        		<option value="00">00</option>
			        		@for($i=1;$i<25;$i++)
			        			@if($i < 10)
			        				<?php $value = '0'.$i; ?>
			        			@else
			        				<?php $value = $i; ?>
			        			@endif
			        			<option value="{{$value}}">{{$value}}</option>
			        		@endfor
			        	</select>
			        	<select name="minutes" style="width: 50%;min-width: 50%">			        		      	
			        		@for($i=0;$i<60;$i++)
			        			@if($i < 10)
			        				<?php $value = '0'.$i; ?>
			        			@else
			        				<?php $value = $i; ?>
			        			@endif
			        			<option value="{{$value}}">{{$value}}</option>
			        		@endfor
			        	</select>
			        </label>
			        <span>{{trans('messages.opt.modal_payment_notification.form.amount')}}</span>
			        <label>
			        	<input name="amount" data-msg="{{trans('validation.custom.amount.required')}}" placeholder="{{trans('messages.opt.modal_payment_notification.form.amount')}}" type="text" id="amount" class="required">
			        </label>
			        <label>
			        	<textarea name="comment" id="comment" placeholder="{{trans('messages.opt.modal_payment_notification.form.comments')}}"></textarea>
			        </label>			        
			        <label class="myCheckbox">
			        	{{trans('messages.opt.modal_payment_notification.form.invoice_question')}}
			        	<input type="checkbox" name="invoice" id="invoice" value="1">
			        	<span for="invoice"></span>
			        </label>
			        <div id="facturacion" style="display: none;">
						<h3>{{trans('messages.opt.modal_payment_notification.form.invoicing')}}</h3>
						<label>
							<input name="business_name" data-msg="{{trans('validation.custom.business_name.required')}}" type="text" id="business_name" placeholder="{{trans('messages.opt.modal_payment_notification.form.business_name')}}" class="">
						</label>
						<label>
							<input name="rfc" type="text" data-msg="{{trans('validation.custom.rfc.required')}}" id="rfc" placeholder="{{trans('messages.opt.modal_payment_notification.form.rfc')}}" class="">
						</label>
						<label>
							<input name="business_office" data-msg="{{trans('validation.custom.business_office.required')}}" type="text" id="business_office" placeholder="{{trans('messages.opt.modal_payment_notification.form.business_office')}}" class="">
						</label>
						<label>
							<input name="invoice_email" data-msg="{{trans('validation.custom.invoice_email.required')}}" type="email" id="invoice_email" placeholder="{{trans('messages.opt.modal_payment_notification.form.email')}}" class="">							
						</label>
						<label></label>
					</div>
					<label>
						{{trans('messages.send_message.captcha_description')}}
						<label>
							<img src="{{captcha_src()}}" id="img_captcha" style="width: 170px;display:inline-block"/>
							<i class="fa fa-refresh" id="refreshCaptcha" style="vertical-align: top; font-size: 30px;margin:8px;cursor: pointer"></i>
							<input name="captcha" type="text" id="captcha" data-msg="{{trans('validation.captcha')}}">							
						</label>
					</label>
					<input type="Submit" class="prev" value="{{trans('messages.send')}}">
          			<input type="button" class="cancel WS_close_fancybox" data-dismiss="modal" value="{{trans('messages.cancel')}}"/>
				</fieldset>						
			</form>
		</div>							
	</div>       
  </div>
</div>	


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	$(function(){
		
		$('#payment_date').datepicker({		    
		    autoclose: true,
		    format: 'dd/mm/yyyy'
		});
	});
</script>

@if(Session::has('data'))	
	<script type="text/javascript">
	$(function(){ 
		var data = <?= json_encode(Session::get('data')) ?>;
		$('#payment_notification').modal('show');
		$('#transaction_number').val(data.tx);
		$('#transaction_number').attr('readonly','readonly');
		$("#amount").val(data.amt);
		$("#payment_date").val(data.payment_date);			
	});	
	</script>
@endif

@endsection