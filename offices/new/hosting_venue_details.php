<?php 
session_start();

if(isset($_SERVER['HTTP_REFERER'])){
	if($_SERVER['HTTP_REFERER']=="http://localhost:1234/profile/user_profile.php"){

		$venue_id = $_GET['venue_id'];
		$_SESSION["venueid"] = $venue_id;

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		
		$conn = mysql_connect($servername, $username,$password);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}

		mysql_select_db($dbname,$conn);

		$sql = "SELECT * from venue INNER JOIN workspace ON venue.venue_id = workspace.venue_id 
		INNER JOIN amenities ON venue.venue_id=amenities.venue_id INNER JOIN workspace_pricing 
		ON venue.venue_id = workspace_pricing.venue_id where venue.venue_id = '".$venue_id."'";
		$query = mysql_query($sql);
		$data = mysql_fetch_assoc($query);



}

?>

<!DOCTYPE html>
<html lang="" ng-app="AppController">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instarent</title>

		<!-- Bootstrap CSS -->
		<link href="../../dashboard/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="../../dashboard/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="../../dashboard/css/font-awesome.min.css" rel="stylesheet">		
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		
		<link href="../../dashboard/css/style_v1.css" rel="stylesheet">
		<link href="../../custom-div.css" rel="stylesheet">
		
		
		
		
		<!-- Bootstrap JavaScript -->
		
		<script src="../../dashboard/js/jquery.js"></script>

		<script src="../../dashboard/plugins/jquery/jquery.min.js"></script>
		<script src="../../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		<script src = "../../dashboard/js/jquery.form.js"></script>
		<script src = "../../Angular/js/angular.min.js"></script>
		<script src = "../../dashboard/js/ui-bootstrap.min.js"></script>
		
		
    	<script src="app.js"></script>

<style type="text/css">

.animate-show.ng-hide-add, .animate-show.ng-hide-remove {
  transition: all 0.5s ease-in-out
}

.animate-show.ng-hide {
 
}
</style>		
    


	</head>
<body >

<!-- Header -->
<div class="container-fluid">	
 <div class="row" style="vertical-align:0">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<a href="#">InstaRent</a>
			</div>

			<div id="top-panel" class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="col-xs-7 col-md-7 col-lg-7 col-sm-7">
			<form class="navbar-form navbar-left" role="search" 
			ng-show="venue.checkVal(0)" style="margin-bottom:2px">

						
			    <input type="text" ng-model='city' name = "location" placeholder="Location " 
	    uib-typeahead="address for address in getLocation($viewValue)" 
	    typeahead-loading="loadingLocations" typeahead-no-results="noResults" name="city" 
	    class="form-control form-field" style="	margin-bottom: 21px;
	margin-top: -7px;">
	    <i ng-show="loadingLocations" class="glyphicon glyphicon-refresh" ></i>
	    <div ng-show="noResults">
	      <i class="glyphicon glyphicon-remove"></i> No Results Found
	    </div>


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
								<a href="hosting_details.php" class="modal-link">
									<div class="host"> Host  
									<i class="fa fa-building"></i>
									<span class="badge"></span>
									</div>
								</a>
							</li>
							<li>
								&nbsp&nbsp&nbsp&nbsp
							</li>



<!-- Notification Bell -->
							<!-- <li class="hidden-xs">
								<a href="#" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge"></span>
								</a>
							</li>
 -->


							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="<?php if (isset($_SESSION["userimag"])) echo "../../profile/".$_SESSION["userimag"] ;else echo "";  ?>" class="img-circle" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?php if (isset($_SESSION["fullname"])) echo $_SESSION["fullname"] ;else echo "";  ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="../../profile/user_profile.php">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									
									<li>
										<a href="../../logout.php">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
		</div>
 <!-- Insert code here					 -->

					
				
			</div>
		</div>
	</div>
</header>
 </div>
</div>
 </div>


<!-- Header -->


<div class="well" ng-controller="dataController as data">
	<div class="row" >
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body" id ="top-menu">
				   
					<ul class="nav nav-pills nav-stacked">
						<p claas="pull-right" style="color:#C0C0C0" > Listing </p>
  						<li role="presentation" ng-class = "{current:data.isSelected(1)}">
  							<a href ng-click="data.selectTab(1)" style="color:#808080" >Venue description 
  								<p class="pull-right"> 
  								 <span ng-class="{glyphicon:true,'glyphicon-plus':!venueform.$valid,'glyphicon-ok':venueform.$valid}" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:data.isSelected(2)}" >
  							<a href ng-click="data.selectTab(2)"style="color:#808080">Location <p class="pull-right">  
  								<span ng-class="{glyphicon:true,'glyphicon-plus':!addressform.$valid,'glyphicon-ok':addressform.$valid}" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:data.isSelected(3)}" >
  							<a href ng-click="data.selectTab(3)" style="color:#808080">Workspaces <p class="pull-right">  
  								<span ng-class="{glyphicon:true,'glyphicon-plus':!workspaceform.$valid,'glyphicon-ok':workspaceform.$valid}" aria-hidden="true"> </span> </p> </a></li>
  						
  						<li role="presentation" ng-class = "{current:data.isSelected(4)}">
  							<a href ng-click="data.selectTab(4)" style="color:#808080">Photos 
  								<p class="pull-right">  
  									<span class="" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:data.isSelected(5)}" >
  							<a href ng-click="data.selectTab(5)" style="color:#808080">Amenities  </a></li>
  						 <p claas="pull-right" style="color:#C0C0C0" > Hosting </p>
  						<li role="presentation" ng-class = "{current:data.isSelected(6)}" >
  							<a href ng-click="data.selectTab(6)" style="color:#808080">Pricing 
  								<p class="pull-right"> 
  								 <span ng-class="{glyphicon:true,'glyphicon-plus':!pricingform.$valid,'glyphicon-ok':pricingform.$valid}" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:data.isSelected(7)}" >
  							<a href ng-click="data.selectTab(7)" style="color:#808080">Calendar 
  								<p class="pull-right"> 
  								 <span ng-class="{glyphicon:true,'glyphicon-plus':!calendarform.$valid,'glyphicon-ok':calendarform.$valid}" aria-hidden="true"> </span> </p> </a></li>
  						<li style="display:none;"role="presentation" ng-class = "{current:data.isSelected(8)}">
  							<a href ng-click="data.selectTab(8)" style="color:#808080">Reservation <p class="pull-right"> 
  							 <span ng-class="{glyphicon:true,'glyphicon-plus':!calendarform.$valid,'glyphicon-ok':calendarform.$valid}" aria-hidden="true"> </span> </p> </a></li>

					</ul>

				</div>
				<div class="jumbotron animate-show" ng-show="!(venueform.$valid && addressform.$valid && workspaceform.$valid
				&& pricingform.$valid && calendarform.$valid)" 
				style="padding:20px"> Complete <i class="lead"><strong> {{numberofsteps}} steps</strong></i> &nbsp for hosting your space
				</div>
				<div class="jumbotron animate-show"
				 ng-show="venueform.$valid && addressform.$valid && workspaceform.$valid
				&& pricingform.$valid && calendarform.$valid" 
				style="padding:20px"> <button type="button" ng-disabled ="showConfirmationOfListing" class="btn btn-success" ng-click="listspace()">List Your space</button>
				</div>

				<div ng-show="showConfirmationOfListingMessage" class="alert alert-success" role="alert">Well Done! You Have succesfully listed your space.
  				You can Edit your workspace	<a href="../../profile/user_profile.php" class="alert-link"> <strong>Here</strong> </a>
				</div>

			</div>
		</div>


		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">

			<?php if(isset($data)){ ;?>
			<script type="text/javascript">

			var event_type = '<?php echo $data["event_type"]; ?>';
			var descr= '<?php echo $data["venue_desc"]; ?>';
			var floors= <?php echo $data["no_of_floors"]; ?>;
			var area= <?php echo $data["floor_area"]; ?>;
			var rooms= <?php echo $data["no_of_rooms"]; ?>;
			var desks= <?php echo $data["no_of_desks"]; ?>;
			var neighbours= '<?php echo $data["neighbourhood"]; ?>';
			var tel= <?php echo $data["telephone"]; ?>;
			var email= '<?php echo $data["email"]; ?>';
			var url= '<?php echo $data["website"]; ?>';
			var addr= '<?php echo $data["addr"]; ?>';
			var spacetype= '<?php echo $data["type"]; ?>';
			var spacename= '<?php echo $data["space_name"]; ?>';
			var no_similar_space= <?php echo $data["similar_workspace"]; ?>;
			var spacedesc= '<?php echo $data["space_desc"]; ?>';
			var essentials = '<?php echo $data["essentials"]; ?>';
			var internet = '<?php echo $data["internet"]; ?>';
			var wireless = '<?php echo $data["wifi"]; ?>';
			var parking = '<?php echo $data["parking"]; ?>';
			var elevator = '<?php echo $data["elevator"]; ?>';
			var buzzer = '<?php echo $data["buzzer"]; ?>';
			var doorman = '<?php echo $data["doorman"]; ?>';
			var kitchen = '<?php echo $data["kitchen"]; ?>';
			var pricePerHour = <?php echo $data["hourly_price"]; ?>;
			var pricePerWeek = <?php echo $data["weekly_price"]; ?>;
			var pricePerMonth = <?php echo $data["monthly_price"]; ?>;
			var fromtime = '<?php echo $data["opening_time"]; ?>';
			var totime = '<?php echo $data["closing_time"]; ?>';
			var availabledays = <?php echo $data["available_days"] ?>;
			

			</script>
			<?php } else { ?>

<script type="text/javascript">
			var event_type ="";
			var descr="";
			var floors="";
			var area="";
			var rooms="";
			var desks="";
			var neighbours="";
			var tel="";
			var email="";
			var url="";
			var addr="";
			var spacetype="";
			var spacename="";
			var no_similar_space="";
			var spacedesc="";
			var essentials ="";
			var internet ="";
			var wireless ="";
			var parking ="";
			var elevator ="";
			var buzzer ="";
			var doorman ="";
			var kitchen ="";
			var pricePerHour ="";
			var pricePerWeek ="";
			var pricePerMonth ="";

var fromtime ="";
var totime = "";
var availabledays ="";

</script>
			<?php }?>

			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(1)"> Give details about your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(2)"> Set your listing location </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(3)"> Spaces are physical areas that can be booked in your venue </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(6)"> Set a Price for your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header"ng-show="data.isSelected(4)"> Add Unique Photos of your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(5)"> Every space on Instarent is unique. Highlight what makes your listing welcoming so that it stands out to our users.</h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(7)">  </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="data.isSelected(8)">  </h3>
				</div>
			
				<div class="panel-body" >	
					<div class = "description-panel" ng-show="data.isSelected(1)">
						<form name = venueform novalidate>
					<label> Description </label> 
					<h5  class = "text-danger" 
					ng-show ="venueform.description.$touched && venueform.description.$error.required" > 
						Required  </h5>
					<textarea ng-mouseover = "" 
					 ng-model = "descr" name="description" id="input" 
					 class="form-control" rows="4" required ></textarea>
					
						<br>

					<label > Venue type</label>
					<h5  class = "text-danger" 
					ng-show ="venueform.type.$touched && venueform.type.$error.required" > 
						Required  </h5>
					<select ng-mouseover = "" 
					ng-model = "type" name="type" id="type" class="form-control" required>
						<option value="1">Business Centre</option>
						<option value="2">Corporate Office</option>
						<option value="3">Coworking Office</option>
						<option value="4">Hotel</option>
						<option value="5">Startup Office</option>
						<option value="6">Studio</option>
					</select>
					
					<label > Number of floors </label>
					<h5  class = "text-danger" 
					ng-show ="venueform.num_floors.$touched && venueform.num_floors.$error.required" > 
						Required  </h5>
					<input ng-mouseover = "" min=1 max= 100 ng-model = "floors" 
					type="number" name="num_floors" id="num_floors" class="form-control" 
					value="" min=1 max="" step="" required title="">
					
					<label > Floor Area </label>
					<input ng-mouseover = "hint.selectHint(1)"ng-model = "area" 
					min=1 type="number" name="floor_area" id="floor_area" class="form-control" 
					value="" title="">
					
					<label > Number of rooms </label>
					<h5  class = "text-danger" 
					ng-show ="venueform.num_rooms.$touched && venueform.num_rooms.$error.required" > 
						Required  </h5>
					<input ng-mouseover = "hint.selectHint(1)" min=1  ng-model = "rooms" 
					type="number" name="num_rooms" id="num_rooms" class="form-control" 
					value="" required title="">
					
					<label >  Number of desks </label>
					<h5  class = "text-danger" 
					ng-show ="venueform.num_desk.$touched && venueform.num_desk.$error.required" > 
						Required  </h5>
					<input ng-mouseover = "hint.selectHint(1)" min=1  ng-model = "desks" 
					type="number" name="num_desk" id="num_desk" class="form-control" 
					value="" required title="">
					</div>
				</form>
			<form name="addressform"> 
				<div class = "address-panel" ng-show="data.isSelected(2)">
					<label  for="addr" >Address</label> 
					<h5  class = "text-danger" 
					ng-show ="addressform.addr.$touched && addressform.addr.$error.required" > 
						Required  </h5>
					<input  ng-model = "addr" type="text" name="addr" id="addr" class="form-control" value="" required >
					
					<label for="neighbourhood" >Neighbourhood</label>
					<h5  class = "text-danger" 
					ng-show ="addressform.neighbourhood.$touched && addressform.neighbourhood.$error.required" > 
						Required  </h5>
					<input  ng-model = "neighbours" type="text" name="neighbourhood" id="neighbourhood" class="form-control" value="" required >
					
					<label for="number" >Telephone number</label>
					<h5  class = "text-danger" 
					ng-show ="addressform.telephone.$touched && addressform.telephone.$error.required" > 
						Required  </h5>
					<input ng-model = "tel" type="tel" name="telephone" id="number" class="form-control" value="" required title="">
					
					<label for="email" >General email</label>
					<h5  class = "text-danger" 
					ng-show ="addressform.email.$error.email && addressform.email.$error.required" > 
						Required  </h5>
					<input  ng-model = "email" type="email" name="email" id="email" class="form-control" required value=""  title="">
					
					<label for="website" >Website</label> 
					<input ng-model = "url" type="url" name="" id="website" class="form-control" value=""  title=""> 
				</div>
</form>

				<div class = "spacetype-panel" ng-show="data.isSelected(3)">
					<form name="workspaceform">
					<label for="name">Space type</label>	
					<h5  class = "text-danger" 
					ng-show ="workspaceform.spacetype.$touched && workspaceform.spacetype.$error.required" > 
						Required  </h5>
					<select ng-model = "spacetype"  name="spacetype" id="input" class="form-control" required>
						<option value="1">Flat</option>
						<option value="2">Garden Office</option>
						<option value="3">Boat</option>
						<option value="4">Classroom</option>
						<option value="5">Garage</option>
						<option value="6">Office</option>
						<option value="7">Outside Space</option>
						<option value="8">Therapy Room</option>
						<option value="9">Meeting Room</option>
						<option value="10">Other</option>
					</select>
					<label  for="name">Space name</label>
					<h5  class = "text-danger" 
					ng-show ="workspaceform.spacename.$touched && workspaceform.spacename.$error.required" > 
						Required  </h5>						
					<input type="text" ng-model = "spacename" name="spacename" id="name" 
					class="form-control" value="" required  title="">

					<label  for="name">Number of similar spaces</label>		
					<h5  class = "text-danger" 
					ng-show ="workspaceform.no_similar_space.$touched && workspaceform.no_similar_space.$error.required" > 
						Required  </h5>										
					<input  type="number" name="no_similar_space" id="input" class="form-control" 
					ng-model = "no_similar_space" value="" min=1 required title="">

					<label for="name">Description</label>						
					<h5  class = "text-danger" 
					ng-show ="workspaceform.spacedesc.$touched && workspaceform.spacedesc.$error.required" > 
						Required  </h5>			
					<textarea name="spacedesc" id="input" class="form-control" rows="3" required="required" 
					ng-model = "spacedesc"></textarea> 
					</form>
				</div>
					
				<div class = "pricing-panel" ng-show="data.isSelected(6)">

					<form name="pricingform"> 
					<label for="name">Per hour</label>	
					<h5  class = "text-danger" 
					ng-show ="pricingform.pricePerHour.$touched && pricingform.pricePerHour.$error.required" > 
						Required  </h5>			
					<div class="input-group" >
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input type="number"   name="pricePerHour" 
						id="perhour" class="form-control"  ng-model = "pricePerHour" value="" min=1 required title="">
					</div>
					
					<label for="name" >Per Week</label>	
					<h5  class = "text-danger" 
					ng-show ="pricingform.pricePerWeek.$touched && pricingform.pricePerWeek.$error.required" > 
						Required  </h5>			
					<div class="input-group" >
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input  type="number" name="pricePerWeek" id="perweek" ng-model = "pricePerWeek"
						 class="form-control" value="" min=1 required title="">
					</div>
					
					<label for="name" >Per month</label>	
					<h5  class = "text-danger" 
					ng-show ="pricingform.pricePerMonth.$touched && pricingform.pricePerMonth.$error.required" > 
						Required  </h5>
					<div  class="input-group">
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    					<input type="number" min=0 ng-model = "pricePerMonth" name="pricePerMonth" 
    					id="permonth" class="form-control" value="" min=1  
    					required title="">
    				</div>
    				</form> 
				</div>


			<form  ng-show="data.isSelected(4)" method="post" name="multiple_upload_form" 
			id="multiple_upload_form_id" enctype="multipart/form-data" action="upload.php">

			    <input type="hidden" name="image_form_submit" value="1"/>
			    <label class="fileContainer">Choose Image
			    <input ng-model = "file" type="file" name="images[]" id="images" multiple accept=".jpg,.jpeg" 
			    required> {{file}}

			    </label>

			    <div class="uploading none">
			        <label>&nbsp;</label>
			    </div>

			    <div id="images_preview" >

			    	<?php if($_SERVER['HTTP_REFERER']=="http://localhost:1234/profile/user_profile.php"){ 
			    		$index = 1;
			    		
			    		while($index<11){
			    			${"image_".$index}=$data['image_'.$index];
			    			if(${"image_".$index}!=""){
			    		?>

			    		<div id = "<?php echo $index ?>"
			    	 style="position:relative; max-width: 250px; margin-top:5%; margin-right:5%; display:inline-flex">
			    		<img id =  "'img_'<?php echo $index; ?>" src="<?php echo ${"image_".$index} ?>" 
			    		class="img-rounded img-responsive" alt="Image" style="max-height:150px;cursor:pointer;">
                <a class="btn" data-toggle="modal" href="#" data-target="#delete<?php echo $index ?>"> 
                    <span class ="glyphicon glyphicon-trash" aria-hidden="true" ></span></a>           
                <input type="text" name="" id="inputhidden<?php echo $index ?>" class="form-control" value="<?php echo ${"image_".$index}; ?>" ng-model="photoname<?php echo $index ?>" style="display:none">
                

        </div>

        <div class="modal fade" id="delete<?php echo $index; ?>" style="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Delete Photo</h4>
                    </div>
                    <div class="modal-body">
                        <p> Are you sure you wish to delete this photo? It's a nice one! <p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id = "deleteimage" onclick="deleteDiv(<?php echo $index; ?>)">Delete</button>
                        <input type="hidden" name="" id="index_id<?php echo $index; ?>" class="form-control" value="<?php echo $index; ?>">

                    </div>
                </div>
            </div>
        </div>
			  <?php  	}$index++; }}

			  

			  ?>

			    </div>
			</form>
			
			<div class="form-group" ng-show="data.isSelected(7)">
				<form name="calendarform" > 
				<label for="fromtime" class="col-sm-4 control-label">From Time</label>
					<h5  class = "text-danger" 
					ng-show ="calendarform.fromtime.$touched && calendarform.fromtime.$error.required" > 
						Required  </h5>
				
				<div class="col-sm-8" style="margin-bottom:10px">
					<input required ng-model="fromtime" type="text" name = "fromtime" id="fromtime" class="form-control" placeholder="Earliest Check in time">
				</div>

				<label for="totime" class="col-sm-4 control-label">To Time</label>
					<h5  class = "text-danger" 
					ng-show ="calendarform.totime.$touched && calendarform.totime.$error.required" > 
						Required  </h5>
				
				<div class="col-sm-8" style="margin-bottom:10px">
					<input type="text" required name=" totime" id="totime" 
					class="form-control" placeholder=" Latest Check out time" ng-model="totime">
				</div>

				<label for="availabledays" class="col-sm-4 control-label">Available days per week</label>
					<h5  class = "text-danger" 
					ng-show ="calendarform.availabledays.$touched && calendarform.availabledays.$error.required" > 
						Required  </h5>
				
				<div class="col-sm-8" style="margin-bottom:10px">
					<input type="number"  min=1 id="availabledays" 
					name ="availabledays" class="form-control" ng-model="availabledays" placeholder="Available days" required>
				</div>
			</form>
				
			</div>


			<div class="form-group" ng-show="data.isSelected(5)" style="display:inline">
				<div class="checkbox">
					<label>
						<input type="checkbox"  value="1" ng-model="essentials"  ng-true-value="'YES'" ng-false-value="'NO'">
						Essentials
					</label>
				</div>
				<div class="checkbox" >
					<label>
						<input type="checkbox" value="2" ng-model="internet"  ng-true-value="'YES'" ng-false-value="'NO'">
						Internet
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="3" ng-model="wireless"  ng-true-value="'YES'" ng-false-value="'NO'">
						Wireless Internet
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="4" ng-model="parking"  ng-true-value="'YES'" ng-false-value="'NO'">
						Free Parking
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="5" ng-model="elevator"  ng-true-value="'YES'" ng-false-value="'NO'">
						Elevator in Building
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="6" ng-model="buzzer"  ng-true-value="'YES'" ng-false-value="'NO'">

						Buzzer/wireless telecomm
						
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" value="7" ng-model="doorman"  ng-true-value="'YES'" ng-false-value="'NO'">
						Doorman
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" value="8" ng-model="kitchen"  ng-true-value="'YES'" ng-false-value="'NO'">
						Kitchen
					</label>
				</div>
				
			</div>



<button type="button" class="btn btn-default pull-right" 
ng-show="data.isSelected(1)"ng-click="venueform.$valid && insertData(1);venueform.$valid && data.selectTab(2)">
Next</button>
<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(2)"
ng-click="addressform.$valid && insertData(2); addressform.$valid && data.selectTab(3)">Next</button>
<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(3)"
ng-click="workspaceform.$valid&&insertData(3);workspaceform.$valid&&data.selectTab(4)">Next</button>
<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(4)"
ng-click="data.selectTab(5)">Next</button>
<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(5)"
ng-click="insertData(5);data.selectTab(6)">Next</button>
<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(6)"
ng-click="pricingform.$valid&&insertData(6);pricingform.$valid&&data.selectTab(7)">Next</button>
<!-- <button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(7)"ng-click="insertData(7);data.selectTab(8)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="data.isSelected(8)"ng-click="insertData(8)">Next</button> -->
    				


				</div>
			</div>
		</div>













		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			

			
				
			<br><br><br><br><br><br>
			<div class="panel panel-default" ng-show="hint.isHint(1)">
				<div class="panel-body hint" >
					Help travelers imagine themselves in your listing by accurately describing all the areas in your space that they’ll be able to use.
				
				</div>
			</div>	
			


			
			<br><br><br><br><br><br><br><br>
			<div class="panel panel-default" ng-show="hint.isHint(2)">
				<div class="panel-body">	
					<p >text1</p>
			
				</div>
			</div>	
			
			
			
		</div>

	</div>
</div>







	
    	<style type="text/css">
    	.panel-heading{
    		height: 100px;
    	}
    	</style>
    	<script src="../../dashboard/js/jquery.form.js"></script>

<script type="text/javascript">

function deleteDiv(num){
	var index_id = 'index_id'+num;
	document.getElementById(document.getElementById(index_id).value).remove();

};


$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form_id').ajaxForm({
            //display the uploaded images
            target:document.getElementById('images_preview'),
            
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(response){
                
                

            },
            error:function(e){
            }
        }).submit();
    });
})

</script>

</body>
</html>
<?php } ?>