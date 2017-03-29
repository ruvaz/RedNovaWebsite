(function(){
	angular.module('directives', [])
	.directive('categories', [function () {
		return {
			restrict: 'E',
			templateUrl: '../views_dtes/partials/categories.html'
		};
	}])
	.directive('menuleft', [function () {
		return {
			restrict: 'E',
			templateUrl: '../views_dtes/partials/menu-left.html'
		};
	}])
	.directive('notifications', [function () {
		return {
			restrict: 'E',
			templateUrl: '../views_dtes/partials/notifications.html'
		};
	}])
	.directive('navbar', [function () {
		return {
			templateUrl: '../views_dtes/partials/navbar.html'
		};
	}])	
})();