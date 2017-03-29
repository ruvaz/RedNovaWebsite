(function(){
	angular.module('ProductController',['ProductService'])
	.controller('ProductsCtrl',['$scope','$location','$uibModal','productSVC',
		function($scope, $location,$uibModal,productSVC){
						
			$scope.products = [];
			$scope.alerts = [];			
			
			$scope.addAlert = function(type, msg) {
				$scope.alerts.push({type: type,msg: msg});
			};
			
			$scope.closeAlert = function(index) {
				$scope.alerts.splice(index, 1);
			};
			
			$scope.getProductsType = function()
			{
				$scope.alerts = [];
				
				productSVC.getProductsType()
					.then(function(data){
						$scope.products = data.data;
					},
					function(error){
						$scope.addAlert('danger', error.msg);
					})
			}
			
			$scope.getProducts = function()
			{
				$scope.alerts = [];
				
				productSVC.getProducts()
					.then(function(data){
						$scope.products = data.data;						
					},
					function(error){
						$scope.addAlert('danger', error.msg);
					});
			}
			
			$scope.getProduct = function(product, index)
			{												
				productSVC.getProduct(product.id)
					.then(function(data){
						$scope.product = data.data;
						$scope.product.index = index;
						
						if($scope.product.parents_information == 1)
							$scope.product.parents_information = true;
						else
							$scope.product.parents_information = false;
							
						$scope.openUpdateProductModal();
					},
					function(error){
						$scope.msg = error.msg;
					});
			}
			
			$scope.getProductType = function(productType, index)
			{				
				productSVC.getProductType(productType.id)
					.then(function(data){
						$scope.product = data.data;
						$scope.product.index = index;
						$scope.openUpdateProductTypeModal();
						
					},
					function(error){
						console.log(error);
					})
			}
			
			$scope.openNewProductModal = function () {
				var modalInstance = $uibModal.open({
					templateUrl: 'NewProductContent.html',
					controller: 'ModalProductCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						products: function(){
							return $scope.products;
						},
						product: null
					}
				});
			};
			
			$scope.openNewProductTypeModal = function () {
				var modalInstance = $uibModal.open({
					templateUrl: 'NewProductTypeContent.html',
					controller: 'ModalProductCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						products: function(){
							return $scope.products;
						},
						product: null						
					}
				});						
			};
			
			$scope.openUpdateProductModal = function () {
				var modalInstance = $uibModal.open({	      
					templateUrl: 'UpdateProductContent.html',
					controller: 'ModalProductCtrl',
					animation: true,
					backdrop: true,
					resolve:{
						products: function(){
							return $scope.products;
						},
						product: function(){
							return $scope.product;
						}						
					}
				});						
			};
			
			$scope.openUpdateProductTypeModal = function(){
				var modalInstance = $uibModal.open({
					templateUrl: 'UpdateProductTypeContent.html',
					controller: 'ModalProductCtrl',
					animation: true,
					backdrop: true,
					resolve: {
						products: function(){
							return $scope.products;
						},
						product: function(){
							return $scope.product;
						}						
					}
				});
			}
		}		
	])
	.controller('ModalProductCtrl',['$scope','$routeParams','$uibModalInstance','productSVC','products','product',
		function($scope,$routeParams,$uibModalInstance,productSVC,products,product)
		{
			$scope.flag = true;
			$scope.products = products;
			$scope.product = product;						
			
			$scope.getListProducts = function()
			{
				productSVC.getListProducts()
				.then(function(data){
					$scope.listProducts = data.data;					
				},
				function(error){
					$scope.msg = error.msg;
				});
			}
			
			$scope.getListProducts();
				
			$scope.sendProductForm = function()
			{				
				
				$scope.flag = false;
				
				productSVC.newProduct($scope.product)
					.then(function(data){						
						$scope.success = data.msg;						
						$scope.product.id = data.id
						
						$scope.products.push($scope.product);																						
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					});
			}	
			
			$scope.sendUpdateProductForm = function()
			{
				
				$scope.flag = false;
				
				productSVC.updateProduct($scope.product)
					.then(function(data){
						$scope.success = data.msg;
						$scope.products[$scope.product.index] = {};
						$scope.products[$scope.product.index] = $scope.product;								
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;	
					});
					
			}
			
			$scope.sendNewProductTypeForm = function()
			{
				$scope.flag = false;
				
				productSVC.newProductType($scope.product_type)
					.then(function(data){
						$scope.success = data.msg;
						$scope.product_type.id = data.id;
						$scope.product_type.product = $scope.listProducts.filter(function(product){if(product.id == $scope.product_type.product_id)return product})[0];								
						$scope.products.push($scope.product_type);
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					})
			}				
			
			$scope.sendUpdateProductTypeForm = function()
			{
				
				$scope.flag = false;
				
				productSVC.updateProductType($scope.product)
					.then(function(data){
						$scope.success = data.msg;
						$scope.products[$scope.product.index] = {};
						$scope.products[$scope.product.index] = $scope.product;												
					},
					function(error){
						$scope.flag = true;
						$scope.error = error.errors;
					})
			}
			
			$scope.resetForm = function() 
			{				
				$scope.success = null;
				$scope.product = {};
				$scope.error = {};
				$uibModalInstance.close($scope.products);			
			}	
		}
	]);
})();
