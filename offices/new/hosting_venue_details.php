

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
		
		
				
		
		<!-- Bootstrap JavaScript -->
		<script src="../../dashboard/js/devoops.js"></script>
		<script src="../../dashboard/plugins/jquery/jquery.min.js"></script>
		<script src="../../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		
		<script src="../../dashboard/plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
		
		
		<script src = "../../Angular/js/angular.min.js"></script>
    	<script src="app.js"></script>
    
	
    	<style type="text/css">
    	.panel-heading{
    		height: 100px;
    	}
    	</style>
    	<script src="../../dashboard/js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            target:'#images_preview',
            
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});
</script>


	</head>
<body >

<!-- Header -->
<?php

include("../../header/headerafterlogin.html");

?>
<!-- Header -->


<div class="well" ng-controller="HintController as hint">
	<div class="row" ng-controller="PanelController as panel">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body" id ="top-menu">
				   
					<ul class="nav nav-pills nav-stacked">
						<p claas="pull-right" style="color:#C0C0C0" > Listing </p>
  						<li role="presentation" ng-class = "{current:panel.isSelected(1)}"><a href ng-click="panel.selectTab(1)" style="color:#808080" >Venue description <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(2)}" ><a href ng-click="panel.selectTab(2)"style="color:#808080">Location <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(3)}" ><a href ng-click="panel.selectTab(3)" style="color:#808080">Workspaces <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						
  						<li role="presentation" ng-class = "{current:panel.isSelected(4)}"><a href ng-click="panel.selectTab(4)" style="color:#808080">Photos <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(5)}" ><a href ng-click="panel.selectTab(5)" style="color:#808080">Amenities  </a></li>
  						 <p claas="pull-right" style="color:#C0C0C0" > Hosting </p>
  						<li role="presentation" ng-class = "{current:panel.isSelected(6)}" ><a href ng-click="panel.selectTab(6)" style="color:#808080">Pricing <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(7)}" ><a href ng-click="panel.selectTab(7)" style="color:#808080">Calendar <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(8)}"><a href ng-click="panel.selectTab(8)" style="color:#808080">Reservation <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>

					</ul>

				</div>
				<div class="jumbotron " style="padding:20px"> Complete <i class="lead"><strong> 7 steps</strong></i> &nbsp for hosting your space
				</div>
			</div>
		</div>

		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" ng-controller= "dataController">
			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(1)"> Give details about your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(2)"> Set your listing location </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(3)"> Spaces are physical areas that can be booked in your venue </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(6)"> Set a Price for your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header"ng-show="panel.isSelected(4)">  </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(5)"> </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(7)">  </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(8)">  </h3>
				</div>
				<div class="panel-body" >	
					<div class = "description-panel" ng-show="panel.isSelected(1)">
					<label> Description </label>
					<textarea ng-mouseover = "hint.selectHint(1)"  ng-model = "descr" name="description" id="input" class="form-control" rows="4" required="required" ></textarea><br>
					<label > Venue type</label>
					<select ng-mouseover = "hint.selectHint(2)" ng-model = "type" name="" id="type" class="form-control" required="required">
						<option value="1">Business Centre</option>
						<option value="2">Corporate Office</option>
						<option value="3">Coworking Office</option>
						<option value="4">Hotel</option>
						<option value="5">Startup Office</option>
						<option value="6">Studio</option>
					</select><br>
					
					<label > Number of floors </label>
					<input ng-mouseover = "hint.selectHint(1)" ng-model = "floors" type="number" name="num_floors" id="num_floors" class="form-control" value="" min="{5"} max="" step="" required title=""><br >
					<label > Floor Area </label>
					<input ng-mouseover = "hint.selectHint(1)"ng-model = "area" type="number" name="floor_area" id="floor_area" class="form-control" value="" min="{5"} max="" step="" title=""><br >
					<label > Number of rooms </label>
					<input ng-mouseover = "hint.selectHint(1)"ng-model = "rooms" type="number" name="num_rooms" id="num_rooms" class="form-control" value="" min="{5"} max="" step="" required="required" title=""><br >
					<label >  Number of desks </label>
					<input ng-mouseover = "hint.selectHint(1)"ng-model = "desks" type="number" name="num_desk" id="num_desk" class="form-control" value="" min="{5"} max="" step="" required="required" title=""><br >
					</div>
					<label ng-show="panel.isSelected(2)" for="addr" >Address</label> 
					<input ng-show="panel.isSelected(2)" ng-model = "addr" type="text" name="" id="addr" class="form-control" value="" required="required" >
					<br ng-show="panel.isSelected(2)">
					<label ng-show="panel.isSelected(2)"for="neighbourhood" >Neighbourhood</label>
					<input ng-show="panel.isSelected(2)" ng-model = "neighbours" type="text" name="neighbourhood" id="neighbourhood" class="form-control" value="" required="required" >
					<br ng-show="panel.isSelected(2)">
					<label for="number" ng-show="panel.isSelected(2)">Telephone number</label>
					<input ng-model = "tel" type="tel" name="" id="number" ng-show="panel.isSelected(2)"class="form-control" value="" required="required" title="">
					<br ng-show="panel.isSelected(2)">
					<label for="email" ng-show="panel.isSelected(2)">General email</label>
					<input ng-show="panel.isSelected(2)" ng-model = "email" type="email" name="email" id="email" class="form-control" value=""  title="">
					<br ng-show="panel.isSelected(2)">
					<label for="website"ng-show="panel.isSelected(2)" >Website</label> <br ng-show="panel.isSelected(2)">
					<input ng-show="panel.isSelected(2)"ng-model = "url" type="url" name="" id="website" class="form-control" value=""  title=""> <br ng-show="panel.isSelected(2)">
					<label ng-show="panel.isSelected(3)"for="name">Space type</label>	
					<select ng-model = "spacetype" ng-show="panel.isSelected(3)" name="" id="input" class="form-control" required="required">
						<option value=""></option>
					</select>
					<label ng-show="panel.isSelected(3)" for="name">Space name</label>						
					<input ng-show="panel.isSelected(3)"type="text" ng-model = "spacename" name="space_name" id="name" class="form-control" value="" required="required"  title="">

					<label ng-show="panel.isSelected(3)" for="name">Number of similar spaces</label>						
					<input ng-show="panel.isSelected(3)" type="number" name="no_similar_space" id="input" class="form-control" ng-model = "numberofspace" value="" min="{5"} max="" step="" required="required" title="">

					<label ng-show="panel.isSelected(3)"for="name">Description</label>						
					<textarea ng-show="panel.isSelected(3)"name="" id="input" class="form-control" rows="3" required="required" ng-model = "spacedesc"></textarea> <br ng-show="panel.isSelected(3)">
					<label ng-show="panel.isSelected(6)"for="name">Per hour</label>	
					<div class="input-group" ng-show="panel.isSelected(6)">
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input ng-model = "pricePerHour" type="number" name="" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
					</div>
					<br ng-show="panel.isSelected(6)">
					<label for="name" ng-show="panel.isSelected(6)">Per Week</label>	
					<div class="input-group" ng-show="panel.isSelected(6)">
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input ng-show="panel.isSelected(6)" type="number" name="" id="input" ng-model = "pricePerWeek" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
					</div>
					<br ng-show="panel.isSelected(6)">
					<label for="name" ng-show="panel.isSelected(6)">Per month</label>	
					<div ng-show="panel.isSelected(6)" class="input-group">
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    					<input type="number" ng-model = "pricePerMonth" name="" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
    				</div> <br>
					
					<form  ng-show="panel.isSelected(4)" method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
					    <input type="hidden" name="image_form_submit" value="1"/>
					    <label>Choose Image</label>
					    <input type="file" name="images[]" id="images" multiple >
					    <div class="uploading none">
					        <label>&nbsp;</label>
					        <img src="uploading.gif" alt="uploading......"/>
					    </div>
					    <div id="images_preview"></div>
					</form>
					
					<div class="form-group">
						<label for="time_example" class="col-sm-4 control-label">Time</label>
						<div class="col-sm-8">
							<input type="text" id="time_example" class="form-control" placeholder="Time">
						</div>
					</div>



    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(1)"ng-click="insertData(1);panel.selectTab(2)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(2)"ng-click="insertData(2);panel.selectTab(3)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(3)"ng-click="insertData(3);panel.selectTab(4)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(4)"ng-click="insertData(4);panel.selectTab(5)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(5)"ng-click="insertData(5);panel.selectTab(6)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(6)"ng-click="insertData(6);panel.selectTab(7)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(7)"ng-click="insertData(7);panel.selectTab(8)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(8)"ng-click="insertData(8)">Next</button>
    				


				</div>
			</div>
		</div>













		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			

			
			<br><br><br><br><br><br>	
			
			<div class="panel panel-default" ng-show="hint.isHint(1)">
				<div class="panel-body hint">	
					Help travelers imagine themselves in your listing by accurately describing all the areas in your space that they’ll be able to use.
			
				</div>
			</div>	
			


			
			<br><br><br><br><br><br><br>	
			<div class="panel panel-default" ng-show="hint.isHint(2)">
				<div class="panel-body">	
					<p >text1</p>
			
				</div>
			</div>	
			
			
			
		</div>

	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	// Load TimePicker plugin and callback all time and date pickers
	LoadTimePickerScript(AllTimePickers);
	
	
});
</script>


</body>
</html>