(function(){
	angular.module('ApplicationHistoryController',['ApplicationService'])
	.controller('ApplicationHistoryCtrl',['$scope','$location','applicationSVC',
		function($scope,$location,applicationSVC)
		{
			$scope.popup1 = {};
		    $scope.popup2 = {};		
		    $scope.initial_date = new Date();
		    $scope.final_date = new Date();    
		    $scope.alerts = [];
		      	    				
			$scope.popup1.opened = false;			
			$scope.popup2.opened = false;			
			
			$scope.format = 'dd-MMM-yyyy';
			$scope.altInputFormats = ['dd-MMM-yyyy'];
			$scope.dateOptions = {
				// dateDisabled: disabled,
				// minDate: new Date(),
				startingDay: 1
			};						
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
			
			$scope.getApplications = function(initial_date_obj, final_date_obj)
			{				
				
				$scope.alerts = [];
				
				if(initial_date_obj != undefined)
					initial_date_obj = convertDate(initial_date_obj);
				
				if(final_date_obj != undefined)
					final_date_obj = convertDate(final_date_obj);
				else
					final_date_obj = '';
					
				applicationSVC.getApplicationHistory(initial_date_obj, final_date_obj)
					.then(function(data){
						$scope.applications = data.data;
					},
					function(error){
						$scope.applications = [];
						$scope.addAlert('danger',error.msg);
					});
			}
			
			function convertDate(inputDate)
			{				
				return new Date(inputDate).toISOString().slice(0,10);
			}
		}
	])
})();
