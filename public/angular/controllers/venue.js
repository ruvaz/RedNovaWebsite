(function(){
	angular.module('VenueController',['VenueService','StateService'])
		.controller('VenuesCtrl',['$scope','$routeParams','$uibModal','venueSVC',
		function($scope, $routeParams,$uibModal,venueSVC){
											
		$scope.venues = [];		
		$scope.maxSize = 10;
		$scope.currentPage = 1;
		$scope.itemsPerPage = 15;				
		$scope.alerts = [];
		var venue = angular.copy($scope.venue);
		
				
		$scope.addAlert = function(type, msg) {
			$scope.alerts.push({type: type,msg: msg});
		};
		
		$scope.closeAlert = function(index) {
			$scope.alerts.splice(index, 1);
		};	
				
		$scope.getVenues = function(currentPage,itemsPerPage){
			$scope.search_venue = null;
			$scope.alerts = [];
			venueSVC.getVenues(currentPage,itemsPerPage)
				.then(function(data){
					$scope.venues = data.data;
					$scope.totalItems = data.total;
					$scope.currentPage = data.current_page;
					$scope.itemsPerPage = data.per_page;
					$scope.index = data.from;
				},
				function(error){
					$scope.applications = [];
					$scope.addAlert('danger', error.msg);					
				});
		};
		
		$scope.searchVenues = function(currentPage,itemsPerPage)
		{
			if($scope.search_venue != undefined)
				venueSVC.getSearchVenues(currentPage,itemsPerPage,$scope.search_venue)
					.then(function(data){					
						$scope.venues = data.data;
						$scope.totalItems = data.total;
						$scope.currentPage = data.current_page;
						$scope.itemsPerPage = data.per_page;
						$scope.index = data.from;
					},
					function(error){
						$scope.addAlert('danger', error.msg);
					});
				
		}
		
		$scope.pageChanged = function() {
			if($scope.search_venue != null)
				$scope.searchVenues($scope.currentPage,$scope.itemsPerPage,$scope.search_venue)
			else			
				$scope.getVenues($scope.currentPage,$scope.itemsPerPage);
		};
		
		$scope.perPageChanged = function(itemsPerPage){
			if($scope.search_venue != null)
				$scope.searchVenues(1,itemsPerPage,$scope.search_venue)
			else
				$scope.getVenues(1,itemsPerPage)
		}		
		
		$scope.getVenue = function(venue, index)
			{													
				venueSVC.getVenue(venue.id)
					.then(function(data)
					{																									
						$scope.venue = data.data;
						$scope.venue.index = index;
						
						if($scope.venue.authorized_center == 1)
							$scope.venue.authorized_center = true;
						else
							$scope.venue.authorized_center = false;
							
						$scope.openUpdateVenueModal();
					},
					function(error){
						$scope.error = error.errors;
					});
			}
		
		$scope.openNewVenueModal = function () {
			var modalInstance = $uibModal.open({	      
				templateUrl: 'NewVenueContent.html',
				controller: 'ModalVenueCtrl',
				animation: true,
				backdrop: true,
				resolve:{
					venues: function(){
						return $scope.venues;
					},
					venue: null
				}
			});						
		};
		
		$scope.openUpdateVenueModal = function(){
			var modalInstance = $uibModal.open({	      
				templateUrl: 'UpdateVenueContent.html',
				controller: 'ModalVenueCtrl',
				animation: true,
				backdrop: true,
				resolve:{
					venues: function(){
						return $scope.venues;
					},
					venue: function(){
						return $scope.venue;
					}
				}
			});
		};
		
	}])		
	.controller('ModalVenueCtrl', ['$scope','$uibModalInstance','$routeParams','venueSVC','stateSVC','venues','venue',
		function($scope,$uibModalInstance,$routeParams,venueSVC, stateSVC,venues,venue){
		
			$scope.flag = true;
			$scope.newState = false;
			$scope.newCity = false;	
						
	  		$scope.venues = venues;	  			  								
			
			$scope.popup1 = {};
		    $scope.popup2 = {};		    
		    	  	    				
			$scope.popup1.opened = false;			
			$scope.popup2.opened = false;			
			
			$scope.format = 'dd-MMMM-yyyy';
			$scope.altInputFormats = ['dd-MMMM-yyyy'];
			$scope.dateOptions = {
				dateDisabled: disabled,
				minDate: new Date(),
				startingDay: 1
			};						
	
			$scope.cancel = function () {
				$uibModalInstance.dismiss('cancel');				
			};			
			
			$scope.states = function()
			{
				$scope.listStates = stateSVC.states();
			}						
				
			
			$scope.getStates = function()
			{
				$scope.flag = true;
				// $scope.states();				
				stateSVC.getStates()
					.then(function(data)
					{
						$scope.states = data.data;
						angular.forEach($scope.states,function(state){
							
							name = state.name;
							
							$scope.listStates.filter(function(state){
								if(name === state.name)
									$scope.listStates.splice($scope.listStates.indexOf(state),1);
							});
						});
					},
					function(error){
						$scope.msg = error.msg;
					});
			}
						
			$scope.getCities = function()
			{					
												 						
				$scope.cities = {};					
				$scope.venue.city = {};
				$scope.venue.city_id = null;
																												
				stateSVC.getCities($scope.venue.state_id)
					.then(function(data){
						$scope.cities = data.data;
					},
					function(error){
						$scope.msg = error.msg;
					});
			}
			
			$scope.sendVenueForm = function(){																
				
				if($scope.venue.discount && $scope.venue.discount){
					$scope.venue.initial_agreement_date = convertDate($scope.initial_agreement_date_obj);
					$scope.venue.final_agreement_date = convertDate($scope.final_agreement_date_obj);	
				}
				else{
					$scope.venue.discount = false;
					$scope.venue.percentage = null;
					$scope.venue.initial_agreement_date = null;
					$scope.venue.final_agreement_date = null;
				}																
				
				$scope.flag = false;
				
				venueSVC.createVenue($scope.venue)
					.then(function(data)
					{																																				
						$scope.success = data.msg;
						$scope.venue.status = 1;
						$scope.venue.state = $scope.states.filter(function(state){if(state.id == $scope.venue.state_id)return state})[0];
						$scope.venue.city = $scope.cities.filter(function(city){if(city.id == $scope.venue.city_id)return city})[0];					
						$scope.venue.id = data.id;
						
						$scope.venues.push($scope.venue);
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					});
			}				
			
			$scope.updateVenue = function()
			{
				
				if($scope.venue.discount && $scope.venue.discount){
					$scope.venue.initial_agreement_date = convertDate($scope.initial_agreement_date_obj);
					$scope.venue.final_agreement_date = convertDate($scope.final_agreement_date_obj);	
				}
				else{
					$scope.venue.discount = false;
					$scope.venue.percentage = null;
					$scope.venue.initial_agreement_date = null;
					$scope.venue.final_agreement_date = null;
				}
				
				$scope.flag = false;			
				
				venueSVC.updateVenue($scope.venue)
					.then(function(data)
					{
						
						$scope.success = data.msg;
						$scope.venues[$scope.venue.index] = {};
						$scope.venues[$scope.venue.index] = data.data;
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					});
			}
			
			$scope.resetForm = function() 
			{				
				$scope.success = null;
				$scope.venue = angular.copy(venue);
				$scope.error = {};
				$uibModalInstance.close($scope.venues);
			}					
			
			$scope.sendNewState = function()
			{
				stateSVC.newState($scope.new_state)
					.then(function(data)
					{					
						$scope.newState = false;
						$scope.getStates();
						// $scope.states();
					},
					function(error){
						$scope.error_state = error.errors;
					});
			}
			
			$scope.sendNewCity = function()
			{
				city = {
					"name": $scope.new_city,
					"state_id": $scope.venue.state_id,
				}
				
				stateSVC.newCity(city)
					.then(function(data){
						$scope.newCity = false;
						$scope.getCities();
						$scope.new_city = null;
					},
					function(error){
						$scope.error_city = error.errors;
					})
			}
				
			$scope.states();			
			$scope.getStates();
			
			if(venue)
			{				
				
				$scope.venue = venue;
				a = angular.copy($scope.venue);
				$scope.getCities();
				$scope.venue = a;		
						
				if($scope.venue.discount == 1)
				{			
					$scope.venue.discount = true;	
					$scope.initial_agreement_date_obj = new Date($scope.venue.initial_agreement_date);
					$scope.final_agreement_date_obj = new Date($scope.venue.final_agreement_date);					
				}
				else
					$scope.venue.discount = null;												
			}
			
			function convertDate(inputDate)
			{				
				return new Date(inputDate).toISOString().slice(0,10);
			}						
			
			function disabled(data) { //disable sunday day
				var date = data.date,
				  mode = data.mode;
				return mode === 'day' && (date.getDay() === 0);
			}		
	}])
	.controller('StructureStateCtrl', ['$scope','$location', 'stateSVC',
		function($scope, $location,stateSVC)
		{

			$scope.alerts = [];
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};

			stateSVC.getStructureStates()
				.then(function(data){					
					$scope.states = data.data;
				},
				function(error){
					$scope.addAlert('danger', error.msg);
				})
		}
	]);
})();
