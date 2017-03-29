(function(){
	angular.module('UserController', ['UserService'])
	.controller('UsersCtrl',['$scope','$routeParams', 'userSVC','$uibModal',
		function($scope, $routeParams, userSVC, $uibModal){
			$scope.name = "UsersCtrl";
			$scope.params = $routeParams;
			$scope.alerts = [];
			
			$scope.getUsers = function()
			{				
				$scope.alerts = [];
								
				userSVC.getUsers()
					.then(function(data){
						$scope.users = data.data
					},
					function(error){
						$scope.addAlert('danger', error.msg);
					});
			}
			
			$scope.getUser = function(user, index)
			{								
				userSVC.getUser(user.id)
					.then(function(data){
						$scope.user = data.data;
						$scope.user.index = index;
						$scope.openUpdateUserModal();
					},
					function(error){
						console.log(error);
					});
			}
									
			$scope.openNewUserModal = function(){
				var modalInstance = $uibModal.open({
					templateUrl: 'NewUserContent.html',
					controller: 'ModalUserCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						users: function(){
							return $scope.users;
						},
						user: null
					}
				});
			};
			
			$scope.openUpdateUserModal = function(){
				var modalInstance = $uibModal.open({
					templateUrl: 'UpdateUserContent.html',
					controller: 'ModalUserCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						users: function(){
							return $scope.users;
						},
						user: function(){
							return $scope.user;
						}
					}
				});
			};
			
			$scope.openDeleteUserModal = function(user, index){
				
				user.index = index;
								
				var modalInstance = $uibModal.open({
					templateUrl: 'DeleteUserContent.html',
					controller: 'ModalUserCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						users: function(){
							return $scope.users;
						},
						user: function(){
							return user;
						}
					}
				});
			};
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
		}
	])
	.controller('ModalUserCtrl',['$scope','$uibModalInstance','userSVC','users','user',
		function($scope, $uibModalInstance,userSVC,users,user)
		{
			$scope.success = null;
			$scope.flag = true;
			$scope.users = users;
			$scope.user = user;						
			
			$scope.sendUserForm = function()
			{
				$scope.flag = false;
				
				userSVC.createUser($scope.user)
					.then(function(data){
						$scope.success = data.msg;
						$scope.users.push(data.user);
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					});
				
			}
			
			$scope.sendUpdateUserForm = function()
			{
				
				$scope.flag = false;
				
				userSVC.updateUser($scope.user)
					.then(function(data){
						$scope.success = data.msg;
						$scope.users[$scope.user.index] = {};
						$scope.users[$scope.user.index] = data.data;
					},
					function(error){
						$scope.flag = true;						
						$scope.error = error.errors;
					});
			}
			
			$scope.sendDeleteUserForm = function(user)
			{
				$scope.flag = false;
				userSVC.deleteUser(user.id)
					.then(function(data){
						$scope.success = data.msg;
						$scope.users.splice(user.index, 1);						
					},
					function(error){
						$scope.addAlert('danger', error.msg);
					});
			}
			
			$scope.resetForm = function()
			{				
				$scope.success = null;
				$scope.error = null;
				$uibModalInstance.close($scope.users);
			}
			
		}		
	]);
})();
