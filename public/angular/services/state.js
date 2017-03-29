(function(){
	angular.module('StateService',[])
		.factory('stateSVC',['$http', '$q','urls', function( $http, $q, urls){
			
			function getStates()
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/state')
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});	
				
				return deferred.promise;							
			}
			
			function getCities(state_id)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/cities-state/' + state_id)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function states()
			{
				var states = [{"name":"AGUASCALIENTES"}, {"name":"BAJA CALIFORNIA"}, {"name":"BAJA CALIFORNIA SUR"}, {"name":"CAMPECHE"}, {"name":"CHIAPAS"}, {"name":"CHIHUAHUA"}, {"name":"CIUDAD DE M\u00c9XICO"}, {"name":"COAHUILA"}, {"name":"COLIMA"}, {"name":"DURANGO"}, {"name":"ESTADO DE M\u00c9XICO"}, {"name":"GUANAJUATO"}, {"name":"GUERRERO"}, {"name":"HIDALGO"}, {"name":"JALISCO"}, {"name":"MICHOAC\u00c1N"}, {"name":"MORELOS"}, {"name":"NAYARIT"}, {"name":"NUEVO LE\u00d3N"}, {"name":"OAXACA"}, {"name":"PUEBLA"}, {"name":"QUER\u00c9TARO"}, {"name":"QUINTANA ROO"}, {"name":"SAN LUIS POTOS\u00cd"}, {"name":"SINALOA"}, {"name":"SONORA"}, {"name":"TABASCO"}, {"name":"TAMAULIPAS"}, {"name":"TLAXCALA"}, {"name":"VERACRUZ"}, {"name":"YUCAT\u00c1N"}, {"name":"ZACATECAS"}];
				return states;
			}
			
			function newState(state)
			{
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/state',state)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function newCity(city){
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/city',city)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getStructureStates()
			{				
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/structure-states')
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})	
				
				return deferred.promise;
			}
			
			return{
				getStates: getStates,
				getCities: getCities,
				states: states,
				newState: newState,
				newCity: newCity,
				getStructureStates: getStructureStates
			}
		}]);
})();
