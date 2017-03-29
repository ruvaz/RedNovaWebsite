(function(){
	angular.module('UserService', [])
	.factory('userSVC', ['$http', '$q', '$localStorage', 'urls',
		function($http, $q, $localStorage, urls)
		{
			function getUsers()
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/user')
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function createUser(user)
			{
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/user', user)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function updateUser(user)
			{
				var deferred = $q.defer();
				
				$http.put(urls.BASE_API + '/user/' + user.id , user )
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getUser(user)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/user/' + user)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function deleteUser(user)
			{
				var deferred = $q.defer();
				
				$http.delete(urls.BASE_API + '/user/' + user)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
				
			}
			
			return {
				getUsers: getUsers,
				createUser: createUser,
				updateUser: updateUser,
				getUser: getUser,
				deleteUser: deleteUser
			}
		}
	]);
})();
