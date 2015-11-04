<?php
session_start();

$server_name="localhost";
$db_name="instarent";
$username="root";
$password="";
$con = mysql_connect($server_name,$username,$password);
if(!$con){
  die('Could not connect'.mysql_error());
}

mysql_select_db($db_name);
$sql = "SELECT 
user.email,user.first_name,user.password,user.surname,user_details.gender,
user_details.birth_date,user_details.contact,
user_details.company_name,user_details.address1,
user_details.address2,user_details.pincode,user_details.city,user_details.photo_path
from user LEFT JOIN user_details 
ON user.userid = user_details.user_id where userid = '".$_SESSION["currentuserid"]."'";
$query = mysql_query($sql,$con);

while ($row = mysql_fetch_array($query)) {
  // code...  Put data into variables 
  $email = $row['email'];
  $gender=$row['gender'];
  $first_name = $row['first_name'];
  $surname = $row['surname'];
  $birth_date=$row['birth_date'];
  $contact=$row['contact'];
  $company_name=$row['company_name'];
  $address1=$row['address1'];
  $address2=$row['address2'];
  $pincode=$row['pincode'];
  $city=$row['city'];
  $password = $row['password'];
  $photo_path = $row['photo_path'];
}

mysql_close($con);

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
		
		<link href="../dashboard/css/style_v1.css" rel="stylesheet">
    <link href="animations.css" rel="stylesheet">

		
		
				
		
		<!-- Bootstrap JavaScript -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">       
		<script src="../dashboard/plugins/jquery/jquery.min.js"></script>
    <script src="../dashboard/js/jquery-ui.js"></script>        
		<script src="../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src = "../Angular/js/angular.min.js"></script>
    <script src = "../dashboard/js/ui-bootstrap.min.js"></script>
		<script src = "user_profile.js"></script>
		<script src = "app.js"></script>
    <script src ="../dashboard/js/dirPagination.js"></script>
    <script src = "../../dashboard/js/jquery.form.js"></script>
    <script type="text/javascript">

    var fname = '<?php echo $first_name; ?>';
    var surname = '<?php echo $surname; ?>';
    var email = '<?php echo $email; ?>';
    var password = '<?php echo $password; ?>';
    var contact = '<?php echo $contact; ?>';
    var company = '<?php echo $company_name; ?>';
    var bday = '<?php echo $birth_date; ?>';
    var gender = '<?php echo $gender; ?>';

    </script>

    <script type="text/javascript">

$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form_id').ajaxForm({
            //display the uploaded images
            target:document.getElementById('images_preview'),
            
            beforeSubmit:function(e){
                
            },
            success:function(response){
                
                

            },
            error:function(e){
            }
        }).submit();
    });
})

    </script>
    	
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
<header class="navbar">
  <div class="container-fluid expanded-panel">
    <div class="row">
      <div id="logo" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
        <a href="#">InstaRent</a>
      </div>

      <div id="top-panel" class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
      <div class="col-xs-7 col-md-7 col-lg-7 col-sm-7">
      <form class="navbar-form navbar-left" role="search" 
      ng-show="venue.checkVal(0)" style="margin-bottom:2px">
            
    
    <input type="text" name="state" id="state"
     class="form-control form-field" value="" required="required" 
     title="" placeholder = "Select state" ng-model='state' style="margin-top:-7px">
    <input type="text" name="city" id="city" 
    class="form-control form-field" value="" required="required" 
    title="" placeholder = "Select city" ng-model='city' style="margin-top:-7px">
    <select name="event_type" id="input" class="form-control form-field" required="required" 
    ng-model='event_type' style="margin-top:-7px">
      <option value="1">Business Centre</option>
      <option value="2">Corporate Office</option>
      <option value="3">Coworking Office</option>
      <option value="4">Hotel</option>
      <option value="5">Startup Office</option>
      <option value="6">Studio</option>
    </select>

    <button type="submit" id="search" class="btn btn-primary" style="height:44px;line-height:10px;margin-top:-1%" ng-click="getVenues();venue.setVal(0)" >Search</button>


    </form>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
      
              <ul class="nav navbar-nav pull-right panel-menu">
              <li class="hidden-xs">
                <a href="../offices/new/hosting_details.php" class="modal-link">
                  <div class="host"> Host  
                  <i class="fa fa-building"></i>
                  <span class="badge"></span>
                  </div>
                </a>
              </li>
              <li>
                &nbsp&nbsp&nbsp&nbsp
              </li>




              <li class="hidden-xs">
                <a href="#" class="modal-link">
                  <i class="fa fa-bell"></i>
                  <span class="badge"></span>
                </a>
              </li>



              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                  <div class="avatar">
                    <img src="../img/avatar.jpg" class="img-circle" alt="avatar" />
                  </div>
                  <i class="fa fa-angle-down pull-right"></i>
                  <div class="user-mini pull-right">
                    <span class="welcome">Welcome,</span>
                    <span><?php if (isset($_SESSION["fullname"])) echo $_SESSION["fullname"] ;else echo "";  ?></span>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="../profile/user_profile.php">
                      <i class="fa fa-user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="../ajax/page_messages.html" class="ajax-link">
                      <i class="fa fa-envelope"></i>
                      <span>Messages</span>
                    </a>
                  </li>
                  
                  <li>
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="../logout.php">
                      <i class="fa fa-power-off"></i>
                      <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
    </div>
 <!-- Insert code here           -->

          
        
      </div>
    </div>
  </div>
</header>


<!-- Header -->
<p style="display:none">

{{ofname = '<?php echo $first_name?>'}}
{{oemail = '<?php echo $email?>'}}
{{ogender = '<?php echo $gender?>'}}
{{osurname = '<?php echo $surname?>'}}
{{obday = '<?php echo $birth_date?>'}}
{{ocompany = '<?php echo $company_name?>'}}
{{ocontact = '<?php echo $contact?>'}}
{{opassword = '<?php echo $password?>'}}


</p>
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
            >
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
                <tbody dir-paginate="currentbookingbyme in currentBookingsByMe|itemsPerPage:6">
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
            >
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
                <tbody dir-paginate="pastbookingbyme in pastBookingsByMe|itemsPerPage:6">
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
      <form  method="post" name="multiple_upload_form" 
      id="multiple_upload_form_id" enctype="multipart/form-data" action="upload_image.php">
          <input type="hidden" name="image_form_submit" value="1"/>
          <div id="images_preview">
            <img src="<?php echo $photo_path; ?>" class="avatar img-circle" alt="avatar"
                style="height:80px; width:80px;cursor:pointer;">
          </div>
          <label class="fileContainer">Choose Image
          <input class="form-control" ng-model = "file" type="file" name="images[]" id="images" multiple accept=".jpg,.jpeg" 
          required> 

          
          </label>
          <h6>Upload a different photo...</h6>
        </form>
        </div>
      </div>
    
      <div class="col-md-8 personal-info">
        <div class="row">
      	<h3>Personal info</h3>
        </div> <br>
        <div class="row">
      	<p class="text-success" ng-show="showConfirmMessage">Profile Saved Successfully </p>
          <form class="form-horizontal" name='userform'>
            <div class="form-group">
              <label class="col-lg-3 control-label">First name:</label>
              <div class="col-lg-8">
                <input type="text" name="fname" ng-model="fname" id="inputFname" class="form-control" value="" required="required"  title="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Last name:</label>
              <div class="col-lg-8">
              <input class="form-control" ng-model = "surname"  type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Company:</label>
              <div class="col-lg-8">
                <input ng-model = "company" class="form-control"  type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input class="form-control" ng-model="email"  type="text" required >
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-3 control-label">Birth date:</label>
              <div class="col-lg-8">
                <input class="form-control" ng-model="bday"  type="text" required >
              </div>
            </div>  

            <div class="form-group">
              <label class="col-lg-3 control-label">Contact number:</label>
              <div class="col-lg-8">
                <input class="form-control" ng-model="contact"  
                type="text" required value= "">
              </div>
            </div>
            


            <div class="form-group">
              <label class="col-md-3 control-label">I am</label>
              
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <select name="gender" id="input" class="form-control" required ng-model='gender'>
                  <option value="1" >Gender </option>
                  <option value="2" >Male </option>
                  <option value="3" >Female</option>
                  <option value="4" >Other</option>
                </select>
              </div>
              
              
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Password:</label>
              <div class="col-md-8">
                <input class="form-control" value="" ng-model="password"  required type="password" 
                >
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input class="btn btn-primary" ng-click="save()" value="Save Changes" type="submit">
                <span></span>
                <input class="btn btn-default" value="Cancel" ng-click="reset()">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

  

  <div class="tab-pane" id="listings">
    <p style="display:none">{{user_id=<?php  if(isset($_SESSION['currentuserid'])) echo $_SESSION['currentuserid'];  ?>}}</p>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                <tbody dir-paginate="currentbooking in currentBookings|itemsPerPage:6">
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
                    <td>
                      <p style="display:none"> 
                        {{currentbooking.confirmation_from_host==0?confirmvalue=false:confirmvalue=true}} </p>
                      <button ng-click="  checkConfirmStatus(currentbooking.booking_id) 
                        && confirm(currentbooking.booking_id)" 
                      type="button" ng-disabled="confirmvalue"  
                      class="btn btn-info">Confirm Booking</button>
                      <h6 class="text-success" ng-hide="checkConfirmStatus(currentbooking.booking_id)">
                       Confirmed </h6> 

                    </td>
                    <td>
                      <button ng-click="reject(currentbooking.booking_id)" 
                      ng-disabled ="checkToReject(currentbooking.booking_id)" type="button" class="btn btn-info">Reject Booking</button>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
            >
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
                <tbody dir-paginate="pastbooking in pastBookings|itemsPerPage:6">
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


