(function(){
	angular.module('ProductService',[])
		.factory('productSVC',['$http','$q','urls',
			function($http, $q, urls){
				
				function getProducts()
				{
					var deferred = $q.defer();
					$http.get(urls.BASE_API + '/product')
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function newProduct(product)
				{
					var deferred = $q.defer();
					$http.post(urls.BASE_API + '/product', product)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function getListProducts()
				{
					var deferred = $q.defer();
					$http.get(urls.BASE_API + '/product-list')
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					})
					
					return deferred.promise;
				}
				
				function getProduct(product)
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/product/' + product)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function updateProduct(product)
				{
					var deferred = $q.defer();
					
					$http.put(urls.BASE_API + '/product/' + product.id, product)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					})
					
					return deferred.promise;
				}
				
				function getProductsType()
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/product-type')
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
					
				}
				
				function newProductType(productType)
				{
					var deferred = $q.defer();
					
					$http.post(urls.BASE_API + '/product-type', productType)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				function getProductType(productType)
				{
					var deferred = $q.defer();
					
					$http.get(urls.BASE_API + '/product-type/' + productType)
					.success(function(data){
						deferred.resolve(data);
					})
					.error(function(error){
						deferred.reject(error);
					})
					
					return deferred.promise;
				}
				
				function updateProductType(productType)
				{
					var deferred = $q.defer();
					
					$http.put(urls.BASE_API + '/product-type/' + productType.id, productType)
					.success(function(data){
						deferred.resolve(data);						
					})
					.error(function(error){
						deferred.reject(error);
					});
					
					return deferred.promise;
				}
				
				return{
					getProducts: getProducts,
					newProduct: newProduct,
					getListProducts: getListProducts,
					getProduct: getProduct,
					updateProduct: updateProduct,
					getProductsType: getProductsType,
					newProductType: newProductType,
					getProductType: getProductType,
					updateProductType: updateProductType
				}
				
			}
		]);
})();
