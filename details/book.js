var app = angular.module('instarent',[]);
app.controller('BookingController', function($scope,$http){

	$scope.book =function(){

		$http.post('book.php',{
			'user_id':$scope.user_id,'workspace_id':workspace_id,
		}).success(function(data){
			console.log(data);
		})

	}
})