<?php 
session_start();
?>





<!DOCTYPE html>
<html lang="" ng-app='instarent'>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instarent</title>

		<!-- Bootstrap CSS -->
		<link href="../dashboard/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="../dashboard/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">		
		<link href="../dashboard/css/style_v1.css" rel="stylesheet">
    <link href="animations.css" rel="stylesheet">

		
		
				
		
		<!-- Bootstrap JavaScript -->
    
		<script src="../dashboard/plugins/jquery/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>        
		<script src="../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src = "../Angular/js/angular.min.js"></script>
    <script src = "../dashboard/js/ui-bootstrap.min.js"></script>
		<script src = "user_profile.js"></script>
		<script src = "app.js"></script>
    <script src ="../dashboard/js/dirPagination.js"></script>

    	
<style type="text/css">
.modal-content{
  margin-top: 20%;
}

.ng-invalid.ng-dirty {
    border-color:#FA787E;
}

.ng-valid.ng-dirty {
    border-color:#78FA89;
}
</style>		


	</head>
<body ng-controller='ProfileController'>



	<!-- Header -->
<?php

include("../header/headerafterlogin.html");
  
?>

<!-- Header -->

<hr>
<div class="well well-lg" >
<script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header" >
            <h1>Reviews</h1>

        <form name="reviewForm" ng-submit="reviewForm.$valid && reviewCtrl.addReview(review)" novalidate>

            <blockquote ng-show="reviewCtrl.review"> 
                <strong>{{reviewCtrl.review.stars}} Stars</strong>
                {{reviewCtrl.review.body}} 
                <cite class="clearfix">—{{reviewCtrl.review.author}}</cite>
            </blockquote>
            
             <h4>Submit Review</h4>
    
            <fieldset class="form-group">
                <select ng-model="reviewCtrl.review.stars" class="form-control" 
                ng-options="stars for stars in [5,4,3,2,1]" title="Stars" required>
                    <option value="">Your rating</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <textarea ng-model="reviewCtrl.review.body" class="form-control" 
                placeholder="Your review" title="Review" required></textarea>
            </fieldset>
            <fieldset class="form-group">
                <input ng-model="reviewCtrl.review.author" type="email" class="form-control" 
                placeholder="Your email address" title="Email" required>
            </fieldset>
            <fieldset class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit Review">
            </fieldset>
        </form>
      </div>
        
        
</script>
  
<div class="container-fluid">
  

<div class="row">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
            <li><a href="#bookings" ng-click ="getCurrentBookings()" data-toggle="tab">Bookings for my space</a></li>
            <li><a href="#listings" ng-click="getSpaceListings()" data-toggle="tab">Space Listings</a></li>
            <li><a href="#bookingsbyme" ng-click ="getCurrentBookingsByMe()" data-toggle="tab">Bookings by me</a></li>
    </ul>
    </div>
</div>
<!-- begin -->                  
<div class="tab-content">


<div class="tab-pane" id="bookingsbyme">
  <div class="well well-lg">

      <ul class="nav nav-tabs" id="bookingbymetab">
        <li class="active"><a href="#upcomingbookingsbyme" ng-click="getCurrentBookingsByMe()" 
        data-toggle="tab">Upcoming Bookings</a></li>
        <li><a href="#pastbookingsbyme" ng-click ="getPastBookingsByMe()" 
          data-toggle="tab">Past Bookings</a></li>
      </ul>

      <div class="tab-content">
        
        <div class="tab-pane active" id="upcomingbookingsbyme">
          <div ng-show="showNotAvailable(1)"> <p class="text-info"> No Bookings available </p> </div>
          <div class="row" ng-show="showNotAvailable(0)">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
            dir-paginate="currentbookingbyme in currentBookingsByMe|itemsPerPage:6">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Hosted by</th>
                  
                    <th>Company name</th>
                  
                    <th>Address</th>
                  
                    <th>Workspace name</th>

                    <th>From date</th>
                  
                    <th>To date</th>
                  
                    <th> Confirmation by host </th>

                    <th>Payment amount</th>
                  
                    <th>Payment status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    <div class="avatar">
                        <img class="img-responsive img-circle" alt="avatar" 
                        ng-src="../member/{{currentbookingbyme.photo_path}}">
                        <h6 class="text-primary"> {{currentbookingbyme.first_name}}&nbsp{{currentbookingbyme.surname}}</h6>
                    </div>

                    </td>
                    <td>
                      {{currentbookingbyme.company_name}}
                    </td>
                    <td>
                      {{currentbookingbyme.address1}} &nbsp
                      {{currentbookingbyme.address2}}
                    </td>
                    
                    <td>
                      {{currentbookingbyme.space_name}}
                    </td>
                    <td>
                      {{currentbookingbyme.from_date}}
                    </td>
                    <td>
                      {{currentbookingbyme.to_date}}
                    </td>
                    <td>
                      {{currentbookingbyme.confirmation_from_host==="0"?paymentstatus="Awaiting Confirmation":paymentstatus="Confirmed"}}
                    </td>
                    <td>
                      {{currentbookingbyme.total_amount}}
                    </td>
                    <td>{{currentbookingbyme.payment_status==="0"?paymentstatus="Not Paid":paymentstatus="Paid"}}
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>
<dir-pagination-controls
        max-size="20"
        direction-links="true"
        boundary-links="true" >
</dir-pagination-controls>

        </div>

        <div class="tab-pane" id="pastbookingsbyme">
          <div ng-show="showNotAvailable(1)"> <p class="text-info"> No Bookings available </p> </div>
          <div class="row" ng-show="showNotAvailable(0)">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
            dir-paginate="pastbookingbyme in pastBookingsByMe|itemsPerPage:6">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Hosted by</th>
                  
                    <th>Company name</th>
                  
                    <th>Address</th>
                  
                    <th>Workspace name</th>

                    <th>From date</th>
                  
                    <th>To date</th>
                  
                    <th> Confirmation by host </th>

                    <th>Payment amount</th>
                  
                    <th>Payment status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                    <div class="avatar">
                        <img class="img-responsive img-circle" alt="avatar" 
                        ng-src="../member/{{pastbookingbyme.photo_path}}">
                        <h6 class="text-primary"> {{pastbookingbyme.first_name}}&nbsp{{pastbookingbyme.surname}}</h6>
                    </div>

                    </td>
                    <td>
                      {{pastbookingbyme.company_name}}
                    </td>
                    <td>
                      {{pastbookingbyme.address1}} &nbsp
                      {{pastbookingbyme.address2}}
                    </td>
                    
                    <td>
                      {{pastbookingbyme.space_name}}
                    </td>
                    <td>
                      {{pastbookingbyme.from_date}}
                    </td>
                    <td>
                      {{pastbookingbyme.to_date}}
                    </td>
                    <td>
                      {{pastbookingbyme.confirmation_from_host==="0"?paymentstatus="Awaiting Confirmation":paymentstatus="Confirmed"}}
                    </td>
                    <td>
                      {{pastbookingbyme.total_amount}}
                    </td>
                    <td>{{pastbookingbyme.payment_status==="0"?paymentstatus="Not Paid":paymentstatus="Paid"}}
                    </td>
                    <td>
                      <p style="display:none">{{pastbookingbyme.review_id===null?enabledvalue=false:enabledvalue=true}}</p>
                      <button  type="button" ng-disabled="enabledvalue" 
                      ng-click=" checkToAddReview(pastbookingbyme.booking_id) && open(pastbookingbyme)" 
                      ng-attr-id="b{{pastbookingbyme.booking_id}}" class="btn btn-info openModal"   >
                      Leave a Review</button>
                      <h6 class="text-success" ng-hide="checkReviewStatus(pastbookingbyme.booking_id)"> Review Submitted Successfully </h6>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>




<dir-pagination-controls
        max-size="20"
        direction-links="true"
        boundary-links="true" >
</dir-pagination-controls>

        </div>
 <!-- Second div pane ends -->
</div>
</div>
</div>













  <div class="tab-pane active" id="home">
    <h3 style="margin-top:20px">Edit Profile</h3>
  	   <hr>
    <div class="row">
      <div class="col-md-4"> 
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input class="form-control" type="file">
        </div>
      </div>
      <div class="col-md-8 personal-info">
        <div class="row">
      	<h3>Personal info</h3>
        </div> <br>
        <div class="row">
      	
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="col-lg-3 control-label">First name:</label>
              <div class="col-lg-8">
                <input class="form-control" value="Jane" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Last name:</label>
              <div class="col-lg-8">
              <input class="form-control" value="Bishop" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Company:</label>
              <div class="col-lg-8">
                <input class="form-control" value="" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" value="janesemail@gmail.com" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Time Zone:</label>
              <div class="col-lg-8">
                <div class="ui-select">
                  <select id="user_time_zone" class="form-control">
                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                    <option value="Alaska">(GMT-09:00) Alaska</option>
                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option value="Arizona">(GMT-07:00) Arizona</option>
                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Username:</label>
              <div class="col-md-8">
                <input class="form-control" value="janeuser" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" value="11111122333" type="password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Confirm password:</label>
              <div class="col-md-8">
              <input class="form-control" value="11111122333" type="password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input class="btn btn-primary" value="Save Changes" type="button">
                <span></span>
                <input class="btn btn-default" value="Cancel" type="reset">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

  

  <div class="tab-pane" id="listings">
    <p style="display:none">{{user_id=<?php echo $_SESSION['currentuserid'] ?>}}</p>
      <div class="well listing-details" ng-repeat = "listing in listings">
        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <a ng-attr-href="../offices/new/hosting_venue_details.php?venue_id={{listing.venue_id}}" class="col-md-5"> <img class="img-responsive" ng-src="../offices/new/{{listing.image_1}}"> 
            <span class="label label-info">{{listing.name}}/{{listing.space_name}}</span>
            </a>
          </div>
          <div class="col-md-2">
            <button type="button" ng-attr-id="{{listing.venue_id}}" 
            class="btn btn-primary pull-left" 
            ng-click="deleteVenue(listing.venue_id)">Delete</button>
          </div>


        </div>

      </div>

      <hr>
                  
    </div>

<hr>
 
  <div class="tab-pane" id="bookings">
    <div class="well well-lg">

      <ul class="nav nav-tabs" id="mybookingTab">
        <li class="active"><a href="#upcomingbookings" ng-click="getCurrentBookings()" 
        data-toggle="tab">Upcoming Bookings</a></li>
        <li><a href="#pastbookings" ng-click ="getPastBookings()" 
          data-toggle="tab">Past Bookings</a></li>
      </ul>
          
      <div class="tab-content">
        <div class="tab-pane active" id="upcomingbookings">
          <div ng-show="showNotAvailable(1)"> <p class="text-info"> No Bookings available </p> </div>
          <div class="row" ng-show="showNotAvailable(0)">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" dir-paginate="currentbooking in currentBookings|itemsPerPage:6">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Booked by</th>
                  
                    <th>Company name</th>
                  
                  
                    <th>Address</th>
                  
                    <th> Workspace name </th>

                    <th>From date</th>
                  
                  
                    <th>To date</th>
                  
                  
                    <th>Payment amount</th>
                  
                  
                    <th>Payment status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="avatar">
                        <img class="img-responsive img-circle" alt="avatar" 
                        ng-src="../member/{{currentbooking.photo_path}}">
                        <h6 class="text-primary"> {{currentbooking.first_name}}&nbsp{{currentbooking.surname}}</h6>
                      </div>
                    </td>
                    <td>
                      {{currentbooking.company_name}}
                    </td>
                    <td>
                      {{currentbooking.address1}} &nbsp
                      {{currentbooking.address2}}
                    </td>
                    <td>
                      {{currentbooking.space_name}}
                    </td>
                    <td>
                      {{currentbooking.from_date}}
                    </td>
                    <td>
                      {{currentbooking.to_date}}
                    </td>
                    <td>
                      {{currentbooking.total_amount}}
                    </td>
                    <td>
                      {{currentbooking.payment_status==="0"?paymentstatus="Not Paid":paymentstatus="Paid"}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
<dir-pagination-controls
        max-size="20"
        direction-links="true"
        boundary-links="true" >
</dir-pagination-controls>

        </div>
        <div class="tab-pane" id="pastbookings">
          <div ng-show="showNotAvailable(1)"> <p class="text-info"> No Bookings available </p> </div>
          <div class="row" ng-show="showNotAvailable(0)">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" dir-paginate="pastbooking in pastBookings|itemsPerPage:6">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Booked by</th>
                  
                  
                    <th>Company name</th>
                  
                  
                    <th>Address</th>
                  
                  
                    <th>From date</th>
                  
                  
                    <th>To date</th>
                  
                  
                    <th>Payment amount</th>
                  
                  
                    <th>Payment status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="avatar">
                      <img class="img-responsive img-circle" alt="avatar" 
                      ng-src="../member/{{pastbooking.photo_path}}">
                      <h6 class="text-primary"> {{pastbooking.first_name}}&nbsp{{pastbooking.surname}}</h6>
                      </div>
                    </td>
                    <td>
                      {{pastbooking.company_name}}
                    </td>
                    <td>
                      {{pastbooking.address1}} &nbsp
                      {{pastbooking.address2}}
                    </td>
                    <td>
                      {{pastbooking.from_date}}
                    </td>
                    <td>
                      {{pastbooking.to_date}}
                    </td>
                    <td>
                      {{pastbooking.total_amount}}
                    </td>
                    <td>
                      {{pastbooking.payment_status==="0"?paymentstatus="Not Paid":paymentstatus="Paid"}}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <dir-pagination-controls
                  max-size="20"
                  direction-links="true"
                  boundary-links="true" >
          </dir-pagination-controls>
        </div> 
      </div>
    </div> 
  </div>
</div>
</div>
</div>         
</div>



</body>
</html>


