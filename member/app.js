
	var app = angular.module('instarent', []);
	app.controller('dataController',  function($scope,$http){

		$scope.updateData=function(){

			$http.post('insert.php'{
				'fname':$scope.fname,'sname':$scope.sname,'gender':$scope.gender,'bday':$scope.bday, 
				'email':$scope.email,'contact':$scope.contact,
				'companyname':$scope.companyname,'addr1':$scope.addr1,$scope.addr2:'addr2',
				'city':$scope.city,'pincode':$scope.pincode,
			}).success(function(data){
				console.log("success");
			})

		}

	}	
	})
