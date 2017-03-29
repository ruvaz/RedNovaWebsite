(function(){
	var app = angular.module('ResetPWD',['ResetService','ui.bootstrap']);
	
	app.controller('Pwd', ['$scope', '$location', 'resetSVC',
		function($scope, $location, authSVC)
		{			
			$scope.user = {};
			$scope.alerts = [];
			$scope.success = false;
				
			$scope.resetPassword = function()
			{
				$scope.error = null;
				$scope.alerts = [];
				
				authSVC.resetPassword($scope.user)
					.then(function(data){
						$scope.success = true;
						$scope.addAlert('success', data.msg);
					},
					function(error){
						$scope.error = error;
						if(error.error)
							$scope.addAlert('danger',error.error);						
					});
			}
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};					
		}
	]);			
})();


(function(){
	angular.module('ResetService',[])
	.factory('resetSVC',['$http', '$q',
		function($http, $q)
		{
			function resetPassword(data)
			{
				var deferred = $q.defer();
				
				$http.post('/dtes/password-reset', data)
				.success(function(data){
					deferred.resolve(data);	
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;				
			}
			
			return {
				resetPassword: resetPassword
			}
		}
	]);
})();
