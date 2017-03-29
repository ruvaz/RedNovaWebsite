@extends('layouts/master')

@section('title','Mensaje')

@section('content')
<section class="banner-hld wrapper static-img clearfix">
	<img src="../images/slider/contactus.jpg" id="ctl00_mainC_HeaderBanner_imgB">		   		    
</section>	
<p></p><br>			
<div class="wrapper">							
    <div class="inner-hld">		
    	<h1 id="ctl00_mainC_titleH1" class="browerheadertitle">{{trans('messages.send_message.title')}}</h1>
    </div>
</div>	    
<p></p><br>
<section class="contact-form-hld clearfix" ng-app="sendMessage" ng-controller="MessageCtrl">
	<div class="globalMenu" ng-show="success" style="color: #FFF;text-align: center;position: fixed;top: 0;height: auto;padding: 18px;width: 100%;z-index: 2">
	    <div id="ctl00_HeaderTop_contentB1">
			<div class="wrapper">
				<div>@{{success}}</div>
			</div>
		</div>
	</div>
	<div id="ctl00_mainC_contactusformblock" ng-init="captcha = '{{captcha_src()}}'">
		<div class="wrapper">									
				<div class="inner-hld">
					<form id="message_form" name="message_form" ng-submit="message_form.$valid && sendMessageForm('{{App::getLocale()}}')" novalidate>
						<div class="row clearfix">
							<div class="col-6">
								<div class="form-control">
									<label>
										{{trans('messages.send_message.full_name')}}
										<span>*</span>
									</label>
									<input type="text" ng-model="data.full_name" ng-required="true"/>
									<span class="error" ng-show="errors.full_name[0]">@{{errors.full_name[0]}}</span>
								</div>	
							</div>
							<div class="col-6">
								<div class="form-control">
									<label>
										{{trans('messages.phone')}}
										<span>*</span>
									</label>
									<input type="number" name="phone" ng-model="data.phone" ng-required="true"/>
									<span class="error" ng-show="errors.phone[0]">@{{errors.phone[0]}}</span>
								</div>	
							</div>
							<div class="clear"></div>
							<div class="col-6">
								<div class="form-control">
									<label>
										{{trans('messages.send_message.email_response')}}
										<span>*</span>
									</label>
									<input type="email" name="email" ng-model="data.email" ng-required="true"/>
									<span class="error" ng-show="errors.email[0]">@{{errors.email[0]}}</span>
								</div>	
							</div>
						</div>
						<div class="feedback-hld">
							<h3>
								{{trans('messages.message')}}
								<span>*</span>
							</h3>
							<textarea ng-model="data.message" name="message" ng-required="true"></textarea>
							<span class="error" ng-show="errors.message[0]">@{{errors.message[0]}}</span>
						</div>
						<div class="col-6">
							<div class="form-control" id="captcha">
								<label>
									{{trans('messages.send_message.captcha_description')}}
									<span>*</span>
								</label>
								<img ng-src="@{{captcha}}" style="width: 170px"/>
								<i class="fa fa-refresh" ng-click="refreshCaptcha()" ng-show="refresh_captcha_count < 3" style="vertical-align: top; font-size: 30px;margin:8px;cursor: pointer"></i>								
								<input type="text" name="captcha" ng-model="data.captcha" ng-required="true" ng-minlength="5" ng-maxlength="5"/>
								<span class="error" ng-show="errors.captcha[0]">@{{errors.captcha[0]}}</span>								
							</div>
						</div>
						<div class="clear"></div>
						<div class="col-6">							
							<button class="btn-default red" ng-hide="sending" ng-disabled="message_form.$invalid" ng-class="message_form.$invalid ? 'disabled':''" type="submit"/>
								<span>{{trans('messages.submit')}}</span>
								<i class="fa fa-arrow-right fr"></i>
							</button>
						</div>
					</form>
				</div>						
			</section>
		</div>
	</div>	
</section>
<script src="{{asset('angular/lib/angular.min.js')}}"></script>
<script src="{{asset('angular/send_message.js')}}"></script>
@endsection