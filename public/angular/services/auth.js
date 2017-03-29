(function(){
	angular.module('AuthService',[])
	.factory('authSVC',['$q','$http','$localStorage','urls',
		function($q, $http,$localStorage, urls){
			function urlBase64Decode(str){
				var output = str.replace('-','+').replace('_','/');
				
				switch(output.lenght % 4)
				{
					case 0:
						break;
					case 2:
						output += '==';
						break;
					case 3:
						output += '=';
					default:
						delete $localStorage.token;
				}
				return window.atob(output);
			}
			
			function getClaimsFromToken()
			{
				var token = $localStorage.token;
				var user = {};
				if(typeof token !== 'undefined')
				{
					var encoded = token.split('.')[1];
					user = JSON.parse(urlBase64Decode(encoded));
				}
				return user;
			}
			
			function logout()
			{
				delete $localStorage.token;
			}						
			
			function signin(user){
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/signin-admin',user)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function passwordResetEmail(email)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/password-reset/' + email)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}		
			
			return{
				signin: signin,
				getClaimsFromToken: getClaimsFromToken,
				logout: logout,
				passwordResetEmail: passwordResetEmail
			}
		}
	]);
})();
