var app = angular.module('AppController', [])
app.controller('WordController', function(){
          
          this.WordLength = 0;
          this.Text = "";
          

          this.UpdateWordLength = function($event)
          {
            this.WordLength = this.Text.length;
          };
        });

app.controller("PanelController", function(){

	this.tab=1;
	this.selectTab = function(settab){
		this.tab = settab;
	};

	this.isSelected = function(checktab){
		return checktab===this.tab;
	};

});


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
			'num':num,'descr':$scope.descr,'type':$scope.type, 'floors':$scope.floors, 'area':$scope.area, 'rooms':$scope.rooms, 'desks':$scope.desks,
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
			'num':num,'descr':$scope.descr,'type':$scope.type, 'floors':$scope.floors, 'area':$scope.area, 'rooms':$scope.rooms, 'desks':$scope.desks,
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


app.controller('timeController', function(){

	this.frommeridian = "AM" ;
	this.temp="";
	this.previousfrommeridian = "PM";
	this.text = "9:00";
	
	this.changeValue = function(value){
		this.text = value;
	};

	this.setfromMeridian = function(){
		this.temp=this.frommeridian;
		this.frommeridian = this.previousfrommeridian;
		this.previousfrommeridian = this.temp;
		
	};
});



