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
		

<?php
  		include("../../header/headerafterlogin.html")
  	?>
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
