(function(){
	angular.module('ApplicationController',['ApplicationService','CandidateService','StateService','VenueService','ProductService','OperatorService'])
	.controller('ApplicationsCtrl',['$scope','$location','$uibModal','applicationSVC',
		function($scope, $location,$uibModal, applicationSVC){			
			
			$scope.applications = [];
			$scope.alerts = [];
			$scope.show_details = false;
			
			$scope.maxSize = 10;
			$scope.currentPage = 1;
			$scope.itemsPerPage = 15;			
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
			
			$scope.getApplications = function(currentPage, itemsPerPage)
			{
				$scope.search_application = null;
				$scope.alerts = [];
				
				applicationSVC.getApplications(currentPage, itemsPerPage)
					.then(function(data)
					{
						$scope.applications = data.data;	
						
						$scope.totalItems = data.total;
						$scope.currentPage = data.current_page;
						$scope.itemsPerPage = data.per_page;
						$scope.index = data.from;
													
					},
					function(error)
					{	
						$scope.applications = [];				
						$scope.addAlert('danger',error.msg);						
					});		
			}
			
			$scope.searchApplications = function(currentPage, itemsPerPage)
			{
				
				$scope.alerts = [];
				
				if($scope.search_application != undefined)
					applicationSVC.getSearchApplications(currentPage, itemsPerPage, $scope.search_application)
						.then(function(data)
						{
							$scope.applications = data.data;
							$scope.totalItems = data.total;
							$scope.currentPage = data.current_page;
							$scope.index = data.from;
						},
						function(error){
							$scope.addAlert('danger', error.msg);
							$scope.applications = [];
						})
			}
			
			$scope.openNewApplicationModal = function(){
				var modalInstance = $uibModal.open({
					templateUrl: 'NewApplicationContent.html',
					controller: 'ModalApplicationCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						applications: function(){
							return $scope.applications;
						},
						application: null
					}
				});
			};
			
			$scope.openUpdateApplicationModal = function(){
				var modalInstance = $uibModal.open({
					templateUrl: 'UpdateApplicationContent.html',
					controller: 'ModalApplicationCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						applications: function(){
							return $scope.applications;
						},
						application: function(){
							return $scope.application;
						}
					}
				});
			};
			
			$scope.getApplication = function(application, index)
			{																		
				
				applicationSVC.getApplication(application.id)
					.then(function(data){
						
						if(data.data.payment === '1')
							data.data.payment = true;
						else
							data.data.payment = false;
							
						if(data.data.type == 'CERRADA')
							data.data.type = 'close';
						else
							data.data.type = 'open';
						
						$scope.application = data.data;
						$scope.application.index = index;
						$scope.openUpdateApplicationModal();
					},
					function(error){
						$scope.addAlert('danger',error.msg);
					});
			}
			
			$scope.pageChanged = function()
			{
				if($scope.search_application != null)
					$scope.searchApplications($scope.currentPage, $scope.itemsPerPage, $scope.search_application)
				else
					$scope.getApplications($scope.currentPage, $scope.itemsPerPage);	
			}
			
			$scope.perPageChanged = function(itemsPerPage)
			{
				if($scope.search_application != null)
					$scope.searchApplications(1,itemsPerPage, $scope.search_application);
				else
					$scope.getApplications(1, itemsPerPage);
			}
		}		
	])
	.controller('ModalApplicationCtrl',['$scope','$routeParams','$uibModalInstance','applicationSVC','stateSVC', 'venueSVC','productSVC','operatorSVC','applications','application',
		function($scope,$routeParams,$uibModalInstance,applicationSVC,stateSVC,venueSVC,productSVC,operatorSVC,applications,application){				
			$scope.success = null;
			$scope.currentDate = Date;
			$scope.flag = true;
			$scope.applications = applications;	
			$scope.types = [];		
														
			if(application){
				$scope.state_id = application.venue.state_id;
				$scope.city_id = application.venue.city_id;
				$scope.application = application;
				$scope.product_types = $scope.application.product.types;		
				
				angular.forEach($scope.application.product_types, function(value, key){
					$scope.product_types.filter(function(type,i){
						if(type.id == value.id)
							$scope.types[type.id] = true;
					});
				});
						
				$scope.status = true;
				
				$scope.initial_registration_date_obj = new Date(application.initial_registration_timestamp);
				$scope.initial_registration_time_obj = new Date(application.initial_registration_timestamp);
				$scope.final_registration_date_obj = new Date(application.final_registration_timestamp);
				$scope.final_registration_time_obj = new Date(application.final_registration_timestamp);
				$scope.application_date_obj = new Date(application.application_timestamp);
				$scope.application_time_obj = new Date(application.application_timestamp);
			}
			else{
				$scope.application = {};
				$scope.application.payment = true;
			}
																					
			$scope.popup1 = {};
		    $scope.popup2 = {};
		    $scope.popup3 = {};
		    	  	    				
			$scope.popup1.opened = false;			
			$scope.popup2.opened = false;
			$scope.popup3.opened = false;
			
			$scope.format = 'dd-MMM-yyyy';
			$scope.altInputFormats = ['dd-MMM-yyyy'];
			$scope.dateOptions = {
				dateDisabled: disabled,
				minDate: new Date(),
				startingDay: 1
			};
			$scope.time1 = new Date();
			$scope.time2 = new Date();
			$scope.time3 = new Date();
			$scope.hstep = 1;
	  		$scope.mstep = 10;
										
			stateSVC.getStates()
				.then(function(data)
				{
					$scope.states = data.data;					
				},
				function(error){
					$scope.msg = error.msg;
				});
			
			productSVC.getListProducts()
				.then(function(data){
					$scope.products = data.data;					
				},
				function(error){
					$scope.msg = error.msg;
				});
			
			operatorSVC.getOperatorsList()
				.then(function(data)
				{
					$scope.operators = data.data;
				},
				function(error){
					$scope.msg = error.msg;
				})
			
			$scope.getCities = function()
			{	
				if($scope.application != undefined && $scope.application.venue){
					$scope.city_id = null;
					$scope.application.venue.city.name = null;					
				} 															
															
				stateSVC.getCities($scope.state_id)
					.then(function(data){
						$scope.cities = data.data;											
					},
					function(error){
						$scope.msg = data;
					});
			}
			
			$scope.getVenues = function()
			{								
				if($scope.application != undefined && $scope.application.venue){					
					$scope.application.venue_id = null;
					$scope.application.venue.school = null;
				} 
					
				if($scope.city_id)
					venueSVC.getVenuesByCityState($scope.city_id)
						.then(function(data){
							$scope.venues = data.data;
						},
						function(error){
							$scope.msg = error.msg;	
						});
			}
			
			$scope.sendApplicationForm = function()
			{						
				$scope.application.product_types = [];
				
				$scope.types.filter(function(type,i){if(type == true)$scope.application.product_types.push(i)});
								
				$scope.flag = false;
								
				if($scope.application_date_obj && $scope.application_time_obj)				
					$scope.application.application_date = convertDate($scope.application_date_obj) +' '+ convertTime($scope.application_time_obj);									
				
				if($scope.initial_registration_date_obj && $scope.initial_registration_time_obj)
					$scope.application.initial_registration_date = convertDate($scope.initial_registration_date_obj)  +' '+ convertTime($scope.initial_registration_time_obj);
					
				if($scope.final_registration_date_obj && $scope.final_registration_time_obj)
					$scope.application.final_registration_date = convertDate($scope.final_registration_date_obj)  +' '+ convertTime($scope.final_registration_time_obj);
				
				applicationSVC.createApplication($scope.application)
					.then(function(data){						
						$scope.success = data.msg;												
						$scope.applications.push(data.data);
					},
					function(error){
						$scope.flag = true;						
						$scope.error = error.errors;
					});
			}	
			
			$scope.updateApplication = function()
			{
				
				$scope.application.product_types = [];
				
				$scope.types.filter(function(type,i){if(type == true)$scope.application.product_types.push(i)});								
				
				$scope.flag = false;
				
				if($scope.application_date_obj && $scope.application_time_obj)				
					$scope.application.application_date = convertDate($scope.application_date_obj) +' '+ convertTime($scope.application_time_obj);									
				
				if($scope.initial_registration_date_obj && $scope.initial_registration_time_obj)
					$scope.application.initial_registration_date = convertDate($scope.initial_registration_date_obj)  +' '+ convertTime($scope.initial_registration_time_obj);
					
				if($scope.final_registration_date_obj && $scope.final_registration_time_obj)
					$scope.application.final_registration_date = convertDate($scope.final_registration_date_obj)  +' '+ convertTime($scope.final_registration_time_obj);																														
				
				application = angular.copy($scope.application);	
					
				applicationSVC.updateApplication($scope.application)
					.then(function(data){
						$scope.success = data.msg;
						$scope.applications[$scope.application.index] = {};
						$scope.applications[$scope.application.index] = data.data;
						
						delete $scope.application.venue;
						delete $scope.application.product;
						delete $scope.application.updated_at;
						delete $scope.application.created_at;
						
						$scope.application = data.data;		
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
						$scope.application = application;				
					});
			}
			
			$scope.getTypes = function(product_id)
			{
				$scope.status = false;
				$scope.product_types = {};
				productSelected = $scope.products.filter(function(product){if(product.id == $scope.application.product_id)return product.types})[0];
				$scope.product_types = productSelected.types;
				$scope.application.product_types = [];
				$scope.types = [];
			}			
			
			$scope.resetForm = function()
			{
				
				$scope.success = null;				
				$scope.state_id = null;
				$scope.city_id = null;
				$scope.application_date_obj = null;
				$scope.initial_registration_date_obj = null;
				$scope.final_registration_date_obj = null;
				$scope.error = null;				
				$uibModalInstance.close($scope.applications);
								
			}
			
			function convertDate(inputDate)
			{				
				return new Date(inputDate).toISOString().slice(0,10);
			}
			
			function convertTime(inputTime)
			{
				return inputTime.getHours().toString() + ':' + inputTime.getMinutes().toString() + ':00';
			}
			
			function disabled(data) { //disable sunday day
				var date = data.date,
				  mode = data.mode;
				return mode === 'day' && (date.getDay() === 0);
			}
		}	
	])
	.controller('ApplicationDetailsCtrl',['$scope','$location','$uibModal','$routeParams','applicationSVC','candidateSVC',
		function($scope,$location,$uibModal,$routeParams,applicationSVC,candidateSVC){
			
			$scope.show_details = false;
			$scope.notification = {};
			$scope.selectedCandidates = [];			
			$scope.all_selected = false;	
			
			applicationSVC.getApplicationDetail($routeParams.application_id)
				.then(function(data){
					$scope.application = data.data;					
				},
				function(error){
					console.log(error);
				});
				
			$scope.getCandidate = function(candidate, index)
			{
				candidate.index = index;
				$scope.candidate_data = candidate;
				
				$scope.openCandidateModal();
			}
			
			$scope.selectAllCandidates = function(candidates, all_selected)
			{
				$scope.all_selected = all_selected;
				
				$scope.selectedCandidates = [];
						
				candidates.filter(function(candidate,i){
					if($scope.all_selected){
						$scope.selectedCandidates.push(candidate.id);
					}
					else
					{
						$scope.selectedCandidates = [];
					}
					
					return candidate.index = $scope.all_selected;
				});
			}
			
			$scope.sendConfirmationNotice = function(status)
			{				
				
				if($scope.selectedCandidates.length > 0)
				{
					data = {
						application: $scope.application.id,
						registration_status: status,
						candidates: $scope.selectedCandidates
					}
															
					candidateSVC.updateCandidatesStatus(data)
						.then(function(data){
							$scope.application.candidates_pre_registration = [];
							$scope.selectedCandidates = [];
							$scope.application.candidates_pre_registration = data.application.candidates_pre_registration;
							$scope.application.candidates_authorized_payment = data.application.candidates_authorized_payment;
							
						},
						function(error){
							console.log(error.msg);
						});
				}
			}
			
			$scope.generateLists = function()
			{	
				candidateSVC.generateLists($scope.application.id)
					.then(function(data){
						console.log(data);
					},
					function(error){
						console.log(error);
					});
			}
			
			$scope.onOffCandidate = function(candidate, candidateIndexList, all_selected)
			{
				id = candidate.id;
				
				if(candidate.index == false)
				{															
					
					$scope.selectedCandidates.filter(function(candidate,i){						
						if(candidate == id){							
							$scope.selectedCandidates.splice(i,1);
							candidate.index = false;							
						}
					});
				}
				else if(candidate.index == true){
					$scope.selectedCandidates.push(candidate.id);
				}															
								
			}
			
			$scope.openShareApplicationLink = function()
			{									
				$scope.notification = {
					school: $scope.application.venue_data.school,
					contact: $scope.application.venue_data.contact,
					email: $scope.application.venue_data.email,
					exam: $scope.application.product_data.name,
					url: $scope.application.url + '/es/dtes/candidate-registration/' + $scope.application.uuid + '/' + $scope.application.query_string_school,					
					initial_application_date: $scope.application.initial_registration_timestamp,
					final_application_date: $scope.application.final_registration_timestamp,
					application_date: $scope.application.application_timestamp,
					uuid: $scope.application.uuid
				}
								
				var modalInstance = $uibModal.open({
					templateUrl: 'shareApplicationLink.html',
					controller: 'ModalShareApplicationLink',
					animation: true,
					backdrop: true,
					resolve:{
						notification: function(){
							return $scope.notification
						}
					}
				});
			}
			
			$scope.openCandidateModal = function()
			{
				var modalInstance = $uibModal.open({
					templateUrl: 'UpdateStatusCandidate.html',
					controller: 'ModalCandidateCtrl',
					animation: true,
					backdrop: true,
					size: 'lg',
					resolve:{
						candidates: function(){							
							if($scope.active == 0)
								return $scope.application.candidates_pre_registration;
							else if($scope.active == 1)
								return $scope.application.candidates_authorized_payment;
							else if($scope.active == 2)
								return $scope.application.candidates_attendance;
							else if($scope.active == 3)
								return $scope.application.candidates_non_attendance;
						},
						candidate_data: function(){
							$scope.candidate_data.active = $scope.active;														
							return $scope.candidate_data;
						},
						application: function(){
							return $scope.application;	
						}						
					}
				});
			}
		}
	])
	.controller('ModalCandidateCtrl',['$scope','$location','$uibModalInstance','applicationSVC','candidateSVC','candidates','candidate_data','application',
		function($scope, $location, $uibModalInstance, applicationSVC, candidateSVC, candidates, candidate_data, application)
		{
			$scope.flag = true;
			$scope.alerts = [];
			
			$scope.candidate_data = candidate_data;
			
			$scope.resetForm = function() 
			{				
				$scope.success = null;
				$scope.candidate_data = angular.copy(candidate_data);
				$scope.error = {};
				$uibModalInstance.close(candidates);
			}
			
			$scope.updateCandidateStatus = function(status)
			{
				data = {
					candidate: $scope.candidate_data.id,
					registration_status: status,
					application: $scope.candidate_data.pivot.application_id
				}
				
				candidateSVC.updateCandidateStatus(data)
					.then(function(data){
						$scope.candidate_data.pivot.registration_status = data.status;
						$scope.addAlert('success', data.msg);
																	
						candidates.splice(candidate_data.index, 1);
						
						if(candidate_data.active == 0 && status == 1)
							application.candidates_authorized_payment.push(candidate_data);
						else if(candidate_data.active == 1 && status == 2)
							application.candidates_attendance.push(candidate_data);
						else if(candidate_data.active == 1 && status == 3)
							application.candidates_non_attendance.push(candidate_data);
												
					},
					function(error){
											
					});
			}
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};						
			
		}
	])
	.controller('ModalShareApplicationLink', ['$scope','$location','$uibModalInstance','applicationSVC','notification',
		function($scope,$location,$uibModalInstance,applicationSVC,notification)
		{
			$scope.flag = true;
			$scope.notification = notification;
			$scope.alerts = [];
			
			$scope.shareApplicationLink = function()
			{
				$scope.flag = false;
				$scope.addAlert('warning', 'Espere un momento...');
				
				applicationSVC.shareApplicationLink($scope.notification)
				.then(function(data){
					$scope.alerts = [];
					$scope.addAlert('info', data.msg);
					$scope.success = true;
					delete $scope.notification;
				},
				function(error){
					$scope.flag= true;
				});
			}
			
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
			
			$scope.resetForm = function() 
			{				
				$scope.alerts = [];				
				$scope.error = {};
				$uibModalInstance.close();
			}
		}
		
	]);
})();
