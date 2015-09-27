/**
*  Module
*
* Description
*/
var app = angular.module('regular', []);
app.controller('formController',function($scope,$http){

	$scope.hello={firstname:"Boaz"};

	$scope.insertData=function(){
		$http.post("insert.php",{

			'fname':$scope.fname,'lname':$scope.lname,
		}).success(function(data,status){
			if(status == 200){
				$scope.hello={firstname:"success"};
			}
		});

	}

});