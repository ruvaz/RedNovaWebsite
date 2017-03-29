 (function(){	
	
	var app = angular.module('dtes', 
							['cfp.loadingBar',
							 'ngRoute', 
							 'directives', 
							 'AuthController',
							 'ApplicationController',
							 'ApplicationHistoryController',							 
							 'VenueController',
							 'OperatorController',
							 'ProductController',
							 'CandidateController',
							 'UserController',
							 'PaymentController',
							 'ngStorage',
							 'ngAnimate',
							 'ngLocale',
							 'ui.bootstrap']);
			
	app.constant('urls',{
		BASE_API: '/apidtes'
	})
	.config(['$routeProvider','$httpProvider','$locationProvider',
		function($routeProvider, $httpProvider, $locationProvider){
			$routeProvider.
				when('/login',{
					templateUrl: '../views_dtes/login.html',
					controller: 'AuthCtrl'
				})
				.when('/home',{
					templateUrl: '../views_dtes/home.html',
					controller: 'HomeCtrl'
				})
				.when('/active-applications',{
					templateUrl: '../views_dtes/aplications.html',
					controller: 'ApplicationsCtrl'
				})
				.when('/application-history',{
					templateUrl: '../views_dtes/details/application_history.html',
					controller: 'ApplicationHistoryCtrl'
				})
				.when('/operators',{
					templateUrl: '../views_dtes/operators.html',
					controller: 'OperatorsCtrl'
				})
				.when('/venues',{
					templateUrl: '../views_dtes/venues.html',
					controller: 'VenuesCtrl'
				})
				.when('/structure-states',{
					templateUrl: '../views_dtes/details/structure_states.html',
					controller: 'StructureStateCtrl'
				})
				.when('/users',{
					templateUrl: '../views_dtes/users.html',
					controller: 'UsersCtrl'
				})
				.when('/payments',{
					templateUrl: '../views_dtes/payments.html',
					controller: 'PaymentsCtrl'
				})
				.when('/products',{
					templateUrl: '../views_dtes/products.html',
					controller: 'ProductsCtrl'
				})				
				.when('/versions-products',{
					templateUrl: '../views_dtes/versions-products.html',
					controller: 'ProductsCtrl'
				})
				.when('/application-details/:application_id',{
					templateUrl: '../views_dtes/details/application.html',
					controller: 'ApplicationDetailsCtrl'
				})
				.when('/candidates',{
					templateUrl: '../views_dtes/candidates.html',
					controller: 'CandidatesCtrl'
				})
				.when('/candidate-details/:candidate_id', {
					templateUrl: '../views_dtes/details/candidate.html',
					controller: 'CandidateDetailsCtrl'
				})
				.otherwise({
					redirectTo: '/login'
				});		
							    
				
			$httpProvider.interceptors.push(['$q','$location','$localStorage','cfpLoadingBar',
				function($q, $location, $localStorage, cfpLoadingBar)
				{
					return{
						'request': function(config){
														
							cfpLoadingBar.start();
							
							config.headers = config.headers || {};
							if($localStorage.token){
								config.headers.Authorization = 'Bearer' + $localStorage.token;
							}
							else{								
								$location.path('/login');								
							}
							return config;
						},
						'responseError': function(response){
							if(response.status === 401 || response.status === 403 || response.status === 400){
								delete $localStorage.token;
								cfpLoadingBar.complete();
								if($location.path() != '/login')
									$location.path('/dtes/login');
							}
							else
								cfpLoadingBar.complete();
								
							return $q.reject(response);
						},
						'response': function(response){
							if($localStorage.token){								
								$httpProvider.defaults.headers.Authorization = 'Bearer' + $localStorage.token;		
							}
							cfpLoadingBar.complete();
							return response;
						}
					};
				}
			]);									
			$locationProvider.html5Mode(true);
		}
	]);
})();