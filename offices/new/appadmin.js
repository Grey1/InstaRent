

var app = angular.module('AppController', ['ui.bootstrap']);


app.controller('TypeaheadCtrl', function($scope, $http,$window) {
$scope.selected = undefined;
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
}
)

// This controller wll count the number of words and display it on the office/new/hosting_details.php page


// This controller wll select the tab on selection on the office/new/hosting_venue_details.php page


// This controller wll post the data in the office/new/hosting_venue_details.php page
app.controller('dataController', function($scope,$http){

$scope.numberofsteps = 6;
	




          this.WordLength = 0;
          this.Text = "";
          

          this.UpdateWordLength = function($event)
          {
            this.WordLength = this.Text.length;
          };


	this.tab=1;
	
	this.selectTab = function(settab){
		this.tab = settab;
		

		
	};

	this.isSelected = function(checktab){
		return checktab===this.tab;
	};
	$scope.showConfirmationOfListing = false;
	$scope.showConfirmationOfListingMessage = false;

	$scope.listspace = function(){
		$scope.insertData(7);
		$http.post('insert.php',{
			'num':0,
		}).success(function(data){
			
				$scope.showConfirmationOfListing = true;
				$scope.showConfirmationOfListingMessage = true;
				
			
		})
	}

	$scope.insertData=function(num){
		if(num==1){
		$http.post("insert.php",{

			'num':num,'descr':$scope.descr,'type':$scope.type, 'floors':$scope.floors, 'area':$scope.area, 'rooms':$scope.rooms, 'desks':$scope.desks,
		}).success(function(data,status){
			if(status==200){
				console.log("success")
			}

		});
	}
	else if(num==5){


		$http.post("insert.php",{
			'num':num,'essentials':$scope.essentials,'internet':$scope.internet,'wireless':$scope.wireless,
			'parking':$scope.parking,'elevator':$scope.elevator,'buzzer':$scope.buzzer,'doorman':$scope.doorman,
			'kitchen':$scope.kitchen,
		}).success(function(data,status){
			if(status==200){
				console.log(data);
			}

		});
	}
	else if(num==2){
		$http.post("insert.php",{
			'num':num,'addr':$scope.addr,'neighbours':$scope.neighbours, 'tel':$scope.tel, 'email':$scope.email, 'url':$scope.url,
		}).success(function(data,status){
			if(status==200){
				console.log("success");
			}

		});
	}
		else if(num==3){
		$http.post("insert.php",{
			'num':num,'spacetype':$scope.spacetype,'spacename':$scope.spacename, 
			'no_similar_space':$scope.no_similar_space, 'descr':$scope.spacedesc,
		}).success(function(data,status){
			if(status==200){
				console.log("success");
			}

		});
	}
		else if(num==4){

		$http.post("insert.php",{
			'num':num,'photoname1':$scope.photoname1,'photoname2':$scope.photoname2, 'photoname3':$scope.photoname3, 'photoname4':$scope.photoname4, 'photoname5':$scope.photoname5, 'photoname6':$scope.photoname6,
			'photoname7':$scope.photoname7, 'photoname8':$scope.photoname8, 'photoname9':$scope.photoname9,
			'photoname10':$scope.photoname10,
		}).success(function(data,status){
			if(status==200){
				console.log($scope.photoname1);
			}

		});
	}
	
		else if(num==6){
		$http.post("insert.php",{
			'num':num,'pricePerHour':$scope.pricePerHour,'pricePerWeek':$scope.pricePerWeek, 'pricePerMonth':$scope.pricePerMonth, 
		}).success(function(data,status){
			if(status==200){
				console.log("success");
			}

		});
	}
		else if(num==7){
		$http.post("insert.php",{
			'num':num,'fromtime':$scope.fromtime,'totime':$scope.totime, 'availabledays':$scope.availabledays,
		}).success(function(data,status){
			if(status==200){
				console.log("success");
			}

		});
	}
	}

});



// This controller wll give Hints to users on the office/new/hosting_venue_details.php page

app.controller("HintController", function(){

	this.hint=0;
	
	this.selectHint = function(setHint){
		this.hint = setHint;
		

		
	};

	this.isHint = function(checkhint){
		return checkhint===this.hint;
	};

});




