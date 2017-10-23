app.factory('BusinessesFactory', function($http,host, $resource, $state){

	var factory ={}; 

	factory.business = false;
	factory.businesses = [];

	factory.resource = $resource(
										 host+'api/businesses/:businessId/', 
										 {businessId:'@id'},
										 {
											'update': { method:'PUT' }
    									 });

	factory.getBusinesses = function(){
		
		factory.resource.get(function(response){
			factory.businesses = response.businesses;			
			
		}, function(response){
			console.log('in error case of get businesses');
			console.log(response);
		});
	}

	

	return factory;
	
});