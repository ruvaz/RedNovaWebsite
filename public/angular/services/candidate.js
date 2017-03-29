(function(){
	angular.module('CandidateService',[])
	.factory('candidateSVC', ['$http', '$q', 'urls',
		function($http, $q, urls)
		{
			
			function getCandidates(currentPage, perPage)
			{
				page = '';
				
				if(currentPage > 1)
					page = '/?page='+ currentPage + '&per_page='+perPage;
				else
					page = '/?per_page='+perPage;
				
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/candidate' + page)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getCandidate(candidate)
			{
				var deferred = $q.defer();							
				
				$http.get(urls.BASE_API + '/candidate/' + candidate)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getCandidateDetails(candidate)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/candidate-information/' + candidate)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			
			function getSearchCandidates(currentPage, perPage, search_candidate)
			{
				page = '';
				
				if(currentPage > 1)
					page = '/?page=' + currentPage + '&per_page=' + perPage;
				else
					page = '/?per_page=' + perPage;
					
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/candidate/search/' + search_candidate + page)
				.success(function(data){
					deferred.resolve(data);					
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function updateCandidateStatus(data)
			{
				var deferred = $q.defer();
				
				$http.put(urls.BASE_API + '/candidate-status', data)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				});
				
				return deferred.promise;
			}
			
			function updateCandidatesStatus(data)
			{
				var deferred = $q.defer();
				
				$http.put(urls.BASE_API + '/candidates-status', data)
				.success(function(data){
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);					
				})
				
				return deferred.promise;
			}
					
			function generateLists(application)
			{
				var deferred = $q.defer();
				
				$http.get(urls.BASE_API + '/candidate/generate-lists/' + application, { responseType: 'arraybuffer' })
				.success(function(data, status, headers){										
					var headers = headers;
					var blob = new Blob([data],{type:headers['content-type']});
					var link = document.createElement('a');
					link.href = window.URL.createObjectURL(blob);
					link.download = "Lista.pdf";
					link.click();
					deferred.resolve(data);
				})
				.error(function(error){
					deferred.reject(error);
				})
				
				return deferred.promise;
			}
			return{
				getCandidates: getCandidates,
				getCandidate: getCandidate,
				getSearchCandidates: getSearchCandidates,				
				getCandidateDetails: getCandidateDetails,
				updateCandidateStatus: updateCandidateStatus,
				updateCandidatesStatus: updateCandidatesStatus,
				generateLists: generateLists
			}
		}
	]);
})();
