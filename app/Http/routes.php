<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Home page

Route::get('/internet', function(){
	view()->addNamespace('internet', base_path('internet'));
	return view('internet::index');
});

Route::get('/testing', function(){
	return redirect()->away('http://dtes.rednovaconsultants.com'); 
});

Route::get('/candidate-list', 'RegisterController@emailTemplate');
// Route::get('/email-payment', 'CandidateController@emailTemplate');


// homw for website
Route::get('/', function(){
	App::setLocale('en');
	return view('web_site.home');
});

Route::get('paypal/success-payment-notification','UtilsController@paypalOptPaymentNotification');

Route::group(array('middleware' => 'website'), function(){		
	
	// english routes
	Route::group(array('prefix' => 'en'), function(){
		
		Route::get('/', function(){
			return view('web_site.home');
		});
		
		// who-we-are views		
		Route::get('who-we-are', function(){
			return view('web_site.who_we_are');
		});
		// professional-development views
		Route::get('professional-development', function(){		
			return view('web_site.professional_development.home');
		});
		// exams views
		Route::get('exams', function(){
			return view('web_site.exams.home');
		});
		// other-services view		
		Route::get('other-services', function(){		
			return view('web_site.other_services.home');
		});
		// faqs view
		Route::get('faqs', function(){		
			return view('web_site.faqs');
		});
		// glosary view
		Route::get('glossary', function(){
			return view('web_site.glosary');
		});
		// send-message view
		Route::get('send-message', function(){		
			return view('web_site.send_message');
		});
		// politica de privacidad view
		Route::get('politica-de-privacidad', function(){		
			return redirect('es/politica-de-privacidad');
		});
		// derechos arco view 		
		Route::get('derechos-arco', function(){		
			return redirect('es/derechos-arco');
		});	
		// authorized centers view
		Route::get('dtes/authorized-centers',function(){
			return view('web_site.exams.dtes_authorized_centers');
		});
		
		//--------------- URL SERVICES ----------------------------------
	
		Route::get('dtes',function(){		
			return view('web_site.exams.dtes');
		});
		
		Route::get('opt',function(){
			return view('web_site.exams.opt');
		});
		
		Route::get('cet', function(){		
			return view('web_site.professional_development.cet');
		});
		
		Route::get('cec', function(){		
			return view('web_site.professional_development.cec');
		});
		
		Route::get('dtes/registration','RegisterController@getApplicationsUpcoming');
		Route::get('dtes/registro','RegisterController@getApplicationsUpcoming');
		Route::get('dtes/candidate-registration/{uuid}/{venue_name}','RegisterController@candidateRegistration');
		Route::get('dtes/paypal-payment','RegisterController@paypalPayment');
		
		Route::post('opt/payment-notification','UtilsController@optPaymentNotification');
		
		Route::put('send-message','UtilsController@sendMessage');
				
		Route::get('website/authorized-centers','RegisterController@authorizedCenters');
		
	});
	
	// spanish routes
	Route::group(array('prefix' => 'es'), function(){
		
		Route::get('/', function(){
			return view('web_site.home');
		});
			
		// quienes-somos views
		Route::get('quienes-somos', function(){		
			return view('web_site.who_we_are');
		});
		// desarrollo-profesional and professional-development views
		Route::get('desarrollo-profesional', function(){		
			return view('web_site.professional_development.home');
		});
		// examenes views
		Route::get('examenes', function(){	 	
			return view('web_site.exams.home');
		});
		// otros-servicios view
		Route::get('otros-servicios', function(){		
			return view('web_site.other_services.home');
		});
		// preguntas-frecuentes view						
		Route::get('preguntas-frecuentes', function(){		
			return view('web_site.faqs');
		});
		// glosario view				
		Route::get('glosario', function(){		
			return view('web_site.glosary');
		});
		// enviar-mensaje view		
		Route::get('enviar-mensaje', function(){		
			return view('web_site.send_message');
		});
		// politica de privacidad view
		Route::get('politica-de-privacidad', function(){		
			return view('web_site.policy_privacy');
		});
		Route::get('derechos-arco', function(){		
			return view('web_site.derechos_arco');
		});
		// centros autorizados view		
		Route::get('dtes/centros-autorizados',function(){
			return view('web_site.exams.dtes_authorized_centers');
		});
		
		//--------------- URL SERVICES ----------------------------------
	
		Route::get('dtes',function(){		
			return view('web_site.exams.dtes');
		});
		
		Route::get('opt',function(){
			return view('web_site.exams.opt');
		});
		
		Route::get('cet', function(){		
			return view('web_site.professional_development.cet');
		});
		
		Route::get('cec', function(){		
			return view('web_site.professional_development.cec');
		});
		
		Route::get('dtes/registration','RegisterController@getApplicationsUpcoming');
		Route::get('dtes/registro','RegisterController@getApplicationsUpcoming');
		Route::get('dtes/candidate-registration/{uuid}/{venue_name}','RegisterController@candidateRegistration');
		Route::get('dtes/paypal-payment','RegisterController@paypalPayment');
		Route::get('website/authorized-centers','RegisterController@authorizedCenters');
		
		Route::post('opt/payment-notification','UtilsController@optPaymentNotification');		
		Route::put('send-message','UtilsController@sendMessage');
				
	});

	// change language in any url from rednova website
	Route::get('/{local}/change/{url}/{url2?}',function($local,$url,$url2 = ""){
		
		if($url2)
			$url = $url.'-'.$url2;

		if($url)
			$new_url = trans('messages.urls.'.$url);
		else
			$new_url = "";
		return redirect('/'.$local.'/'.$new_url);
	//--------------------------------------------------------------		
	});
	
});

// application data for candidate registration AJAX requests
	// RegisterController
Route::get('website/dtes/application/{uuid}','RegisterController@getApplicationByUUID');
Route::get('website/dtes/application/{application}/{folioME}','RegisterController@validateFolioME');
Route::get('website/dtes/candidate/{application}/{curp}','RegisterController@validateCURP');
Route::get('website/dtes/payment/{application}/{product_version}','RegisterController@downloadPaymentFormat');
Route::get('website/dtes/wire-transfer-payment/{application}/{product_version}','RegisterController@downloadBillPaymentFormat');
Route::post('website/dtes/new-candidate','RegisterController@newCandidate');

	// UtilsController
Route::get('website/refresh-captcha', 'UtilsController@refreshCaptcha');



// DTES ADMIN WEB SITE
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//password reset routes
Route::get('dtes/password-reset/{email}/{token}', 'Auth\PasswordController@resetForm');
Route::post('dtes/password-reset', 'Auth\PasswordController@postReset');

// urls for API dtes
Route::group(array('prefix' => 'apidtes'), function(){
	
	App::setLocale('es');
	
	// login
	Route::post('signin-admin','UserController@signinAdmin');
	
	// reset password routes
	Route::get('password-reset/{email}', 'Auth\PasswordController@postEmail');
	
	// token validation
	Route::group(array('middleware' => 'jwt.auth'),function(){
		
		// StateController
		Route::resource('state','StateController', array('except' => array('create', 'edit')));
	
		// CityController
		Route::resource('city','CityController', array('except' => array('create', 'edit')));		
		Route::get('cities-state/{id}', array('as' => 'cities-state', 'uses' => "CityController@citiesByState"));
		
		// VenueController		
		Route::resource('venue','VenueController', array('except' => array('create', 'edit')));
		Route::get('venues-city/{id}',array('as' => 'venues-city', 'uses' => 'VenueController@venuesByCity'));
		Route::get('venue/search/{text}',array('as' => 'search', 'uses' => 'VenueController@searchVenues'));
		
		// ApplicationController
				
		Route::post('application/share-link',array('as' => 'share-link', 'uses' => 'ApplicationController@shareApplicationLink'));
		Route::get('application-history/{initial_date}/{final_date?}',array('as'=>'application-history', 'uses'=>'ApplicationController@getApplicationHistory'));
		Route::get('application-detail/{application}',array('as'=>'application-detail', 'uses'=>'ApplicationController@getApplicationDetail'));
		Route::get('application/search/{text}',array('as' => 'search', 'uses' => 'ApplicationController@searchApplications'));		
		Route::resource('application','ApplicationController', array('except' => array('create', 'edit')));
		// ProductController
		Route::resource('product','ProductController', array('except' => array('create', 'edit')));
		Route::get('product-list','ProductController@getListProducts');

		// UserController		
		Route::resource('user','UserController', array('except' => array('create', 'edit')));
		
		// OperatorController
		Route::resource('operator','OperatorController', array('except' => array('create', 'edit')));
		Route::get('operator-list', array('as' => 'operator-list', 'uses' => 'OperatorController@getOperatorsList'));
		
		// ProductTypeController
		Route::resource('product-type','ProductTypeController', array('except' => array('create', 'edit')));

		// CandidateController		
		Route::resource('candidate','CandidateController', array('except' => array('create', 'edit')));
		Route::get('candidate/generate-lists/{application}',array('as' => 'generate-lists', 'uses' => 'CandidateController@generateLists'));		
		Route::get('candidate/search/{text}',array('as' => 'search', 'uses' => 'CandidateController@searchCandidates'));
		Route::get('candidate-detail/{application_id}/{candidate_id}',array('as'=> 'candidate-detail', 'uses' => 'CandidateController@candidateDetail'));
		Route::get('candidate-information/{candidate}', array('as' => 'candidate-information', 'uses' => 'CandidateController@candidateInformation'));
		Route::put('candidate-status', 'CandidateController@candidateStatus');
		Route::put('candidates-status', 'CandidateController@candidatesStatus');
		
		
		// StatisticsController
		Route::get('structure-states',array('as'=>'structure-states', 'uses'=>'StatisticsController@getStructureStates'));		
		
	});	

	// show proof payment form candidate registration
	Route::get('payment/{filename}','CandidateController@showFile');

});

// urls for views DTES admin website with angularjs router
Route::group(array('prefix' => 'dtes'), function(){
    Route::any('{path?}/', function()
    {
    	return view('dtes.index');
    })->where('path', '.*');
});

