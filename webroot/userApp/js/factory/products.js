app.factory('ProductsFactory', function($http,host, $resource, $state){

	var factory ={}; 

	factory.init = function(){

		factory.product = {};
		factory.formLocation = [
			{
				name:'category',
				value:true,
				templateUrl:host+"userApp/views/category.html"
			},
			{
				name:'productForm',
				value:false,
				templateUrl:host+"userApp/views/sell/productForm.html"
			},
			{
				name:'productImages',
				value:false,
				templateUrl:host+"userApp/views/sell/productImages.html"
			},
			{
				name:'finsh',
				value:false,
				templateUrl:host+"userApp/views/sell/finish.html"
			}
		];
	}


	factory.resource = $resource(
										 host+'api/products/:poductId/', 
										 {productId:'@id'},
										 {
											'update': { method:'PUT' }
    									 });



	factory.addImages = function(type, data){
		if(typeof factory.product[type] == 'undefined'){
			factory.product[type] = [];
		}

		factory.product[type].push(data);
		console.log(factory.product);

	}

	factory.removeImage = function(type, file){
		
		xhrResponse = JSON.parse(file.xhr.response);
    	tmpName =  xhrResponse.data.image_name.tmp_name;
		for(x in factory.product[type]){
			if(factory.product[type][x].image_name.tmp_name === tmpName){
				factory.product[type].splice(x, 1);
			}	
		}
		console.log(factory.product);
	}

	return factory;
	
});