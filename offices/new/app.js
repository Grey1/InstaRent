// Angular code begins

var app = angular.module('AppController', [])

// This controller wll count the number of words and display it on the office/new/hosting_details.php page
app.controller('WordController', function(){
          
          this.WordLength = 0;
          this.Text = "";
          

          this.UpdateWordLength = function($event)
          {
            this.WordLength = this.Text.length;
          };
        });

// This controller wll select the tab on selection on the office/new/hosting_venue_details.php page
app.controller("PanelController", function(){

	this.tab=1;
	
	this.selectTab = function(settab){
		this.tab = settab;
		

		
	};

	this.isSelected = function(checktab){
		return checktab===this.tab;
	};

});

// This controller wll post the data in the office/new/hosting_venue_details.php page
app.controller('dataController', function($scope,$http){
		
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
	else if(num==2){
		$http.post("insert.php",{
			'num':num,'addr':$scope.addr,'neighbours':$scope.neighbours, 'tel':$scope.tel, 'email':$scope.email, 'url':$scope.url,
		}).success(function(data,status){
			if(status==200){
				console.log("success")
			}

		});
	}
		else if(num==3){
		$http.post("insert.php",{
			'num':num,'spacetype':$scope.spacetype,'spacename':$scope.spacename, 'no_similar_space':$scope.no_similar_space, 'descr':$scope.descr,
		}).success(function(data,status){
			if(status==200){
				console.log("success")
			}

		});
	}
		else if(num==4){
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
			'num':num,'descr':$scope.descr,'type':$scope.type, 'floors':$scope.floors, 'area':$scope.area, 'rooms':$scope.rooms, 'desks':$scope.desks,
		}).success(function(data,status){
			if(status==200){
				console.log("success")
			}

		});
	}
		else if(num==6){
		$http.post("insert.php",{
			'num':num,'pricePerHour':$scope.pricePerHour,'pricePerWeek':$scope.pricePerWeek, 'pricePerMonth':$scope.pricePerMonth, 
		}).success(function(data,status){
			if(status==200){
				console.log("success")
			}

		});
	}
		else if(num==7){
		$http.post("insert.php",{
			'num':num,'descr':$scope.descr,'type':$scope.type, 'floors':$scope.floors, 'area':$scope.area, 'rooms':$scope.rooms, 'desks':$scope.desks,
		}).success(function(data,status){
			if(status==200){
				console.log("success")
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

