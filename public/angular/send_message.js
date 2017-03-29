(function(){
	var app = angular.module('sendMessage',[]);
	
	app.controller('MessageCtrl',['$scope','$q','$http','$timeout', function($scope, $q, $http,$timeout){
		
		$scope.errors = {};
		$scope.refresh_captcha_count = 0;
		$scope.data = {};
		$scope.sending = false;
						
		$scope.sendMessageForm = function(lang)
		{
			$scope.lang = lang;
			$scope.sending = true;
											
			if(lang == 'en' || lang == 'es')
				$scope.request($scope.data)
					.then(function(data){
						$scope.success = data.msg;
						$timeout(function(){
							$scope.success = null;
						},5000);
						$scope.data = {};
						$scope.refreshCaptcha();
						$scope.errors = {};
						$scope.sending = false;						
					},
					function(error){
						$scope.errors = error.errors;						
						$scope.sending = false;
					});			
		}
		
		$scope.refreshCaptcha = function ()
		{			
			$scope.getCaptcha()
				.then(function(data){					
					$scope.captcha = data.captcha;					
					$scope.data.captcha = '';										
					$scope.refresh_captcha_count = $scope.refresh_captcha_count + 1;
				},function(error){
					// console.log(error);
				});
		}
		
		$scope.getCaptcha = function()
		{
			var deferred = $q.defer();
			
			$http.get('/website/refresh-captcha')
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});
			
			return deferred.promise;
		}
		
		$scope.request = function(data){
			var deferred = $q.defer();
			
			$http.put('/' + $scope.lang + '/send-message',data)
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(error){
				deferred.reject(error);
			});
			
			return deferred.promise;
		}
		
	}]);
	
})();
