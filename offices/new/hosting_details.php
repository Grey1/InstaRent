<?php
session_start();

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
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">		
		<link href="../../dashboard/css/style_v1.css" rel="stylesheet">
		<link href="../../custom-div.css" rel="stylesheet">
		<script src="../../dashboard/js/devoops.js"></script>
		<script src="../../dashboard/js/jquery.js"></script>

		<script src="../../dashboard/plugins/jquery/jquery.min.js"></script>
		<script src="../../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		
		<script src = "../../Angular/js/angular.min.js"></script>
		<script src = "../../dashboard/js/ui-bootstrap.min.js"></script>
		
		
    	<script src="map.js"></script>

		

		<!-- Bootstrap JavaScript -->
		
		


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		<style>
  .typeahead-demo .custom-popup-wrapper {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    background-color: #f9f9f9;
  }

  .typeahead-demo .custom-popup-wrapper > .message {
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
    color: #868686;
  }

  .typeahead-demo .custom-popup-wrapper > .dropdown-menu {
    position: static;
    float: none;
    display: block;
    min-width: 160px;
    background-color: transparent;
    border: none;
    border-radius: 0;
    box-shadow: none;
  }
</style>


	</head>

	<body>
		

<div class="container-fluid">	
 <div class="row" style="vertical-align:0">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<a href="../../member/member_home.php">InstaRent</a>
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

<!-- Space type -->
<h3>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p class="text-center" style="padding:50px">List Your Space</p></h3>
	</div>
</div>

<form action="insert.php" method="POST" role="form">
	

<div class="form-group">
	
<div class="well">
<div class='container-fluid' ng-controller="TypeaheadCtrl">

<br> <br>
<!--First Row -->

<div class="row " ng-controller="dataController as data">
<div   class="col-lg-3" >
<label>Venue Name</label>
</div>  
<div style="display:inline	;">
<p ng-model="data.WordLength" >
	<mark> {{35-data.WordLength}} </mark>	
	characters left</p>
</div>
<div class = col-lg-5>
<input type="text" name="venue" id="inputVenue" class="form-control" value=""  placeholder="Be clear and descriptive." ng-model="data.Text"  
	ng-change="data.UpdateWordLength()" ng-trim="false" maxlength=35 required>
</div>
	</div>


<br><br>


<div class="row">	
<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
	<label> Location </label>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			    
				    <pre style="display:none">Model: {{asyncSelected | json}}</pre>
				    <input type="text" ng-model="asyncSelected" name = "location" placeholder="Location " 
				    uib-typeahead="address for address in getLocation($viewValue)" 
				    typeahead-loading="loadingLocations" typeahead-no-results="noResults" class="form-control">
				    <i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>
				    <div ng-show="noResults">
				      <i class="glyphicon glyphicon-remove"></i> No Results Found
				    </div>
			</div>

		</div>
	</div>
</div>
<br><br>

<button type="submit" name="submit" id = "submit" class="btn btn-primary">
    Continue
  </button>

</div>
</div> 
</div>
</form>
</body>
</html>
