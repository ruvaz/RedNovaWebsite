(function(){
	angular.module('OperatorService',[])
		.factory('operatorSVC',['$http','$q','$localStorage','urls',
			function($http,$q,$localStorage,urls){
				function getOperatorsList()
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/operator-list')
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function getOperators()
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/operator')
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					})
					
					return deferred.promise;
				}
				
				function newOperator(operator)
				{
					var deferred = $q.defer();
					
					$http.post(urls.BASE_API + '/operator', operator)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					})
					
					return deferred.promise;
				}
				
				function getOperator(operator)
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/operator/' + operator)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					return deferred.promise;
				}
				
				function updateOperator(operator)
				{
					var deferred = $q.defer();
					
					$http.put(urls.BASE_API + '/operator/' + operator.id, operator)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					return deferred.promise;
				}
				
				return{
					getOperatorsList: getOperatorsList,
					getOperators: getOperators,
					newOperator: newOperator,
					getOperator: getOperator,
					updateOperator: updateOperator
				}
			}
		]);
})();
