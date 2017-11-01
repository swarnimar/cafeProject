app.controller('BuyController', function ($window, $scope,$http,$state, BusinessesFactory,host, ProductsFactory){
  	
  	$scope.businesses = BusinessesFactory.businesses;
  	$scope.product = ProductsFactory.product;
	$scope.business = null;
	$scope.categoryButtonText = "Search";

	$scope.$watch(function(){
		return BusinessesFactory.businesses;
	}, function(newValue, oldValue) {

		$scope.businesses = BusinessesFactory.businesses;
	});

	$scope.next = function(){
		$window.location.href= host+"products?category="+$scope.product.business_product_category_id;
	}
  	

});
