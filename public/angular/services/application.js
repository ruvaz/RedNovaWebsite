(function(){
	angular.module('ApplicationService',[])
	.factory('applicationSVC', ['$http', '$q','$localStorage','urls', 
		function($http, $q,$localStorage,urls){
		
			function getApplications(currentPage, perPage)
			{
				
				page = '';
				
				if(currentPage > 1)
					page = '/?page=' + currentPage + '&per_page=' + perPage;
				else
					page = '/?per_page=' + perPage;
				
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/application' + page)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function createApplication(application)
			{
				var deferred = $q.defer();
				
				$http.post(urls.BASE_API + '/application', application)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function getApplication(application)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/application/' + application)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function updateApplication(application)
			{
				var deferred = $q.defer();
				
				$http.put(urls.BASE_API + '/application/' + application.id, application)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function getApplicationDetail(application)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/application-detail/' + application)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getApplicationHistory(initial_date, final_date)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/application-history/' + initial_date + '/' + final_date)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			} 
			
			function getSearchApplications(currentPage, perPage, search_application)
			{
				page = '';
				
				if(currentPage > 1)
					page = '/?page=' + currentPage + '&per_page=' + perPage;
				else
					page = '/?per_page=' + perPage;
					
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/application/search/' + search_application + page)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function shareApplicationLink(notification)
			{
				var deferred = $q.defer();
				
				data = {
					uuid: notification.uuid,
					contact: notification.contact,
					email: notification.email
				}
								
				$http.post(urls.BASE_API + '/application/share-link', data)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error)
				});
				
				return deferred.promise;
			}
			
			return{
				getApplications: getApplications,
				createApplication: createApplication,
				getApplication: getApplication,
				updateApplication: updateApplication,
				getApplicationHistory: getApplicationHistory,
				getApplicationDetail: getApplicationDetail,
				getSearchApplications: getSearchApplications,
				shareApplicationLink: shareApplicationLink
			};
		}	
	])
})();
