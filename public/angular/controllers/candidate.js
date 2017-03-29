(function(){
	angular.module('CandidateController',['CandidateService'])
	.controller('CandidatesCtrl', ['$scope', '$routeParams','candidateSVC',
		function($scope, $routeParams, candidateSVC)
		{								
			$scope.params = $routeParams;
			$scope.candidates = [];
			$scope.alerts = [];
			$scope.maxSize = 10;
			$scope.currentPage = 1;
			$scope.itemsPerPage = 50;
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
								
			$scope.getCandidates = function(currentPage, itemsPerPage)
			{
				$scope.alerts = [];
				
				candidateSVC.getCandidates(currentPage, itemsPerPage)
					.then(function(data)
					{
						$scope.candidates = data.data;
						$scope.totalItems = data.total;
						$scope.currentPage = data.current_page;
						$scope.itemsPerPage = data.per_page;
						$scope.index = data.from;
					}, function(error)
					{
						$scope.addAlert('danger', error.msg);
						$scope.applications = [];
					})
			}
			
			$scope.searchCandidates = function(currentPage, itemsPerPage)
			{
				$scope.alerts = [];
				
				if($scope.search_candidate != undefined)
					candidateSVC.getSearchCandidates(currentPage, itemsPerPage, $scope.search_candidate)
						.then(function(data){
							$scope.candidates = data.data;
							$scope.totalItems = data.total;
							$scope.currentPage = data.current_page;
							$scope.itemsPerPage = data.per_page;
							$scope.index = data.from;
						}, function(error){
							$scope.addAlert('danger', error.msg);
							$scope.candidates = [];
						})
			}
			
			$scope.getCandidate = function(){	
													
				candidateSVC.getCandidate($scope.candidate.id)
					.then(function(data){
						$scope.candidate = data.candidate;
						$scope.registration = data.registration;
					},
					function(error){
						//
					});
			}
			
			$scope.updateCandidateStatus = function(status)
			{								
				data = {
					candidate: $scope.candidate.id, 
					registration_status: status,
					application: $scope.registration.application_id
				}
				
				candidateSVC.updateCandidateStatus(data)
					.then(function(data){
						$scope.registration.registration_status = data.status;
						$scope.addAlert('success', data.msg);
					},
					function(error){
											
					});
			}
			
			$scope.pageChanged = function()
			{
				if($scope.search_candidate != null)
					$scope.searchCandidates($scope.currentPage, $scope.itemsPerPage, $scope.search_candidate);
				else
					$scope.getCandidates($scope.currentPage, $scope.itemsPerPage);
			}
			
			$scope.perPageChanged = function(itemsPerPage)
			{
				if($scope.search_candidate != null)
					$scope.searchCandidates(1, itemsPerPage, $scope.search_candidate);
				else
					$scope.getCandidates(1, itemsPerPage);
			}
		}
	])
	.controller('CandidateDetailsCtrl', ['$scope','$location','$routeParams','candidateSVC',
		function($scope, $location, $routeParams, candidateSVC)
		{				
			var params = $routeParams;
									
			candidateSVC.getCandidateDetails(params.candidate_id)
				.then(function(data){
					$scope.candidate = data.data;
				},
				function(error){
					console.log(error.msg);
				});
						
		}		
	])
})();
