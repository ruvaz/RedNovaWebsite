@extends('layouts/master_service')
<link rel="stylesheet" href="{{asset('css_services/bootstrap.min.css')}}" type="text/css" media="screen" title="no title" charset="utf-8"/>

<style type="text/css" media="screen">
	input,select,button{
		z-index: inherit !important;
	}	
	.form-control,.input-group-addon,.btn{
		border-radius: 0 !important;
	}
	.has-error .input-group-addon{
		color: #d2040e !important;
	    background-color: #ffe6e6  !important;
	    border-color: #d2040e  !important;
	}
	.has-success .input-group-addon{
		color: #0073d0 !important;
	    background-color: #d1eaff  !important;
	    border-color: #007adc  !important;	    
	}
	.has-success .form-control{
		color: #555 !important;
		background-color: #FFF;
		border-color: #717171 !important;
	}
	.nav-tabs>li>a{
		border-radius: 0 !important;
	}
	.btn-success{
		background: #47a5f5  !important;
		border-color: #47a5f5 !important;
	}
	.btn-success.focus, .btn-success:focus{
		border-color: #47a5f5 !important;
	}
	
	.has-success .form-control-feedback{
		color: #0062b1 !important;
	}
	.has-success .input-group-addon {
	    color: #FFF !important;
	    background-color: #797a7b !important;
	    border-color: #717171 !important;
	}
	.has-success .form-control:focus {
	        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #747574 !important;
	}
</style>
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
            <a href="/{{App::getLocale()}}" class="logo"><span class="hide">Macmillan Education</span></a>
            <ul>
                <li>
                  <a class="home" href="/{{App::getLocale()}}">
                    <span>{{trans('messages.menu.home')}}</span>
                  </a>
                </li>
                <li>
                  <a class="help" href="/{{App::getLocale()}}/{{trans('messages.menu.faqs_url')}}" target="_blank">
                    <span>{{trans('messages.menu.faqs')}}</span>
                  </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<article ng-app="registration" id="main" class="main">	
	<div class="wrap"  ng-controller="RegistrationCtrl"> 			
		<div>
			@if(isset($data))	
			<div style="display: none" ng-init="paypalPayment()"></div>
			@endif
			<uib-tabset active="active" ng-init="getApplication('{{$application}}')" ng-show="!registration_success"> <!-- this function is executed when the page is loading. the param es provided for laravel controller-->
				<uib-tab index="0" disable="tabs[0].disable" heading="MÉTODO DE PAGO" ng-hide="paypal_payment_method || application.payment == 0">
					<div class="col-xs-12">
						<h4 class="page-header blue-text">SELECCIONE EL MÉTODO DE PAGO</h4>
						<div class="col-xs-10">
							<div class="form-group" ng-class="payment.method ? 'has-success' : 'has-error'">
								<div class="input-group">
									<span class="input-group-addon">Método de pago</span>
									<select class="form-control" ng-model="payment.method" ng-change="changeTab(payment.method)" required>
										<option value="" ng-hide="true"></option>
										<option ng-value="1">PAYPAL</option>
										<option ng-value="2">TRANSFERENCIA BANCARIA</option>
										<option ng-value="3">DEPÓSITO BANCARIO</option>
										<option ng-value="4">FOLIO MACMILLAN EDUCATION</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div ng-show="tab == 1" class="animate-show ng-hide">
								<aside class="widgets">
									<div class="wrap">
										<div class="editorial"  ng-repeat="product in application.product_types">
											<h5><strong class="red-text">@{{product.name}}</strong></h5>
											<a target="_blank" href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=@{{product.paypal_code}}" alt="PayPal, la forma más segura y rápida de pagar en línea.">
												<img src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynow_LG.gif" alt="PayPal, la forma más segura y rápida de pagar en línea.">
											</a>
										</div>
									</div>
								</aside>
							</div>
							<div ng-show="tab == 2" class="animate-show ng-hide">
								<aside class="widgets">
									<aside class="widgets">									
										<div class="wrap">
											<div class="editorial"  ng-repeat="product in application.product_types">
												<h5><strong class="red-text">@{{product.name}}</strong></h5>												
												<a href="/website/dtes/wire-transfer-payment/@{{application.id}}/@{{product.id}}" class="btn btn-primary">Descargar formato de pago</a>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="col-xs-12">
													<div class="col-xs-6">
														<h5 class="red-text">Si ya realizó el pago correspondiente, haga click en el botón "Continuar"</h4>
													</div>
													<div class="col-xs-6">
														<button class="button solid" ng-click="setPayment(active)">								
															<span>Continuar</span>
															<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
														</button>
													</div>
												</div>
											</div>
										</div>
										<br>
									</aside>
									<!-- <div class="wrap">
										<div class="editorial">
											<h5><strong class="red-text">TRANSFERENCIA BANCARIA EN LÍNEA</strong></h5>
											<h5>BANCO: <strong class="red-text">HSBC</strong></h5>
											<h5>CLABE: <strong class="red-text">021180040444977904</strong></h5>
										</div>
									</div> -->
								</aside>
							</div>
							<div ng-show="tab == 3" class="animate-show ng-hide">
								<aside class="widgets">
									<div class="wrap">
										<div class="editorial"  ng-repeat="product in application.product_types">
											<h5><strong class="red-text">@{{product.name}}</strong></h5>											
											<div>
												<a href="/website/dtes/payment/@{{application.id}}/@{{product.id}}" class="btn btn-primary">Descargar formato de pago</a>	
											</div>																					
										</div>										
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="col-xs-12">
												<div class="col-xs-6">
													<h5 class="red-text">Si ya realizó el pago correspondiente, haga click en el botón "Continuar"</h4>
												</div>
												<div class="col-xs-6">
													<button class="button solid" ng-click="setPayment(active)">								
														<span>Continuar</span>
														<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
													</button>
												</div>
											</div>
										</div>
									</div>
									<br>
								</aside>
							</div>
						</div>						
						<div ng-show="tab == 4" class="animate-show ng-hide">
							<div class="col-xs-10">								
								<div class="form-group" ng-class="candidate.folio_me ? 'has-success' : 'has-error'">
									<div class="input-group">
										<span class="input-group-addon">Folio ME</span>
										<input type="text" class="form-control" name="folio_me" ng-pattern="regex_foliME" ng-model="candidate.folio_me" placeholder="" aria-describedby="inputSuccess2Status" required>
										<span ng-class="success_folioME && candidate.folio_me ? 'glyphicon-ok' : 'glyphicon-remove'" class="glyphicon form-control-feedback" aria-hidden="true"></span>
  										<!-- <span id="inputSuccess2Status" class="sr-only">(success)</span> -->
									</div>
									<span class="text-danger" role="alert" ng-show="error.folio_me[0]" ng-hide="candidate.folio_me">@{{error.folio_me[0]}}</span>
								</div>
							</div>
							<div class="col-xs-2" ng-show="candidate.folio_me && flag">
								<button class="btn btn-success" ng-click="validateFolioME(active)">Enviar</button>
							</div>	
						</div>						
						<div class="col-xs-12">
							<br>
							<p>
								<a href="/{{App::getLocale()}}/dtes/registration" class="button alt-colour gray">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span>Regresar</span>
								</a>
								<button class="button solid" ng-show="success_folioME" ng-click="setTermsConditions(active)">								
									<span>Continuar</span>
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								</button>					        
							</p>
						</div>						
					</div>
				</uib-tab>
				<uib-tab index="1" disable="tabs[1].disable" heading="T&Eacute;RMINOS Y CONDICIONES">					
					
					<div class="col-xs-12">
						<h4 class="page-header blue-text">TÉRMINOS Y CONDICIONES PARA CANDIDATOS A EXÁMENES DTES (DTES1, DTES2 o DTES3)</h4>
						<p>
							Los candidatos que se presenten a cualquier examen con REDNOVA CONSULTANTS® aceptan estar obligados 
							por los términos y condiciones conferidos en este documento, por tal motivo al hacer click en el botón con 
							la leyenda <strong>"Acepto términos y condiciones"</strong>, implica la aceptación plena y sin 
							reservas de todos y cada uno de los puntos y disposiciones establecidos aquí.
						</p>
						<ul>
							<li>
								<h5>
									<strong>1.- Identidad del Candidato</strong>
								</h5>
								<div class="col-xs-12">
								  	<p>
										Se requiere que los candidatos acrediten su personalidad, mediante la exhibición en el centro examinador (SEDE), 
										de una identificación oficial con fotografía (credencial de elector, pasaporte, cédula profesional, credencial de 
										la institución en la que estudia si es menor de edad).
									</p>
									<p>
										En caso de que no se presente al instructor(a) un documento de identidad, REDNOVA CONSULTANTS® se reserva el derecho 
										a no permitir que el candidato realice el examen.
									</p>
								</div>								
							</li>
							<li>
								<h5>
									<strong>2.- Obligaciones de los candidatos</strong>
								</h5>
								<div class="col-xs-12">
								  <p>
								  	Los candidatos deberán estar presentes al menos con 30 minutos de anticipación, al inicio del examen.
								  	<br>
								  	Los candidatos deberán contar con un recibo de pago que garantice la realización del examen.</p>
								</div>
							</li>
							<li>
								<h5>
									<strong>3.- Otorgamiento de Certificados</strong>
								</h5>
								<div class="col-xs-12">
								  <p>REDNOVA CONSULTANTS® otorgará un certificado o constancia de acuerdo al porcentaje obtenido, a los candidatos que:</p>
								  <p>a) Hayan completado las cuatro secciones (Reading, Listening, Speaking y Writing) del DTES (DTES1, DTES2 o DTES3).</p>
								  <p>b) Acepten los términos y condiciones de certificación de REDNOVA CONSULTANTS®, según se detallan en estos términos y condiciones.</p>
								</div>	
							</li>
							<li>
								<h5>
									<strong>4.- Entrega de resultados</strong>	
								</h5>
								<div class="col-xs-12">
								  <p>
								  	Los candidatos serán informados acerca de sus resultados en un plazo no mayor a 30 días hábiles, a partir de la fecha de aplicación. 
								  	El candidato acepta que la calificación que obtenga en su examen será irrevocable.
								  </p>
								</div>
							</li>
							<li>
								<h5>
									<strong>5.- Proceso de certificación</strong>								
								</h5>
								<div class="col-xs-12">
									<p>
										REDNOVA CONSULTANTS® iniciará el proceso de certificación una vez que tenga en su poder los resultados de los exámenes aplicados y 
										la documentación completa del candidato.
									</p>
									<p>
										El candidato acepta que el proceso de certificación puede demorarse al no entregarse completa la documentación requisitada durante el período de registro.
									</p>
								</div>								
							</li>
							<li>
								<h5>
									<strong>6.- Entrega de Certificados</strong>
								</h5>
								<div class="col-xs-12">
									<p>La entrega de certificados tendrá lugar en un plazo entre 12 y hasta 18 meses, a partir de la notificación de resultados.</p>
									<p>
								  		Se debe considerar que la gestión y emisión del certificado o constancia se lleva a cabo a través de DGAIR, por lo que REDNOVA CONSULTANTS®, 
									  	no se responsabiliza por el retraso en la fecha de entrega de los mismos.
									</p>
									<p>Para la entrega de dichos documentos REDNOVA CONSULTANTS® hace referencia a las siguientes opciones:</p>
									<ol class="lista" style="padding-left: 20px">
										<li> 																																	
											<u>Locatarios</u>: se hará entrega del certificado o constancia en la sede donde se aplique el examen.</blockquote>										
										</li>
										<li>
											<u>Interior de la República</u>: en caso de requerir que su certificado o constancia le sea enviado a su domicilio, el candidato que resida al interior 
											de la república deberá enviar 48 horas antes, al equipo de exámenes de REDNOVA CONSULTANTS®, su guía prepago de mensajería como garantía de su solicitud.										
										</li>
										<li>
											<u>Un Tercero</u>: En caso que el candidato no pueda recoger personalmente su certificado o constancia, dicho candidato podrá asignar a un tercero, siempre 
											y cuando, este presente carta poder firmada por el interesado, identificación oficial y copia de la identificación oficial del titular del certificado.
										</li>
									</ol>
									<p>En caso de no cumplir con lo establecido, REDNOVA CONSULTANTS® se reserva la entrega de certificados y constancias.</p>
								</div>															
							</li>
							<li>
								<h5>
									<strong>7.- Cancelación de servicios</strong>									
								</h5>
								<div class="col-xs-12">
									<p>
										Si el candidato desea cancelar los servicios contratados, deberá solicitarlo por escrito a REDNOVA CONSULTANTS® con un mínimo de 7 días hábiles, anteriores a la fecha de aplicación del examen.
										<br>									
										El proceso de devolución será en un periodo de no más de 30 días después de haber sido solicitado.
										<br>
										Si el alumno no se presenta el día de la aplicación del examen, este quedará anulado automáticamente y no se podrá solicitar una nueva fecha para la aplicación o reembolso.
									</p>
								</div>
							</li>
							<li>
								<h5>
									<strong>8.- Retención de Información</strong>
								</h5>
								<div class="col-xs-12">
									<p>
										REDNOVA CONSULTANTS® retendrá los formularios de información entregados por los candidatos durante un período de 24 meses, después de la fecha del examen. Después de este período, 
										la información será destruida en forma segura. Las hojas con las respuestas de los exámenes se destruirán de forma segura 5 años después de la fecha de examen.
									</p>
								</div>
							</li>
							<li>
								<h5>
									<strong>9.- Protección de Datos</strong>
								</h5>
								<div class="col-xs-12">
									<p>
										Los datos personales que los candidatos proporcionen a REDNOVA CONSULTANTS® en cualquiera de los formularios incluidos y/o en el sitio web, podrán ser incluidos en unos ficheros informáticos 
										y serán tratados por métodos automatizados con la única finalidad de hacer posible la gestión administrativa de nuestras relaciones comerciales, y/o de permitir la realización de los servicios explicados.
									</p>
								</div>
							</li>
							<li>
								<h5>
									<strong>10.- Restricciones de uso de marca, materiales, métodos de capacitación y/o planes de certificación</strong>
								</h5>
								<div class="col-xs-12">
									<p>
										La certificación otorgada por REDNOVA CONSULTANTS® no le permite al candidato, el uso de esta marca, o de los materiales, métodos de capacitación y/o planes de certificación, en supuestos distintos a los aquí previstos.
										<br>
										Si el candidato hace uso incorrecto de la marca, o de los materiales, métodos de capacitación y/o planes de certificación, se tomarán medidas apropiadas para resolver este asunto. En caso de que el uso incorrecto sea 
										continuo, se retirarán los certificados otorgados y se tomarán las medidas jurídicas que sean procedentes.
									</p>
								</div>
							</li>
						</ul>
						<p>
							<button ng-click="back(active)" class="button alt-colour gray" ng-hide="paypal_payment_method || application.payment == 0">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span>Regresar</span>
							</button>
							<button class="button solid" ng-click="setTermsConditions(active)">								
								<span>Acepto términos y condiciones</span>
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							</button>					        
						</p>
					</div>
				</uib-tab>
				
				<uib-tab index="2" disable="tabs[2].disable" heading="PRE-REGISTRO" disable="false">				
					<div class="col-xs-12">
						<h4 class="page-header blue-text">PRE-REGISTRO</h4>
						<h4>Información de la aplicación</h4>
						<aside class="widgets">
							<div class="wrap">
								<div class="editorial">
									<h5>EXAMEN: <strong class="red-text">@{{application.product.name}}</strong></h5>
									<h5>ESTADO: <strong class="red-text">@{{application.venue.state.name}}</strong></h5>
									<h5>CIUDAD: <strong class="red-text">@{{application.venue.city.name}}</strong></h5>
								</div>
								<div class="editorial">
									<h5>INSTITUCIÓN: <strong class="red-text">@{{application.venue.school}}</strong></h5>
									<h5>FECHA Y HORA DE APLICACIÓN: <strong class="red-text">@{{application.application_date | date: 'dd-MMM-yyyy HH:mm:ss'}}</strong></h5>
									<h5>FECHA Y HORA DE CIERRE DE REGISTRO: <strong class="red-text">@{{application.final_registration_date | date: 'dd-MMM-yyyy HH:mm:ss'}}</strong></h5>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-xs-12 animate-show">		
						<br>													
						<form  class="animate-show" name="candidate_registration" id="candidate_registration" ng-submit="candidate_registration.$valid && setCandidateInformation(active)">
							<h4>Ingrese su CURP</h4>
							<div class="col-xs-12">
								<h4 class="text-danger">@{{error.validation_curp}}</h4>
							</div>							
							<div class="col-xs-12">								
								<div class="col-xs-6">
									<div class="form-group" ng-class="candidate_registration.curp.$valid ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">CURP</span>
											<input type="text" class="form-control text-uppercase" ng-model="candidate.curp" ng-change="error.validation_curp = null" name="curp" ng-pattern="regex_curp" aria-describedby="sizing-addon2" required>
										</div>
										<span class="text-danger" role="alert" ng-show="error.curp[0]" ng-hide="candidate.curp">@{{error.curp[0]}}</span>										
									</div>									
								</div>		
								<div class="col-xs-6" ng-show="candidate_registration.curp.$valid && !status_curp && !error.validation_curp">
									<div class="form-group">
										<button class="btn btn-success" type="button" ng-click="validateCandidateCURP()">Enviar</button>
									</div>
								</div>														
							</div>
							
							<div ng-show="status_curp" class="animate-show ng-hide">
								<h4>Información del candidato</h4>
								<div class="col-xs-12">
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.lastname_1 ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Apellido paterno</span>
												<input type="text" class="form-control"  ng-model="candidate.lastname_1" ng-change="candidate.lastname_1 = candidate.lastname_1.toUpperCase()" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.lastname_1[0]" ng-hide="candidate.lastname_1">@{{error.lastname_1[0]}}</span>
										</div>									
									</div>
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.lastname_2 ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Apellido materno</span>
												<input type="text" class="form-control"  ng-model="candidate.lastname_2" ng-change="candidate.lastname_2 = candidate.lastname_2.toUpperCase()" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.lastname_2[0]" ng-hide="candidate.lastname_2">@{{error.lastname_2[0]}}</span>
										</div>
									</div>
								</div>
								
								<div class="col-xs-12">
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.firstname ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Nombre(s)</span>
												<input type="text" class="form-control"  ng-model="candidate.firstname" ng-change="candidate.firstname = candidate.firstname.toUpperCase()" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.firstname[0]" ng-hide="candidate.firstname">@{{error.firstname[0]}}</span>
										</div>
									</div>								
									<div class="col-xs-6">								
										<div class="form-group" ng-class="candidate.nationality ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Nacionalidad</span>
												<input type="text" class="form-control"  ng-model="candidate.nationality" ng-change="candidate.nationality = candidate.nationality.toUpperCase()" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.nationality[0]" ng-hide="candidate.nationality">@{{error.nationality[0]}}</span>
										</div>
									</div>
								</div>	
								<div class="col-xs-12">
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.genere ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Género</span>
												<select class="form-control" ng-model="candidate.genere">
													<option value="" ng-hide="true"></option>
													<option value="female">MUJER</option>
													<option value="male">HOMBRE</option>
												</select>
											</div>
											<span class="text-danger" role="alert" ng-show="error.curp[0]" ng-hide="candidate.curp">@{{error.curp[0]}}</span>
										</div>				
									</div>								
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.email ? 'has-success' : 'has-error'">
											<div class="input-group">												
												<span class="input-group-addon">Correo electrónico</span>
												<input type="email" class="form-control"  ng-model="candidate.email" ng-change="candidate.email = candidate.email.toUpperCase()" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.email[0]" ng-hide="candidate.email">@{{error.email[0]}}</span>
										</div>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="col-xs-6">
										<div class="form-group" ng-class="candidate.phone ? 'has-success' : 'has-error'">
											<div class="input-group">
												<span class="input-group-addon">Teléfono (incluir lada)</span>
												<input type="text" class="form-control"  ng-model="candidate.phone" aria-describedby="sizing-addon2" required>
											</div>
											<span class="text-danger" role="alert" ng-show="error.phone[0]" ng-hide="candidate.phone">@{{error.phone[0]}}</span>
										</div>									
									</div>
								</div>
								<div ng-show="candidate.phone" class="animate-show">
									<div class="col-xs-12">
										<div class="col-xs-6">
											<h4>Lugar de nacimiento</h4>
										</div>
									</div>
									<div class="col-xs-12">								
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.birthplace_state ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Estado</span>
													<select class="form-control" ng-model="candidate.birthplace_state" ng-options="state.name as state.name for state in states">
														<option value="" ng-hide="true"></option>
													</select>
												</div>
												<span class="text-danger" role="alert" ng-show="error.birthplace_state[0]" ng-hide="candidate.birthplace_state">@{{error.birthplace_state[0]}}</span>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.city ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Ciudad</span>
													<input type="text" class="form-control"  ng-model="candidate.city" ng-change="candidate.city = candidate.city.toUpperCase()"  aria-describedby="sizing-addon2" required>
												</div>
												<span class="text-danger" role="alert" ng-show="error.city[0]" ng-hide="candidate.city">@{{error.city[0]}}</span>
											</div>
										</div>
									</div>
									<!-- <div class="col-xs-12">								
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.birthdate ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Fecha de nacimiento</span>
													<input type="text" class="form-control" popup-placement="" ng-model="candidate.birthdate" uib-datepicker-popup="@{{format}}" alt-input-formats="altInputFormats" is-open="popup.opened" datepicker-options="dateOptions" ng-required="true" close-text="Cerrar"/>
													<span class="input-group-btn">
														<button type="button" ng-class="candidate.birthdate ? 'btn-success' : 'btn-danger'" class="btn" ng-click="popup.opened = !popup.opened" style="height: 34px;">
														<i class="glyphicon glyphicon-calendar"></i>
														</button>
													</span>										    
												</div>
												<span class="text-danger" role="alert" ng-show="error.birthdate[0]" ng-hide="candidate.birthdate">@{{error.birthdate[0]}}</span>
											</div>
										</div>								
									</div> -->
								</div>
								<div ng-show="candidate.city" class="animate-show">																		
									<div class="col-xs-12">
										<div class="col-xs-6">
											<h4>Domicilio actual</h4>
										</div>
									</div>
									<div class="col-xs-12">								
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.street ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Calle</span>
													<input type="text" class="form-control"  ng-model="candidate.street" ng-change="candidate.street = candidate.street.toUpperCase()" aria-describedby="sizing-addon2" required>
												</div>
												<span class="text-danger" role="alert" ng-show="error.street[0]" ng-hide="candidate.street">@{{error.street[0]}}</span>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="form-group" ng-class="candidate.n_exterior ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">No. exterior</span>
													<input type="text" class="form-control"  ng-model="candidate.n_exterior" aria-describedby="sizing-addon2" required>
												</div>
												<span class="text-danger" role="alert" ng-show="error.n_exterior[0]" ng-hide="candidate.n_exterior">@{{error.n_exterior[0]}}</span>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="form-group" ng-class="candidate.n_interior ? 'has-success' : ''">
												<div class="input-group">
													<span class="input-group-addon">No. interior</span>
													<input type="text" class="form-control"  ng-model="candidate.n_interior" aria-describedby="sizing-addon2">
												</div>
												<span class="text-danger" role="alert" ng-show="error.n_interior[0]" ng-hide="candidate.n_interior">@{{error.n_interior[0]}}</span>
											</div>
										</div>
									</div>
									<div class="col-xs-12">								
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.colony ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Colonia o localidad</span>
													<input type="text" class="form-control"  ng-model="candidate.colony" ng-change="candidate.colony = candidate.colony.toUpperCase()" aria-describedby="sizing-addon2" required>																					   
												</div>
												<span class="text-danger" role="alert" ng-show="error.colony[0]" ng-hide="candidate.colony">@{{error.colony[0]}}</span>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.town ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Delegación o municipio</span>
													<input type="text" class="form-control"  ng-model="candidate.town" ng-change="candidate.town = candidate.town.toUpperCase()" aria-describedby="sizing-addon2" required>																					   
												</div>
												<span class="text-danger" role="alert" ng-show="error.town[0]" ng-hide="candidate.town">@{{error.town[0]}}</span>
											</div>
										</div>
									</div>
									<div class="col-xs-12">								
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.state ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Estado</span>
													<select class="form-control" ng-model="candidate.state" ng-options="state.name as state.name for state in states" required>
														<option value="" ng-hide="true"></option>
													</select>
												</div>
												<span class="text-danger" role="alert" ng-show="error.state[0]" ng-hide="candidate.state">@{{error.state[0]}}</span>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.cp ? 'has-success' : 'has-error'">
												<div class="input-group">
													<span class="input-group-addon">Código postal</span>
													<input type="text" class="form-control"  ng-model="candidate.cp" aria-describedby="sizing-addon2" required>																					   
												</div>
												<span class="text-danger" role="alert" ng-show="error.cp[0]" ng-hide="candidate.cp">@{{error.cp[0]}}</span>
											</div>
										</div>
									</div>
									<div class="col-xs-12" ng-if="application.product.parents_information == 1">
										<div class="col-xs-6">
											<h4>Información adicional</h4>
											<h5>Padre o Tutor</h5>
										</div>
									</div>
									<div class="col-xs-12" ng-if="application.product.parents_information == 1">								
										<div class="col-xs-6">									
											<div class="form-group" ng-class="candidate.tutor_firstname ? 'has-success' : 'has-error'">
												<div class="input-group">											
													<span class="input-group-addon">Nombre(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.tutor_firstname" ng-change="candidate.tutor_firstname = candidate.tutor_firstname.toUpperCase()" aria-describedby="sizing-addon2" required>																																  
												</div>										
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.tutor_lastname ? 'has-success' : 'has-error'">
												<div class="input-group">											
													<span class="input-group-addon">Apellido(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.tutor_lastname" ng-change="candidate.tutor_lastname = candidate.tutor_lastname.toUpperCase()" aria-describedby="sizing-addon2" required>
												</div>										
											</div>
										</div>
										<span class="text-danger" role="alert" ng-show="error.tutor[0]" ng-hide="candidate.tutor">@{{error.tutor[0]}}</span>								
									</div>
									<div class="col-xs-12">
										<div class="col-xs-6">									
											<h5>Personas autorizadas para trámite y recepción de documentos:</h5>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.p1.firstname ? 'has-success' : ''">
												<div class="input-group"  ng-class="candidate.p1.lastname ? 'has-error' : ''">
													<span class="input-group-addon">Nombre(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.p1.firstname" ng-change="candidate.p1.firstname = candidate.p1.firstname.toUpperCase()"  ng-required="candidate.p1.lastname" aria-describedby="sizing-addon2">																																  
												</div>										
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group"  ng-class="candidate.p1.lastname ? 'has-success' : ''">
												<div class="input-group" ng-class="candidate.p1.firstname ? 'has-error' : ''">											
													<span class="input-group-addon">Apellido(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.p1.lastname" ng-change="candidate.p1.lastname = candidate.p1.lastname.toUpperCase()" ng-required="candidate.p1.firstname" aria-describedby="sizing-addon2" >
												</div>										
											</div>
										</div>																
									</div>
									<div class="col-xs-12">
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.p2.firstname ? 'has-success' : ''">
												<div class="input-group" ng-class="candidate.p2.lastname ? 'has-error' : ''">
													<span class="input-group-addon">Nombre(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.p2.firstname" ng-change="candidate.p2.firstname = candidate.p2.firstname.toUpperCase()" ng-required="candidate.p2.lastname" aria-describedby="sizing-addon2">																																  
												</div>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group" ng-class="candidate.p2.lastname ? 'has-success' : ''">
												<div class="input-group" ng-class="candidate.p2.firstname ? 'has-error' : ''">
													<span class="input-group-addon">Apellido(s)</span>
													<input type="text" class="form-control"  ng-model="candidate.p2.lastname" ng-change="candidate.p2.lastname = candidate.p2.lastname.toUpperCase()" ng-required="candidate.p2.firstname" aria-describedby="sizing-addon2">
												</div>
											</div>
										</div>															
									</div>
									<div class="col-xs-12">
										<div class="col-xs-12">
											<span class="text-danger" role="alert" ng-show="error.authorized_persons[0]" ng-hide="candidate.p1.firstname && candidate.p1.lastname">@{{error.authorized_persons[0]}}</span>
										</div>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="col-xs-12">
										<p>
											<button ng-click="back(active)" class="button alt-colour gray" type="button">
												<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
												<span>Regresar</span>
											</button>
											<button type="submit" ng-show="candidate_registration.$valid" class="button solid">
												<span>Continuar</span>
												<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
											</button>
										</p>
									</div>
								</div>
							</div>
						</form>																
					</div>
				</uib-tab>
				<uib-tab index="3" disable="tabs[3].disable" heading="ENCUESTA CENNI" disable="true">
					<div class="col-xs-12">
						<h4 class="page-header blue-text">ENCUESTAS CENNI</h4>
					</div>
					<div class="col-xs-12">
						<form name="cenniSurvey_form" id="cenniSurvey_form" ng-submit="cenniSurvey_form.$valid && sendCenniSurveyForm(active)">
							<div class="col-xs-12">
								<h4>Datos Estadísticos</h4>								
								<div class="col-xs-6">											
									<div class="form-group" ng-class="cenni_survey.indigenous ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Pertenece usted a un pueblo indígena?</span>
											<select class="form-control" ng-model="cenni_survey.indigenous" required>
												<option value="" ng-hide="true"></option>
												<option value="0">NO</option>
												<option value="1">SI</option>
											</select>											
										</div>
										<span class="text-danger" role="alert" ng-show="error.indigenous[0]" ng-hide="cenni_survey.indigenous">@{{error.indigenous[0]}}</span>
									</div>										
								</div>
								<div class="col-xs-6">
									<div class="form-group animate-show" ng-show="cenni_survey.indigenous == 1" ng-class="cenni_survey.indigenous_people ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Especifique</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.indigenous_people" ng-required="cenni_survey.indigenous == 1" ng-change="cenni_survey.indigenous_people = cenni_survey.indigenous_people.toUpperCase()" aria-describedby="sizing-addon2">
										</div>
										<span class="text-danger" role="alert" ng-show="error.indigenous_people[0]" ng-hide="cenni_survey.indigenous_people">@{{error.indigenous_people[0]}}</span>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<div class="form-group" ng-class="cenni_survey.handicapped ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cuenta usted con capacidades diferentes?</span>
											<select class="form-control" ng-model="cenni_survey.handicapped" required>
												<option value="" ng-hide="true"></option>
												<option value="0">NO</option>
												<option value="1">SI</option>
											</select>
										</div>
										<span class="text-danger" role="alert" ng-show="error.handicapped[0]" ng-hide="cenni_survey.handicapped">@{{error.handicapped[0]}}</span>
									</div>	
								</div>
								<div class="col-xs-6">
									<div class="form-group animate-show" ng-show="cenni_survey.handicapped == 1" ng-class="cenni_survey.disability ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Especifique</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.disability" ng-required="cenni_survey.handicapped == 1" ng-change="cenni_survey.disability = cenni_survey.disability.toUpperCase()" aria-describedby="sizing-addon2">
										</div>
										<span class="text-danger" role="alert" ng-show="error.disability[0]" ng-hide="cenni_survey.disability">@{{error.disability[0]}}</span>
									</div>
								</div>								
							</div>
							<div class="col-xs-12">
								<div class="col-xs-7">
									<div class="form-group animate-show"ng-class="cenni_survey.motive ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Motivo de solicitud de la CENNI:</span>
											<select class="form-control" ng-model="cenni_survey.motive" required>
												<option value="" ng-hide="true"></option>
												<option value="LABORAL">LABORAL</option>
												<option value="ACADEMICO">ACADÉMICO</option>
												<option value="LABORAL_ACADEMICO">LABORAL/ACADÉMICO</option>
												<option value="PERSONAL">PERSONAL</option>
											</select>
										</div>
										<span class="text-danger" role="alert" ng-show="error.motive[0]" ng-hide="cenni_survey.motive">@{{error.motive[0]}}</span>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<h4>Encuesta A</h4>
							</div>
							<div class="col-xs-12">								
								<div class="col-xs-6">
									<div class="form-group" ng-class="cenni_survey.previous_exam ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Había presentado este examen anteriormente?:</span>
											<select class="form-control" ng-model="cenni_survey.previous_exam" required>
												<option value="" ng-hide="true"></option>
												<option value="0">NO</option>
												<option value="1">SI</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-6 animate-show" ng-show="cenni_survey.previous_exam == 1">
									<div class="col-xs-6 form-group" ng-class="cenni_survey.previous_exam_month && cenni_survey.previous_exam_year ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Mes</span>
											<select class="form-control" ng-model="cenni_survey.previous_exam_month" ng-required="cenni_survey.previous_exam == 1">
												<option value="" ng-hide="true"></option>
												<option value="ENERO">ENERO</option>
												<option value="FEBRERO">FEBRERO</option>
												<option value="MARZO">MARZO</option>
												<option value="ABRIL">ABRIL</option>
												<option value="MAYO">MAYO</option>
												<option value="JUNIO">JUNIO</option>
												<option value="JULIO">JULIO</option>
												<option value="AGOSTO">AGOSTO</option>
												<option value="SEPTIEMBRE">SEPTIEMBRE</option>
												<option value="OCTUBRE">OCTUBRE</option>
												<option value="NOVIEMBRE">NOVIEMBRE</option>
												<option value="DICIEMBRE">DICIEMBRE</option>
											</select>																																
										</div>										
									</div>
									<div class="col-xs-6 form-group" ng-class="cenni_survey.previous_exam_month && cenni_survey.previous_exam_year ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Año</span>
											<select class="form-control" ng-model="cenni_survey.previous_exam_year" ng-required="cenni_survey.previous_exam == 1">
												<option value="" ng-hide="true"></option>											
												<option ng-repeat="a in (0 | number: currentYear - 2003) track by $index">@{{currentYear - $index}}</option>
											</select>
										</div>
									</div>	
								</div>
							</div>
							<div class="col-xs-12">								
								<div class="col-xs-12">
									<div class="form-group" ng-class="cenni_survey.how_learned_language ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cómo aprendió el idioma que desea certificar?</span>
											<select class="form-control" ng-model="cenni_survey.how_learned_language" required>
												<option value="" ng-hide="true"></option>
												<option value="DE MANERA AUTODIDACTA">DE MANERA AUTODIDACTA</option>
												<option value="EN UNA ESCUELA DE IDIOMAS">EN UNA ESCUELA DE IDIOMAS</option>
												<option value="A TRAVÉS DE CLASES PRIVADAS">A TRAVÉS DE CLASES PRIVADAS</option>
												<option value="EN LA ESCUELA PRIMARIA">EN LA ESCUELA PRIMARIA</option>
												<option value="EN LA ESCUELA SECUNDARIA">EN LA ESCUELA SECUNDARIA</option>
												<option value="EN LA ESCUELA MEDIA SUPERIOR">EN LA ESCUELA MEDIA SUPERIOR</option>
												<option value="EN UNA INSTITUCIÓN DE EDUCACIÓN SUPERIOR">EN UNA INSTITUCIÓN DE EDUCACIÓN SUPERIOR</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">								
								<div class="col-xs-12">
									<div class="form-group" ng-class="cenni_survey.where_learned_language ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Dónde aprendió el idioma que desea certificar?</span>
											<select class="form-control" ng-model="cenni_survey.where_learned_language" required>
												<option value="" ng-hide="true"></option>
												<option value="EN MÉXICO">EN MÉXICO</option>
												<option value="EN EL EXTRANJERO">EN EL EXTRANJERO</option>												
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12">								
								<div class="col-xs-9">
									<div class="form-group" ng-class="cenni_survey.years_studying_language ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Años que lleva estudiando el idioma que solicita certificar :</span>
											<select class="form-control" ng-model="cenni_survey.years_studying_language" required>
												<option value="" ng-hide="true"></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11 - 15</option>
												<option value="16">MAS DE 15</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-9">
									<h5>Mencione, en su caso, ¿Cuál es el nombre de la Escuela o Institución en la que aprendió el idioma a Certificar?</h5>
									<div class="form-group" ng-class="cenni_survey.institution ? 'has-success' : ''">
										<div class="input-group">
											<span class="input-group-addon">Nombre de la institución</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.institution" ng-change="cenni_survey.institution = cenni_survey.institution.toUpperCase()" aria-describedby="sizing-addon2">
										</div>
									</div>		
								</div>
							</div>
							<div class="col-xs-12">
								<h4>Encuesta B</h4>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-12">
									<div class="form-group" ng-class="cenni_survey.maximum_degree_studies ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cuál es su grado máximo de estudios? </span>
											<select class="form-control" ng-model="cenni_survey.maximum_degree_studies" required>
												<option value="" ng-hide="true"></option>
												<option value="NINGUNO">NINGUNO</option>
												<option value="PREESCOLAR">PREESCOLAR</option>
												<option value="PRIMARIA">PRIMARIA</option>
												<option value="SECUNDARIA">SECUNDARIA</option>
												<option value="FORMACIÓN PARA EL TRABAJO">FORMACIÓN PARA EL TRABAJO</option>
												<option value="BACHILLERATO">BACHILLERATO</option>
												<option value="BACHILLERATO TÉCNICO">BACHILLERATO TÉCNICO</option>
												<option value="TÉCNICO-PROFESIONAL">TÉCNICO-PROFESIONAL</option>
												<option value="TÉCNICO SUPERIOR UNIVERSITARIO O PROFESIONAL ASOCIADO">TÉCNICO SUPERIOR UNIVERSITARIO O PROFESIONAL ASOCIADO</option>
												<option value="LICENCIATURA">LICENCIATURA</option>
												<option value="ESPECIALIDAD">ESPECIALIDAD</option>
												<option value="MAESTRÍA">MAESTRÍA</option>
												<option value="DOCTORADO">DOCTORADO</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-12">									
									<div class="form-group" ng-class="cenni_survey.profession ? 'has-success' : ''">
										<div class="input-group">
											<span class="input-group-addon">¿Cuál es el nombre de la carrera del grado máximo de estudios?</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.profession" ng-change="cenni_survey.profession = cenni_survey.profession.toUpperCase()" aria-describedby="sizing-addon2">
										</div>
									</div>		
								</div>
								
								<div class="col-xs-12">									
									<div class="form-group" ng-class="cenni_survey.profession_area ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cuál es el área del grado máximo de estudios?</span>
											<select class="form-control" ng-model="cenni_survey.profession_area" required>
												<option value="" ng-hide="true"></option>												
												<option value="INGENIERÍA Y TECNOLOGÍA">INGENIERÍA Y TECNOLOGÍA</option>
												<option value="EDUCACIÓN Y HUMANIDADES">EDUCACIÓN Y HUMANIDADES</option>
												<option value="CIENCIAS SOCIALES Y ADMINISTRATIVAS">CIENCIAS SOCIALES Y ADMINISTRATIVAS</option>
												<option value="CIENCIAS DE LA SALUD">CIENCIAS DE LA SALUD</option>
												<option value="CIENCIAS Y ARTE PARA EL DISEÑO">CIENCIAS Y ARTE PARA EL DISEÑO</option>
												<option value="CIENCIAS NATURALES Y EXACTAS">CIENCIAS NATURALES Y EXACTAS</option>
												<option value="NINGUNA">NINGUNA</option>
											</select>											
										</div>
									</div>		
								</div>
								<div class="col-xs-8">									
									<div class="form-group" ng-class="cenni_survey.current_profession ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cuál es su actividad o profesión actual?</span>
											<select class="form-control" ng-model="cenni_survey.current_profession" required>
												<option value="" ng-hide="true"></option>
												<option value="ESTUDIANTE">ESTUDIANTE</option>
												<option value="PROFESOR DE IDIOMA(S)">PROFESOR DE IDIOMA(S)</option>
												<option value="PROFESIONISTA INDEPENDIENTE">PROFESIONISTA INDEPENDIENTE</option>
												<option value="COMERCIANTE">COMERCIANTE</option>
												<option value="EMPLEADO">EMPLEADO</option>
												<option value="EMPRESARIO">EMPRESARIO</option>
												<option value="OTRO">OTRO</option>
												<option value="SIN EMPLEO">SIN EMPLEO</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group" ng-class="cenni_survey.years_experience ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">Años de experiencia:</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.years_experience" aria-describedby="sizing-addon2">
										</div>
									</div>
								</div>
								<div class="col-xs-12">									
									<div class="form-group" ng-class="cenni_survey.level_academic_experience ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Mencione el nivel académico en el que tiene experiencia?</span>
											<select class="form-control" ng-model="cenni_survey.level_academic_experience" required>
												<option value="" ng-hide="true"></option>
												<option value="NINGUNO">NINGUNO</option>
												<option value="PREESCOLAR">PREESCOLAR</option>
												<option value="PRIMARIA">PRIMARIA</option>
												<option value="SECUNDARIA">SECUNDARIA</option>
												<option value="FORMACIÓN PARA EL TRABAJO">FORMACIÓN PARA EL TRABAJO</option>
												<option value="BACHILLERATO">BACHILLERATO</option>
												<option value="BACHILLERATO TÉCNICO">BACHILLERATO TÉCNICO</option>
												<option value="TÉCNICO-PROFESIONAL">TÉCNICO-PROFESIONAL</option>
												<option value="TÉCNICO SUPERIOR UNIVERSITARIO O PROFESIONAL ASOCIADO">TÉCNICO SUPERIOR UNIVERSITARIO O PROFESIONAL ASOCIADO</option>
												<option value="LICENCIATURA">LICENCIATURA</option>
												<option value="ESPECIALIDAD">ESPECIALIDAD</option>
												<option value="MAESTRÍA">MAESTRÍA</option>
												<option value="DOCTORADO">DOCTORADO</option>																							
											</select>											
										</div>
									</div>		
								</div>
								<div class="col-xs-12">									
									<div class="form-group" ng-class="cenni_survey.actual_position ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿Cuál es el nombre de su cargo o puesto actual?</span>
											<input type="text" class="form-control"  ng-model="cenni_survey.actual_position" ng-change="cenni_survey.actual_position = cenni_survey.actual_position.toUpperCase()" aria-describedby="sizing-addon2">											
										</div>
									</div>		
								</div>
								<div class="col-xs-12">									
									<div class="form-group" ng-class="cenni_survey.experience_area ? 'has-success' : 'has-error'">
										<div class="input-group">
											<span class="input-group-addon">¿En qué sector tiene experiencia?</span>
											<select class="form-control" ng-model="cenni_survey.experience_area" required>
												<option value="" ng-hide="true"></option>																								
												<option value="PÚBLICO">PÚBLICO</option>
												<option value="PRIVADO">PRIVADO</option>
												<option value="AMBOS">AMBOS</option>
												<option value="NINGUNO">NINGUNO</option>																						
											</select>											
										</div>
									</div>		
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-12">								
									<p>
										<button ng-click="back(active)" class="button alt-colour gray" type="button">
											<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
											<span>Regresar</span>
										</button>
										<button type="submit" ng-show="cenniSurvey_form.$valid" class="button solid" ng-disabled="disabled">								
											<span>Continuar</span>
											<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										</button>
									</p>
								</div>
							</div>
						</form>
					</div>
				</uib-tab>
				<uib-tab index="4" ng-show="payment.method == 3" disable="tabs[4].disable" heading="ADJUNTAR COMPROBANTE DE PAGO" disable="true">
					<div class="col-xs-12" ng-hide="registration_success">
						<h4 class="page-header blue-text">ADJUNTE COMPROBANTE DE PAGO</h4>
						<p>Adjunte el comprobante del deposito bancario realizado para continuar con el proceso de registro.</p>
						<p>Los formatos permitidos son los siguientes:</p>
						<div class="col-xs-12">
							<ul>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<span>IMAGEN (JPG, JPEG)</span>
								</li>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<span>PDF</span>
								</li>
							</ul>
							<div class="form-group" ng-class="proof_payment_name ? 'has-success' : 'has-error'">
								<div class="input-group">																		
									<span class="input-group-addon" ng-show="proof_payment_name">@{{proof_payment_name}}</span>
									<label class="costum-file-upload btn" ng-class="proof_payment_name ? 'btn-success' : 'btn-danger'">
										<input type="file" ng-model="proof_payment_name" multiple onchange="angular.element(this).scope().setFile(this)">
										<i class="fa fa-cloud-upload"></i> Seleccione un archivo
									</label>																																																
								</div>		
								<br>
								<span class="text-danger" role="alert" ng-show="error.proof_payment[0]" ng-hide="proof_payment_name">@{{error.proof_payment[0]}}</span>						
							</div>
							<div>
								<button ng-click="back(active)" class="button alt-colour gray" type="button">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span>Regresar</span>
								</button>
								<button type="submit" ng-show="proof_payment_name" class="button solid" ng-click="sendForm()">							
									<span>Enviar</span>
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								</button>
							</div>
							<br>
						</div>
					</div>					
				</uib-tab>
			</uib-tabset>
			<div class="col-xs-12" ng-show="registration_success">
				<h4 class="page-header blue-text">HAS COMPLETADO TU PRE-REGISTRO</h4>
				<h5>@{{registration_success_msg}}</h5>
				<br>
				<div class="col-xs-12">
					<a class="home button solid" href="/{{App::getLocale()}}/dtes">
					 	<i class="fa fa-home" aria-hidden="true"></i>
						<span>Inicio</span>
					</a>
				</div>
				<br>
				<br>
				<br>
			</div>			
		</div>		
	</div>
</article>
@endsection

<script type="text/javascript" src="{{asset('angular/lib/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('angular/lib/angular-locale_es-mx.js')}}"></script>
<script type="text/javascript" src="{{asset('angular/lib/ui-bootstrap-tpls-2.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('angular/lib/angular-animate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('angular/lib/angular-route.min.js')}}"></script>

<script type="text/javascript" src="{{asset('angular/controllers/registration.js')}}"></script>

<script type="text/javascript" src="{{asset('angular/services/state.js')}}"></script>
<script type="text/javascript" src="{{asset('angular/services/registration.js')}}"></script>