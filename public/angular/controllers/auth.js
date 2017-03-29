(function(){
	angular.module('AuthController',['AuthService'])
	
	.controller('AuthCtrl',['$scope','$routeParams','$location','$localStorage','authSVC',
		function($scope, $routeParams, $location, $localStorage, authSVC){
			$scope.name = "AuthCtrl";
			$scope.params = $routeParams;			
			$scope.token = $localStorage.token;
           	$scope.tokenClaims = authSVC.getClaimsFromToken();
           	$scope.alerts = [];           	
            $scope.success = false;
            $scope.count = 0;
           	
           	function successAuth(res)
           	{
           		$localStorage.token = res.token;
               	$location.path('/home');
           	}
			
			$scope.loginForm = function(){
				
				$scope.alerts = [];
				
				authSVC.signin($scope.user)
				.then(function(data)
				{
					successAuth(data);
				},
				function(error)
				{
					$scope.addAlert('danger', 'Verifica tu correo electrónico y contraseña');
				});
			}
			
			$scope.passwordResetForm = function()
			{				
				$scope.count = $scope.count + 1; 
				$scope.alerts = [];
				$scope.success = true;
				
				if($scope.user.email)
					authSVC.passwordResetEmail($scope.user.email)
					.then(function(data){						
						$scope.addAlert('success', 'Hemos enviado un correo electrónico a tu bandeja con los pasos para restaurar tu contraseña.')						
					},
					function(error){
						$scope.addAlert('danger', error.msg);
						$scope.success = false;
					});
			}	
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
							
		}
	])
	
	.controller('HomeCtrl',['$scope','authSVC','$localStorage','$location',
		function($scope, authSVC, $localStorage, $location)
		{
			
			$scope.token = $localStorage.token;
			$scope.logout = function(){
				authSVC.logout();
				$location.path('dtes/login');
			}
		}	
	])

	.controller('AccordionCtrl',['$scope','$location', 
		function ($scope,$location) {
		  $scope.oneAtATime = true;
		  $scope.status = {
		    isCustomHeaderOpen: false,
		    isFirstOpen: true,
		    isFirstDisabled: false
		  };
		}
	]);
})();
