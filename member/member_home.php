<?php
session_start();

if(!isset($_SESSION['currentuserid'])){
if(isset($_SERVER['HTTP_REFERER'])){
 	if($_SERVER['HTTP_REFERER'] != "http://localhost:1234/" ){
 		header("location:". $_SERVER['HTTP_REFERER']);
 	}
 }
}

?>
<!DOCTYPE html>
<html lang="" ng-app="instarent">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instarent</title>

		<!-- Bootstrap CSS -->
		
		<link href="custom-div.css" rel="stylesheet">
		<script src="../dashboard/js/devoops.js"></script>
		<script src="../dashboard/js/jquery.js"></script>
		<script src = "../Angular/js/angular.min.js"></script>
    	<script src="data.js"></script>
		<script src ="../dashboard/js/dirPagination.js"></script>
		<script src = "../dashboard/js/angular-animate.js"></script>
		<script src = "../dashboard/js/ui-bootstrap.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<link href="../dashboard/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="../dashboard/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">		
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="../dashboard/css/style_v1.css" rel="stylesheet">
		<link rel="stylesheet" href="../dashboard/css/jquery-ui.css">
	  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	  	<!-- Jquery date picket script -->

	  	<script>
		  $(function() {
			
		  	$("#from").datepicker({
		  		minDate:0,
		  		onSelect: function() {
            $("#to").datepicker(
                    "change",
                    { minDate: new Date($('#from').val()) }
            );
        }
    });
    $("#to").datepicker({
    	minDate:0,
        onSelect: function() {
            $("#from").datepicker(
                    "change",
                    { maxDate: new Date($('#to').val()) }
            );
        }
    });
	
  		});
		</script>
		
		


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		


	</head>

<body ng-controller="VenueController as venue">
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>

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
										<img src="<?php if (isset($_SESSION["userimag"])) echo "../profile/".$_SESSION["userimag"] ;else echo "";  ?>" class="img-circle" alt="avatar" />
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
										<a href="../logout.php">
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
 
<div id="image-content"   ng-show="venue.checkVal(1)" > 
</div> 	 

<div class="image-navbar" ng-show="venue.checkVal(1)">


	<form class="navbar-form pull-left">

	    <input type="text" ng-model='city' name = "location" placeholder="Location " 
	    uib-typeahead="address for address in getLocation($viewValue)" 
	    typeahead-loading="loadingLocations" typeahead-no-results="noResults" name="city" 
	    class="form-control form-field">
	    <i ng-show="loadingLocations" class="glyphicon glyphicon-refresh" ></i>
	    <div ng-show="noResults">
	      <i class="glyphicon glyphicon-remove"></i> No Results Found
	    </div>

		
		<select name="event_type" id="input" class="form-control form-field" required="required" 
		ng-model='event_type'>
		<option value="1">Business Centre</option>
			<option value="2">Corporate Office</option>
			<option value="3">Coworking Office</option>
			<option value="4">Hotel</option>
			<option value="5">Startup Office</option>
			<option value="6">Studio</option>
		</select>

		<button type="submit" id="search_1" class="btn btn-primary" style="height:44px;line-height:10px;margin-top:1px" ng-click="getVenues();venue.setVal(0)" >Search</button>


	</form>
</div>
	

<div class="container-fluid" ng-show="venue.checkVal(0)">



	
<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
<div class="row">
		<form class="navbar-form navbar-right">
			<ul class="nav nav-pills">
  <li role="presentation" ng-class="{active:reverse==true}"><a href="" ng-click="reverse=true">descending</a></li>
  <li role="presentation" ng-class="{active:reverse==false}"><a href="" ng-click="reverse=false">ascending</a></li>
</ul>
			<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="orderby" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Order By
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="orderby">
    <li><a href="" ng-click="setOrder('weekly_price')">Weekly Price</a></li>
    <li><a href="" ng-click="setOrder('hourly_price')">Hourly Price</a></li>
    <li><a href="" ng-click="setOrder('monthly_price')">Monthly Price</a></li>
  </ul>

	

</div>

		
		</form>
		</div>		
		<!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" dir-paginate="item in venues|filter:greaterThan|filter:spaceFilter|itemsPerPage:20"> -->
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" dir-paginate="item in venues|orderBy:order:reverse|filter:verified|
		filter:dateChecker|filter:greaterThan|filter:spaceFilter|itemsPerPage:20">


			<div ng-attr-name="main_photo_{{item.workspace_id}}">
			<a ng-attr-href ="../product_details/index.php?workspace_id={{item.workspace_id}}">
				<img style="max-width: 250px; max-height: 250px;"
				 class = "img-responsive img-rounded" ng-src="../offices/new/{{item.image_1}}" />
			</a>
			</div>
			
			<div id="pricing_item">
				  {{item.weekly_price|currency:"₹"}}
			</div>
			<div id="desc">
			<a  ng-attr-href ="../product_details/index.php?workspace_id={{item.workspace_id}}"> <p> {{item.name}} /{{item.space_name}}  </p></a>
			</div>
			<div id ="spacetype">
				<a ng-attr-href ="../product_details/index.php?workspace_id={{item.workspace_id}}"> <p> {{item.spacetype_value}} </p> </a>
			</div>

			<div id ="rating">
			</div>
			<div id = ""></div>

		</div>
		
	</div>

	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top:-1px;">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Filters</div>

				<div class="panel-body">
					<!-- Price range -->
					<span class="label label-default">Price Range By Weekly Price</span>
					<input type="number" ng-model = "minPrice" class="form-control"   pattern="" title="Minimum Price" ></td>
					<input type="number" ng-model = "maxPrice" class="form-control"   pattern="" title="Maximum Price" ></td>


					<!-- Date Range -->
					<span class="label label-default">Date range</span>
					<input type="text" class="form-control" id="from" name="from"/>
					<input type="text" class="form-control" id="to" name="to"/>
					
					<span class="label label-default">Space Type</span>

					<!-- Space Type -->
					
					<div class="checkboxGroup" >
					<div class="checkbox" >
						<label>
							<input type="checkbox" ng-click="includeSpace('1')">

							Flat
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('2')">
							Garden Office
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('3')">
							Boat
						</label>
						</div>
					</div>

				

					<div class="checkboxGroup">
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('4')" >
							Classroom
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('5')">
							Garage
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('6')">
							Office
						</label>
						</div>
					</div>
					<div class="checkboxGroup">
					<div class="checkbox"

						<label>
							<input type="checkbox" ng-click="includeSpace('7')">
							Outside Space
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox"ng-click="includeSpace('8')">
							Therapy Rooms
						</label>
						</div>
					<div class="checkbox">

						<label>
							<input type="checkbox"ng-click="includeSpace('9')">
							Meeting Rooms
						</label>
						</div>
					</div>
				<div class="checkboxGroup">
					<div class="checkbox">

						<label>
							<input type="checkbox" ng-click="includeSpace('10')">
							Others
						</label>
					</div>
				</div>


				</div>
		
				<!-- Table -->
				
		</div>
	</div>
</div>

<dir-pagination-controls
        max-size="10"
        direction-links="true"
        boundary-links="true" >
</dir-pagination-controls>

</div>
<div class="container" style="margin-bottom:10%;margin-top:10%" ng-show="venue.checkVal(1)">
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<p> To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.
		</p>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<img class = "img-responsive" src="img/9041440555_2175b32078_m.jpg" alt="image" style="postion:relative;height:50%;width:50%;">
	</div>
</div>
</div>

<div class="container" style="margin-bottom:10%" ng-show="venue.checkVal(1)">
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		
		<img class = "img-responsive" src="img/9041440555_2175b32078_m.jpg" alt="image" style="postion:relative;height:50%;width:50%;">

	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<p> To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.
		</p>
	</div>
</div>
</div>


<script type="text/javascript">

$(document).ready(function(){
	

var imageFile = ["../Creative-Office-Space.jpg", "../Creative-Office-Space4.jpg", "../Creative-Office-Space3.jpg"];
var currentIndex = 0;
setInterval(function () {
    if (currentIndex == imageFile.length) {
        currentIndex = 0;
    }
    $("#image-content").fadeOut(1500,function(){
    	$("#image-content").css('background-image', "url('"+imageFile[currentIndex++]+"')");
    	$('#image-content').fadeIn(1100);
    })
}, 2000);

});

</script>



</body>
</html>
