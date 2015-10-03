/**
*  Module
*
* Description
*/
var app = angular.module('regular', []);
app.controller('formController',function($scope,$http){

	$http.get("practice.php").success(function(data){
		$scope.name=data;
		console.log($scope.name);
	})

});