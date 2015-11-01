var app = angular.module('instarent',[]);
app.controller('BookingController', function($scope,$http){

	
	
	$scope.bookspace =function(){
		$http.post('book.php',{
			'host_id':$scope.host_id,'workspace_id':workspace_id, 'venue_id':$scope.venue_id,
			'fromdate':$scope.fromdate, 'todate':$scope.todate
		}).success(function(data){
			console.log(data);
		})

	};
})