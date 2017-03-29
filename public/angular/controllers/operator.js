(function(){
	angular.module('OperatorController',['OperatorService'])
	.controller('OperatorsCtrl',['$scope','$location','$uibModal','operatorSVC',
		function($scope,$location,$uibModal,operatorSVC)
		{	
			$scope.operators = [];
			$scope.alerts = [];				
								
			operatorSVC.getOperators()
				.then(function(data){					
					$scope.operators = data.data;
				},
				function(error){
					$scope.alerts = [];
					$scope.addAlert('danger', error.msg);
				});
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
			
			$scope.getOperator = function(operator, index)
			{
				operatorSVC.getOperator(operator.id)
					.then(function(data){
						$scope.operator = data.data
						$scope.operator.index = index;
						$scope.openUpdateOperatorModal();
					},
					function(error){
						$scope.msg = error.msg;
					});
			}
			
			$scope.openNewOperatorModal = function()
			{
				var modalInstance = $uibModal.open({	      
					templateUrl: 'NewOperatorContent.html',
					controller: 'ModalOperatorCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						operators: function(){
							return $scope.operators;
						},
						operator: null
					}
				});
			}
			
			$scope.openUpdateOperatorModal = function()
			{
				
				var modalInstance = $uibModal.open({	      
					templateUrl: 'UpdateOperatorContent.html',
					controller: 'ModalOperatorCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						operators: function(){
							return $scope.operators;
						},
						operator: function(){
							return $scope.operator;
						}
					}
				});
			}
		}	
	])
	.controller('ModalOperatorCtrl',['$scope','$location','$uibModalInstance','operatorSVC','operators','operator',
		function($scope,$location,$uibModalInstance,operatorSVC,operators,operator)
		{
			$scope.flag = true;
			$scope.operators = operators;
			$scope.operator = operator;
			
			$scope.sendOperatorForm = function()
			{
				$scope.flag = false;
				
				operatorSVC.newOperator($scope.operator)
					.then(function(data){
						$scope.success = data.msg;
						$scope.operator.id = data.id;						
						$scope.operators.push($scope.operator);
						
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					});
			}
			
			$scope.sendUpdateOperatorForm = function()
			{
				$scope.flag = false;
				
				operatorSVC.updateOperator($scope.operator)
					.then(function(data){						
						$scope.success = data.msg;
						$scope.operators[$scope.operator.index] = {};
						$scope.operators[$scope.operator.index] = $scope.operator;
					},function(error){
						
						$scope.error = error.errors;
					});
			}
			
			$scope.resetForm = function() 
			{				
				$scope.success = null;				
				$scope.error = {};
				$uibModalInstance.close($scope.operators);
			}	
			
		}
	]);
})();
