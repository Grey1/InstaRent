var app = angular.module('instarent',['ui.bootstrap']);



app.controller('LoginController', function($scope,$http,$window){

this.checkIsAUser = function(){
    return $scope.isAUser===1;
};

this.login = function(){

    $http.post('../login.php',{
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
        else if ( userid!=null && usertype=="user") {
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



app.controller('BookingController', function($scope,$http){

	
$scope.host_id=host_id;
$scope.venue_id=venue_id;
$scope.workspace_id=workspace_id;
$scope.wifi= wifi;
$scope.internet=internet;
$scope.kitchen = kitchen;
$scope.doorman = doorman;
$scope.buzzer = buzzer;
$scope.elevator = elevator;
$scope.parking =parking;
$scope.essentials = essentials;
$scope.hourly_price =  hourly_price;
$scope.monthly_price =  monthly_price;
$scope.weekly_price = weekly_price;
$scope.reviews = reviews;

$scope.isLoggedIn = isLoggedIn;


console.log(unavailable_dates);


$scope.isUserLoggedIn = function(){
    return $scope.isLoggedIn;
}




$scope.confirmBooking = false;



	$scope.bookspace =function(){
		var timeDiff = Math.abs(($scope.todate).getTime() - ($scope.fromdate).getTime());
		var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 


		$http.post('book.php',{
			'host_id':$scope.host_id,'workspace_id':$scope.workspace_id, 'venue_id':$scope.venue_id,
			'fromdate':$scope.fromdate, 'todate':$scope.todate,'team_size':$scope.team_size, 
			'hourly_price':$scope.hourly_price, 'monthly_price':$scope.monthly_price, 
			'weekly_price':$scope.weekly_price, 'total_days':diffDays,
		}).success(function(data){
			alert("Bookin request Sent to host");
             $scope.confirmBooking = true;
            
		})

	};

	$scope.checkAvailability = function(amenity){

		return amenity==='YES';

	};

})





$(function() {
            
            $("#from").datepicker({
                minDate:1,
                dateFormat: "yy-mm-dd",
                onSelect: function() {
                    var scope = angular.element(document.body).scope();
                    scope.fromdate = new Date($('#from').val());
                    scope.$apply();

            $("#to").datepicker(
                    "change",
                    { minDate: new Date($('#from').val()) }
            );
        },

        beforeShowDay : unavilablefromdate,

    });
    $("#to").datepicker({
        minDate:0,
        dateFormat:"yy-mm-dd",
        onSelect: function() {
            var scope = angular.element(document.body).scope();
            scope.todate = new Date($('#to').val());
            scope.$apply();
            $("#from").datepicker(
                    "change",
                    { maxDate: new Date($('#to').val()) }
            );
        
        },
         beforeShowDay : unavilabletodate,
    });
       
        });

setTimeout(function(){
    var scope = angular.element(document.body).scope();
    scope.confirmBooking = false;
    scope.$apply();
}, 1000);


