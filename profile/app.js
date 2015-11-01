/**
*  Module
*
* Description
*/
var app= angular.module('instarent', ['angularUtils.directives.dirPagination','ui.bootstrap']);
app.controller('ProfileController', function($http,$scope,$uibModal,$interval){

$scope.allowAddReview = true;
$scope.ableToGiveReview = true;



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
    });

  };

$scope.checkToAddReview = function(bookingid){
	bookingid===$scope.bookingidreviewed ?$scope.ableToGiveReview = false:$scope.ableToGiveReview = true;
	return $scope.ableToGiveReview;
}


$scope.checkReviewStatus = function(bookingid){
	console.log(bookingid,$scope.bookingidreviewed);
	bookingid===$scope.bookingidreviewed ?$scope.allowAddReview = false:$scope.allowAddReview = true;
	return $scope.allowAddReview;

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
		if(data==venue_id){
			console.log("success");
			$scope.getSpaceListings();}
		
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




