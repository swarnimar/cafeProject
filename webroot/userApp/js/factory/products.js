app.factory('ProductsFactory', function($http,host, $resource, $state){

	var factory ={}; 

	factory.init = function(){

		factory.product = {};
		factory.sellFormLocation = [
			{
				name:'business',
				value:true,
				templateUrl:host+"userApp/views/business.html"
			},
			{
				name:'category',
				value:false,
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

		factory.buyFormLocation = [
			{
				name:'business',
				value:true,
				templateUrl:host+"userApp/views/business.html"
			},
			{
				name:'category',
				value:false,
				templateUrl:host+"userApp/views/category.html"
			},
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

	factory.selectedType = function(value1, value2, type){
		if(value1 == value2){
			switch(type) {
			    case 'div':
		        	return {'width':'100%', 'height':'100%', 'float':'left', 'overflow':'hidden', 'position':'relative', 'text-align':'center', 'cursor':'default'}
			    case 'img':
			        return {'display':'block', 'position':'relative', '-webkit-transition':'all .4s linear', 'transition':'all .4s linear','-ms-transform':'scale(1.2)', '-webkit-transform':'scale(1.2)', 'transform':'scale(1.2)'};
			    case 'overlay':
		        	return {'width':'100%', 'filter':'alpha(opacity=100)', 'height':'100%', 'position':'absolute', 'overflow':'hidden', 'top':'0', 'left':'0', 'opacity':'1', 'background-color':'rgba(0,0,0,0.5)', '-webkit-transition':'all .4s ease-in-out', 'transition':'all .4s ease-in-out'};

			} 
			// return {'box-shadow':'0px 12px 22px 1px', 'border': '1px solid blue'};
		}

		switch(type) {
		    case 'div':
		        return {'width':'100%', 'height':'100%', 'float':'left', 'overflow':'hidden', 'position':'relative', 'text-align':'center', 'cursor':'default'}
		    case 'img':
		        return {'display':'block', 'position':'relative', '-webkit-transition':'all .4s linear', 'transition':'all .4s linear'};
		    case 'overlay':
		        return {'width':'100%', 'height':'100%', 'position':'absolute', 'overflow':'hidden', 'top':'0', 'left':'0', 'opacity':'0', 'background-color':'rgba(0,0,0,0.5)', '-webkit-transition':'all .4s ease-in-out', 'transition':'all .4s ease-in-out'};
		}
		// return {'opacity': '1.0', 'filter': 'alpha(opacity=10)', 'border': '1px solid white'};
	}

	return factory;
	
});