app.controller('SellController', function ($window, $scope,$http,$state, ProductsFactory, BusinessesFactory, host){
  
	$scope.businesses = BusinessesFactory.businesses;
	$scope.product = ProductsFactory.product;
	$scope.formLoc = ProductsFactory.formLocation;
	$scope.business = null;
	$scope.categoryButtonText = "Next";

	
	$scope.imagesDzOptions = {
			url:host+"productImages/tempImages",
			clickable: '.myTriggerImages',
			addRemoveLinks: true,
	        paramName: "image_name", // The name that will be used to transfer the file
	        dictRemoveFileConfirmation: "Are you sure you want to remove this Image?",
	        dictDefaultMessage:"Drag and drop to add images or cick on upload button.",
	        
    };

    $scope.imagesDzCallbacks = {
    	success:function(file, response){
	       ProductsFactory.addImages('product_images', response.data);
	    },
	    removedfile: function(file) {
	    	
            ProductsFactory.removeImage('product_images', file);
			file.previewElement.remove(); 
        }
    }

    $scope.billDzOptions = {
			url:host+"productImages/tempImages",
			clickable: '.myTriggerBills',
			addRemoveLinks: true,
	        paramName: "image_name", // The name that will be used to transfer the file
	        dictRemoveFileConfirmation: "Are you sure you want to remove this Image?",
	        dictDefaultMessage:"Drag and drop to add images or cick on upload button.",
	        
    };

    $scope.billDzCallbacks = {
    	success:function(file, response){
	       ProductsFactory.addImages('product_bills', response.data);
        	console.log('in success dz');
	    },
	    removedfile: function(file) {

            ProductsFactory.removeImage('product_bills', file);
			file.previewElement.remove(); 
        }
    }

	$scope.$watch(function(){
		return BusinessesFactory.businesses;
	}, function(newValue, oldValue) {

		$scope.businesses = BusinessesFactory.businesses;
	});


	$scope.removeCategory = function(){
		if(typeof $scope.product.business_product_category_id != 'undefined'){
			delete $scope.product.business_product_category_id;
		}
	}

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

	$scope.addProduct = function(){
		
		ProductsFactory.resource.save($scope.product ,function(response){
			
			alert("Product has been saved!");
			ProductsFactory.init();
            $state.go('home');
		
		},function(errorResponse) {
			alert("Product could not be saved!");
		});
		
		
	}
});