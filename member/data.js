


var app = angular.module('instarent', ['angularUtils.directives.dirPagination']);

// app.controller('DisplayController', function(){
//     this.displayed=1;


// });


app.controller('LoginController', function($scope,$http,$window){


this.checkIsAUser = function(){
    return $scope.isAUser===1;
};

this.login = function(){

    $http.post('login.php',{
        'email':$scope.email,'password':$scope.password,
    }).success(function(data,status){
        console.log(data);
        var userid = data.userid;
        var usertype = data.usertype;
        
        if(userid==null && usertype == null){
            $scope.isAUser=1;
            $scope.email="";
            $scope.password="";
        }
        else if ( userid!=null && usertype=="") {
            $scope.isAUser= 0;
            $window.location.href="/member/member_home.php";
        }
        else if(usertype == "admin"){
            $scope.isAUser= 0;
            $window.location.href="/member/member_home.php";   
        }
    })
};

})








app.controller('VenueController', function($scope,$http, $window){

this.displayed=1;

this.setVal = function(val){
    if($scope.state!="" && $scope.event_type!="" && $scope.city!="")
    {this.displayed=val;}

}

this.checkVal = function(val){
    if($scope.state!="" && $scope.event_type!="" && $scope.city!="")

{
    return this.displayed===val;
}
else return 1===val;
};

//defining scope variables

$scope.minPrice=0;
$scope.maxPrice=2000;
$scope.minDate = Date();
$scope.state=""
$scope.event_type=""
$scope.city=""


//END -- defining scope variables

$scope.greaterThan = function(item){
    return ((item.weekly_price >= $scope.minPrice)&&(item.weekly_price<= $scope.maxPrice));
}



 $scope.getVenues = function() {
    // this is where the JSON from api.php is consumed

    if($scope.state!="" && $scope.event_type!="" && $scope.city!="")
{
    $http.post("search.php",{
        'state':$scope.state,'event_type':$scope.event_type,'city':$scope.city,
    }).success(function(data,status) {
            // here the data from the api is assigned to a variable named venues
            

            if(status==200){
                
                $scope.venues = data;
                console.log($scope.venues);
                 
            }
            
        });}
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

