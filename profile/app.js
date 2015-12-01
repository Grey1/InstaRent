/**
*  Module
*
* Description
*/
var app= angular.module('instarent', ['angularUtils.directives.dirPagination','ui.bootstrap']);
app.controller('ProfileController', function($http,$scope,$uibModal,$interval,$window){


$scope.fname = fname;
$scope.surname = surname;
$scope.email = email;
$scope.password = password;
$scope.gender = gender;
$scope.contact = contact;
$scope.bday = bday;
$scope.company = company;
$scope.about = about;
$scope.allowAddReview = true;
$scope.ableToGiveReview = true;
$scope.ableToConfirm = true;
$scope.allowConfirmation = true;
$scope.allbookingidreviewed = [];
$scope.allbookingidconfirmed = [];
$scope.showConfirmMessage = false;

$scope.viewreview = function(venueid){
	$http.post('getReview.php',{
		'venueid':venueid,
	}).success(function(reviewdata){
		$scope.allreviews = reviewdata;
		console.log(reviewdata);
		if($scope.allreviews!="0")
			$scope.openreviewmodal($scope.allreviews);
		else
			alert("No reviews to display");
	})	
};

$scope.save = function(){
	$http.post("save.php",{
		'fname':$scope.fname, 'surname':$scope.surname,'email':$scope.email, 'password':$scope.password,
		'company':$scope.company, 'gender':$scope.gender,  'contact':$scope.contact, 'bday':$scope.bday,
		'about':$scope.about,
	}).success(function(data){
		

			$scope.showConfirmMessage = true;
			console.log($scope.showConfirmMessage);
		
	})
};

$scope.reset = function(){
	$scope.fname = $scope.ofname;
	$scope.surname = $scope.osurname;
	$scope.email = $scope.oemail;
	$scope.password = $scope.opassword;
	$scope.company = $scope.ocompany;
	$scope.gender = $scope.ogender;
	$scope.contact = $scope.ocontact;
	$scope.bday = $scope.obday;
	$scope.about = $scope.oabout;
}

$scope.confirm = function(bookingidtoconfirm){
$http.post('confirmbooking.php',{
	'bookingid':bookingidtoconfirm, 'reject':0,
}).success(function(data){
		console.log(data);
		$scope.bookingidconfirmed=data;
		$scope.allbookingidconfirmed.push(data);
		
})
};


$scope.reject = function(bookingidtoconfirm){
$http.post('confirmbooking.php',{
	'bookingid':bookingidtoconfirm, 'reject':1,
}).success(function(data){
	$scope.getCurrentBookings();	
})
};

  $scope.open = function (pastbookingbyme) {

    var modalInstance = $uibModal.open({
      scope:$scope,
      templateUrl: 'myModalContent.html',
      size: 'md',
      controller: 'ReviewController as reviewCtrl',
      resolve:{
      	pastbookingbyme:function(){
			return pastbookingbyme;      		
      	}
      }
    });




    modalInstance.result.then(function (bookingidreviewed) {
      $scope.bookingidreviewed = bookingidreviewed;
      $scope.allbookingidreviewed.push(bookingidreviewed);
    });

  };

  $scope.openreviewmodal = function(allreviews){
	var modalInstance = $uibModal.open({
      scope:$scope,
      templateUrl: 'reviewmodal.html',
      size: 'md',
      controller: 'DisplayReviewController as displayreviewCtrl',
      resolve:{
      	allreviews:function(){
			return allreviews;      		
      	}
      }
    });

    	
    };


$scope.checkToConfirm = function(bookingid){

	var i = $.inArray(bookingid,$scope.allbookingidconfirmed);
	console.log("i",i);
	i=(-1)?$scope.ableToConfirm = false:$scope.ableToConfirm = true;
	return $scope.ableToConfirm;
}



$scope.checkToAddReview = function(bookingid){
	var i = $.inArray(bookingid,$scope.allbookingidreviewed);
	
	i>(-1)?$scope.ableToGiveReview = false:$scope.ableToGiveReview = true;
	return $scope.ableToGiveReview;
}


$scope.checkReviewStatus = function(bookingid){
	console.log(bookingid,$scope.bookingidreviewed);
	bookingid===$scope.bookingidreviewed ?$scope.allowAddReview = false:$scope.allowAddReview = true;
	return $scope.allowAddReview;

}

$scope.checkConfirmStatus = function(bookingid){
	bookingid===$scope.bookingidconfirmed ?$scope.allowConfirmation = false:$scope.allowConfirmation = true;
	return $scope.allowConfirmation;

}

$scope.displayNone=0;

$scope.showNotAvailable=function(x){
	return x===$scope.displayNone;
};	


$scope.getSpaceListings=function(){
	$http.post('getSpaceListings.php',{
	'user_id':$scope.user_id,
	}).success(function(data){
		$scope.listings = data;
		console.log(data);
	})
};


$scope.getCurrentBookingsByMe=function(){
	$http.post('getBookings.php',{
		'booking':3,
	}).success(function(data){
		console.log(data);
		$scope.currentBookingsByMe = data;

		if(data==""){
			$scope.displayNone = 1;
		}else{
			$scope.displayNone = 0;
		}

	})
};



$scope.getPastBookingsByMe=function(){
	$http.post('getBookings.php',{
		'booking':4,
	}).success(function(data){
		console.log(data);
		$scope.pastBookingsByMe = data;

		if(data==""){
			$scope.displayNone = 1;
		}
		else{
			$scope.displayNone = 0;

		}

	})
};


$scope.getCurrentBookings = function(){
	$http.post('getBookings.php',{
		'booking':1,
	}).success(function(data){
		console.log(data);
		$scope.currentBookings = data;

		if(data==""){
			$scope.displayNone = 1;
		}
		else{
			$scope.displayNone = 0;
		}
		})
	 
};


$scope.getPastBookings = function(){
	
	$http.post('getBookings.php',{
		'booking':2,
	}).success(function(data){
		console.log(data);
		$scope.pastBookings = data;

		if(data==""){
			$scope.displayNone = 1;
		}
		else{
			$scope.displayNone = 0;
		}
	})
};


$scope.deleteVenue  = function(venue_id){
	console.log(venue_id);
	$http.post('delete.php',{
		'venue_id':venue_id,
	}).success(function(data){
		console.log(data);
		if(data==1){
			console.log("success");
			$scope.getSpaceListings();
		}
		else{
			alert("Booking Exist for this venue. Cannot be deleted");
		}
		
	})
};







})

app.controller('ReviewController', function($scope,$uibModalInstance,pastbookingbyme,$http){

$scope.pastbookingbyme = pastbookingbyme;
	var reviews = [{
    }];

$scope.allowAddReview = true;
this.review = {};
this.reviews = reviews;

        this.addReview = function (reviews) {
        	
            
            this.reviews.push(this.review);
            this.review = {};
            this.insertReview();
            console.log(this.reviews[1]);
            $scope.allowAddReview=false;
        };

$scope.ok = function () {
    $uibModalInstance.close(pastbookingbyme.booking_id);

  };

$scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };  


  this.insertReview = function(){
  	$http.post('insertreview.php',{
  		'stars':this.reviews[1].stars, 'body':this.reviews[1].body, 'author':this.reviews[1].author,
  		'booking_id':$scope.pastbookingbyme.booking_id,
  		'workspace_id':$scope.pastbookingbyme.workspace_id, 'venue_id':$scope.pastbookingbyme.venue_id,
  		'host_id':$scope.pastbookingbyme.host_id,
  	}).success(function(data){
  		$scope.ok();

  	})
  }
	
})

app.controller('DisplayReviewController', function($scope,$uibModalInstance,allreviews,$http){

$scope.allreviews = allreviews;
$scope.rate = "";

$scope.ok = function () {
    $uibModalInstance.close();

  };

$scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };  


  
	
})




