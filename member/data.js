


var app = angular.module('instarent', ['angularUtils.directives.dirPagination','ui.bootstrap']);

// app.controller('DisplayController', function(){
//     this.displayed=1;


// });









app.controller('VenueController', function($scope,$http, $window){



$scope.getLocation = function(val) {
    return $http.get('//maps.googleapis.com/maps/api/geocode/json', {
      params: {
        address: val,
        sensor: false
      }
    }).then(function(response){
      return response.data.results.map(function(item){
        return item.formatted_address;
      });
    });
  };



this.displayed=1;

this.setVal = function(val){

    if($scope.event_type!="" && $scope.city!="")
    {this.displayed=val;}

}

this.checkVal = function(val){
    if( $scope.event_type!="" && $scope.city!="")

{
    return this.displayed===val;
}
else return 1===val;
};

//defining scope variables

$scope.minPrice=0;
$scope.maxPrice=2000;
$scope.from_date="";

$scope.event_type=""
$scope.city=""


//END -- defining scope variables
$scope.verified = function(item){
    return item.verifiedbyadmin == 1;
}


$scope.greaterThan = function(item){
    return ((item.weekly_price >= $scope.minPrice)&&(item.weekly_price<= $scope.maxPrice));
}

$scope.dateChecker = function(item){


if($scope.bookings!=undefined && $scope.from_date!=undefined && $scope.to_date!=undefined){

for (var i = ($scope.bookings).length - 1; i >= 0; i--) {
    
    if($scope.bookings[i].workspace_id == item.workspace_id){
        
        
       
        if(((new Date($scope.bookings[i].from_date) < $scope.from_date)||
        (new Date($scope.bookings[i].from_date) > $scope.to_date)) && 
            ((new Date($scope.bookings[i].to_date) < $scope.from_date) || 
                (new Date($scope.bookings[i].to_date) > $scope.to_date))
            ){
        
            
    }
    else{

        return false;
    }


    }

}
if(i<0){  

    return true }
}
else return true;






    // return (
    //     ((new Date($scope.bookings[i].from_date) < $scope.from_date)||
    //     (new Date($scope.bookings[i].from_date) > $scope.to_date)) && 
    //         ((new Date($scope.bookings[i].to_date) < $scope.from_date) || (new Date($scope.bookings[i].to_date) > $scope.to_date))
    //         )   ;
}



 $scope.getVenues = function() {
    // this is where the JSON from api.php is consumed
    

    if($scope.event_type!="" && $scope.city!="")
{
    $http.post("search.php",{
        'event_type':$scope.event_type,'city':$scope.city,
    }).success(function(data,status) {
            // here the data from the api is assigned to a variable named venues
            
            if(status==200){
                
                $scope.venues = data;
                console.log($scope.venues); 
                $scope.getBookings();
            }
            
        });}
}

$scope.getBookings =function(){
    $scope.workspace = [];
    for (var i = 0; i < ($scope.venues).length ; i++) {
        $scope.workspace.push($scope.venues[i].workspace_id) ;
    };

    $http.post('../search/getBookings.php',{
        'workspace':$scope.workspace,
    }).success(function(data){
        console.log(data);
        $scope.bookings = data;

        
        

    })
}


//Filter by Event
$scope.spacetypeIncludes=[];
$scope.includeSpace = function(spacetypeid){

 //$.inArray finds spacetypeid in eventIncludes[]; if not found it returns -1; else it returns index
    
 var i = $.inArray(spacetypeid, $scope.spacetypeIncludes);
        if (i > -1) {
            $scope.spacetypeIncludes.splice(i, 1);
        } else {
            $scope.spacetypeIncludes.push(spacetypeid);
        }
}

$scope.spaceFilter = function(venues) {
        if ($scope.spacetypeIncludes.length > 0) {
            if ($.inArray(venues.type, $scope.spacetypeIncludes) < 0)
                return;
        }
        
        return venues;
    }

})

$(function() {
            
            $("#from").datepicker({
                minDate:0,
                dateFormat: "yy-mm-dd",
                onSelect: function() {
                    var scope = angular.element(document.body).scope();
                    scope.from_date = new Date($('#from').val());
                    scope.$apply();
            $("#to").datepicker(
                    "change",
                    { minDate: new Date($('#from').val()) }
            );
        }
    });
    $("#to").datepicker({
        minDate:0,
        dateFormat:"yy-mm-dd",
        onSelect: function() {
            var scope = angular.element(document.body).scope();
            scope.to_date = new Date($('#to').val());
            scope.$apply();
            $("#from").datepicker(
                    "change",
                    { maxDate: new Date($('#to').val()) }
            );
        }
    });
    
        });





