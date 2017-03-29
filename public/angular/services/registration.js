(function(){
	angular.module('RegistrationService',[])
		.factory('registrationSVC',['$http','$q', 
			function($http,$q){
				function getApplication(application)
				{
					var deferred = $q.defer();
					
					$http.get('/website/dtes/application/' + application)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				
				}
				
				function newCandidate(candidate,cenni_survey,candidate_application,file)
				{					
					
					var deferred = $q.defer();
					
					var fd = new FormData();
					
					fd.append('proof_payment', file);
					fd.append('candidate', JSON.stringify(candidate));
					fd.append('cenni_survey', JSON.stringify(cenni_survey));
					fd.append('candidate_application', JSON.stringify(candidate_application));
					
					$http.post('/website/dtes/new-candidate',
								fd,
								{
									headers: {'Content-type': undefined},
									transformRequest: function(){return fd}
								})
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function validateFolioME(application,folioME)
				{
					var deferred = $q.defer();
					
					$http.get('/website/dtes/application/' + application + '/' + folioME)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function validateCURP(application,curp)
				{
					var deferred = $q.defer();
					
					$http.get('/website/dtes/candidate/'+ application +'/' + curp)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
										
					return deferred.promise;
				}
				
				return {
					getApplication: getApplication,
					newCandidate: newCandidate,
					validateFolioME: validateFolioME,
					validateCURP: validateCURP
				}
			}
		]);
})();
