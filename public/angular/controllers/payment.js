(function(){
	angular.module('PaymentController',[])
	.controller('PaymentsCtrl', function($scope, $routeParams){
		$scope.name = "UsersCtrl";
		$scope.params = $routeParams;
	})
})();
