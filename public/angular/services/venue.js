(function(){
	angular.module('VenueService', [])
		.factory('venueSVC', ['$http', '$q', 'urls', function($http, $q, urls){
			
			function getVenuesByCityState(city_id)
			{
				var deferred = $q.defer();
				$http.get(urls.BASE_API + '/venues-city/' + city_id)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function getVenues(currentPage,perPage){				
				page = '';
				
				if(currentPage > 1)
					page = '/?page='+ currentPage + '&per_page='+perPage;
				else
					page = '/?per_page='+perPage;
					
				var deferred = $q.defer();
				$http.get(urls.BASE_API + '/venue' + page)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);					
				});
				
				return deferred.promise;
			}
			
			function createVenue(venue){
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/venue', venue)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function getVenue(venue)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/venue/'+ venue)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
				
			}
			
			function updateVenue(venue)
			{
				var deferred = $q.defer();
				
				$http.put(urls.BASE_API + '/venue/'+ venue.id, venue)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getSearchVenues(currentPage,perPage,search_venue)
			{
				
				page = '';
				
				if(currentPage > 1)
					page = '/?page='+ currentPage + '&per_page='+perPage;
				else
					page = '/?per_page='+perPage;
				
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/venue/search/'+ search_venue + page)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
						
			return{
				getVenuesByCityState: getVenuesByCityState,
				getVenues: getVenues,
				getVenue: getVenue,
				createVenue: createVenue,
				updateVenue: updateVenue,
				getSearchVenues: getSearchVenues		
			}
			
		}]);
})();
