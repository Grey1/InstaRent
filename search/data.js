var app = angular.module('instarent', [])

// app.controller('DisplayController', function(){
//     this.displayed=1;


// });





app.controller('VenueController', function($scope,$http, $window){

this.displayed=1;

this.setVal = function(val){
    this.displayed=val;

}

this.checkVal = function(val){

return this.displayed===val;

};


 $scope.getVenues = function() {
    // this is where the JSON from api.php is consumed
    $http.post("search/search.php",{
    	'state':$scope.state,'event_type':$scope.event_type,'city':$scope.city,
    }).success(function(data,status) {
            // here the data from the api is assigned to a variable named venues
            

            if(status==200){
                
            	$scope.venues = data;
            	console.log($scope.venues);
                 
            }
            
        });
}
	
})

