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
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">		
		<link href="../../dashboard/css/style_v1.css" rel="stylesheet">
		<link href="../../custom-div.css" rel="stylesheet">
		
		
				
		
		<!-- Bootstrap JavaScript -->
<script src="../../dashboard/js/jquery.js"></script>
<script src="../../dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src = "../../Angular/js/angular.min.js"></script>
<script src="app.js"></script>		
    


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
  						<li style="display:none;"role="presentation" ng-class = "{current:panel.isSelected(8)}"><a href ng-click="panel.selectTab(8)" style="color:#808080">Reservation <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>

					</ul>

				</div>
				<div class="jumbotron " style="padding:20px"> Complete <i class="lead"><strong> 6 steps</strong></i> &nbsp for hosting your space
				</div>
			</div>
		</div>

		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" ng-controller= "dataController">
			
			<p style="display:none"> {{descr= '<?php echo $data["venue_desc"]; ?>'}}
			{{type= '<?php echo $data["event_type"]; ?>'}} 
			{{floors= <?php echo $data["no_of_floors"]; ?>}}
			{{area= <?php echo $data["floor_area"]; ?>}}
			{{rooms= <?php echo $data["no_of_rooms"]; ?>}}
			{{desks= <?php echo $data["no_of_desks"]; ?>}}
			{{neighbours= '<?php echo $data["neighbourhood"]; ?>'}}
			{{tel= '<?php echo $data["telephone"]; ?>'}}
			{{email= '<?php echo $data["email"]; ?>'}}
			{{url= '<?php echo $data["website"]; ?>'}}
			{{addr= '<?php echo $data["addr"]; ?>'}}
			{{spacetype= '<?php echo $data["type"]; ?>'}}
			{{spacename= '<?php echo $data["space_name"]; ?>'}}
			{{no_similar_space= '<?php echo $data["similar_workspace"]; ?>'}}
			{{spacedesc= '<?php echo $data["space_desc"]; ?>'}}
			{{essentials = '<?php echo $data["essentials"]; ?>'}}
			{{internet = '<?php echo $data["essentials"]; ?>'}}
			{{wireless = '<?php echo $data["internet"]; ?>'}}
			{{parking = '<?php echo $data["parking"]; ?>'}}
			{{elevator = '<?php echo $data["elevator"]; ?>'}}
			{{buzzer = '<?php echo $data["buzzer"]; ?>'}}
			{{doorman = '<?php echo $data["doorman"]; ?>'}}
			{{kitchen = '<?php echo $data["kitchen"]; ?>'}}
			{{pricePerHour = '<?php echo $data["hourly_price"]; ?>'}}
			{{pricePerWeek = '<?php echo $data["weekly_price"]; ?>'}}
			{{pricePerMonth = '<?php echo $data["monthly_price"]; ?>'}}
			</p>
			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(1)"> Give details about your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(2)"> Set your listing location </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(3)"> Spaces are physical areas that can be booked in your venue </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(6)"> Set a Price for your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header"ng-show="panel.isSelected(4)"> Add Unique Photos of your space </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(5)"> Every space on Instarent is unique. Highlight what makes your listing welcoming so that it stands out to our users.</h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(7)">  </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(8)">  </h3>
				</div>
				<div class="panel-body" >	
					<div class = "description-panel" ng-show="panel.isSelected(1)">
					<label> Description </label>
					<textarea ng-mouseover = "hint.selectHint(1)" 
					 ng-model = "descr" name="description" id="input" 
					 class="form-control" rows="4" required="required" ></textarea>
					<label > Venue type</label>
					<select ng-mouseover = "hint.selectHint(2)" 
					ng-model = "type" name="type" id="type" class="form-control" required="required">
						<option value="1">Business Centre</option>
						<option value="2">Corporate Office</option>
						<option value="3">Coworking Office</option>
						<option value="4">Hotel</option>
						<option value="5">Startup Office</option>
						<option value="6">Studio</option>
					</select>
					<!-- Declaring Scope -->
					
					

					<label > Number of floors </label>
					<input ng-mouseover = "hint.selectHint(1)" min=1 max= 100 ng-model = "floors" 
					type="number" name="num_floors" id="num_floors" class="form-control" 
					value="" min="{5"} max="" step="" required title="">
					<label > Floor Area </label>
					<input ng-mouseover = "hint.selectHint(1)"ng-model = "area" 
					min=1 type="number" name="floor_area" id="floor_area" class="form-control" 
					value="" min="{5"} max="" step="" title="">
					<label > Number of rooms </label>
					<input ng-mouseover = "hint.selectHint(1)" min=1  ng-model = "rooms" 
					type="number" name="num_rooms" id="num_rooms" class="form-control" 
					value="" min="{5"} max="" step="" required="required" title="">
					<label >  Number of desks </label>
					<input ng-mouseover = "hint.selectHint(1)" min=1  ng-model = "desks" 
					type="number" name="num_desk" id="num_desk" class="form-control" 
					value="" min="{5"} max="" step="" required="required" title="">
					</div>

				<div class = "address-panel" ng-show="panel.isSelected(2)">
					<label  for="addr" >Address</label> 
					<input  ng-model = "addr" type="text" name="" id="addr" class="form-control" value="" required="required" >
					
					<label for="neighbourhood" >Neighbourhood</label>
					<input  ng-model = "neighbours" type="text" name="neighbourhood" id="neighbourhood" class="form-control" value="" required="required" >
					
					<label for="number" >Telephone number</label>
					<input ng-model = "tel" type="tel" name="" id="number" class="form-control" value="" required="required" title="">
					
					<label for="email" >General email</label>
					<input  ng-model = "email" type="email" name="email" id="email" class="form-control" value=""  title="">
					
					<label for="website" >Website</label> 
					<input ng-model = "url" type="url" name="" id="website" class="form-control" value=""  title=""> 
				</div>


				<div class = "spacetype-panel" ng-show="panel.isSelected(3)">
					<label for="name">Space type</label>	
					<select ng-model = "spacetype"  name="" id="input" class="form-control" required="required">

						<option value="0">Please Select </option>
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
					<input type="text" ng-model = "spacename" name="space_name" id="name" class="form-control" value="" required="required"  title="">

					<label  for="name">Number of similar spaces</label>						
					<input  type="number" name="no_similar_space" id="input" class="form-control" 
					ng-model = "no_similar_space" value="" min="{5"} max="" step="" required="required" title="">

					<label for="name">Description</label>						
					<textarea name="" id="input" class="form-control" rows="3" required="required" 
					ng-model = "spacedesc"></textarea> 
				</div>
					
				<div class = "pricing-panel" ng-show="panel.isSelected(6)">
					<label for="name">Per hour</label>	
					<div class="input-group" >
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input ng-model = "pricePerHour" min=0 type="number" name="" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
					</div>
					
					<label for="name" >Per Week</label>	
					<div class="input-group" >
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    				
						<input  type="number" name="" id="input" ng-model = "pricePerWeek" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
					</div>
					
					<label for="name" >Per month</label>	
					<div  class="input-group">
    					<span class="input-group-addon">
        					<i>INR</i>
    					</span>
    					<input type="number" min=0 ng-model = "pricePerMonth" name="" id="input" class="form-control" value="" min="{5"} max="" step="" required="required" title="">
    				</div> 
				</div>


			<form  ng-show="panel.isSelected(4)" method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
			    <input type="hidden" name="image_form_submit" value="1"/>
			    <label class="fileContainer">Choose Image
			    <input type="file" name="images[]" id="images" multiple accept=".jpg,.jpeg">

			    </label>
			    <div class="uploading none">
			        <label>&nbsp;</label>
			    </div>
			    <div id="images_preview">
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
			  <?php  	}$index++; }}?>

			    </div>
			</form>
			
			<div class="form-group" ng-show="panel.isSelected(7)">
				<label for="fromtime" class="col-sm-4 control-label">From Time</label>
				<div class="col-sm-8" style="margin-bottom:10px">
					<input type="text" id="fromtime" class="form-control" placeholder="From Time">
				</div>

				<label for="totime" class="col-sm-4 control-label">To Time</label>
				<div class="col-sm-8" style="margin-bottom:10px">
					<input type="text" id="totime" class="form-control" placeholder="To Time">
				</div >

				<label for="availabledays" class="col-sm-4 control-label">Available days per week</label>
				<div class="col-sm-8" style="margin-bottom:10px">
					<input type="text" id="availabledays" class="form-control" placeholder="Available days">
				</div>

				
			</div>


			<div class="form-group" ng-show="panel.isSelected(5)" style="display:inline">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" ng-model="essentials"  ng-true-value="'YES'" ng-false-value="'NO'">
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



    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(1)"ng-click="insertData(1);panel.selectTab(2)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(2)"ng-click="insertData(2);panel.selectTab(3)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(3)"ng-click="insertData(3);panel.selectTab(4)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(4)"ng-click="panel.selectTab(5)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(5)"ng-click="insertData(5);panel.selectTab(6)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(6)"ng-click="insertData(6);panel.selectTab(7)">Next</button>
    				<!-- <button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(7)"ng-click="insertData(7);panel.selectTab(8)">Next</button>
    				<button type="button" class="btn btn-default pull-right" ng-show="panel.isSelected(8)"ng-click="insertData(8)">Next</button> -->
    				


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
        $('#multiple_upload_form').ajaxForm({
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