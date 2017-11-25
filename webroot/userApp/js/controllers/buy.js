app.controller('BuyController', function ($window, $scope,$http,$state, BusinessesFactory,host, ProductsFactory){
  	
  	$scope.businesses = BusinessesFactory.businesses;
  	$scope.product = ProductsFactory.product;
	$scope.host = host;
	$scope.formLoc = ProductsFactory.buyFormLocation;
	$scope.productAttributes = {business: null}
	$scope.categoryButtonText = "Search";
	

	$scope.next = function(){

			for(pos in $scope.formLoc){
				pos = pos * 1;
				if($scope.formLoc[pos].value){
					$scope.formLoc[pos].value = false;
					if(pos < ($scope.formLoc.length-1)){
						$scope.formLoc[pos+1].value = true; 
					}
					break;
				}
			}
		}

	$scope.back = function(){
		
		for(pos in $scope.formLoc){
			pos = pos * 1;
			if($scope.formLoc[pos].value){
				$scope.formLoc[pos].value = false;
				if(pos > 0){
					$scope.formLoc[pos-1].value = true; 
				}
				break;
			}
		}
		
	}
	
	$scope.selected= function(value1, value2){
		
		return ProductsFactory.selectedType(value1, value2);
	}

	$scope.$watch(function(){
		return BusinessesFactory.businesses;
	}, function(newValue, oldValue) {

		$scope.businesses = BusinessesFactory.businesses;
	});

	$scope.search = function(){
		$window.location.href= host+"products?category="+$scope.product.business_product_category_id;
	}
  	

});
