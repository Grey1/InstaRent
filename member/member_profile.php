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
user.email,user.first_name,user.surname,user_details.gender,
user_details.birth_date,user_details.contact,
user_details.company_name,user_details.address1,
user_details.address2,user_details.pincode,user_details.city
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
}





?>




<!-- breadcrumb starts -->
		<div class="row">
				<div id="breadcrumb" class="col-xs-12">
					<a href="#" class="show-sidebar">
						<i class="fa fa-bars"></i>
					</a>
					<ol class="breadcrumb pull-left">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li>
							<a href="#">Profile</a>
						</li>
						<li class="active-link">Edit Profile</li>
					</ol>
				</div>
			</div>
			



				<div class="panel panel-default" style="margin-left:4px" ng-app="instarent">
					  <div class="panel-heading">
							<h3 class="panel-title">Required</h3>
					  </div>
			
			
					  <div class="panel-body" ng-controller="dataController">
			
					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">First name</label>		
					  		</div>
					  	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					  		<input type="text" name="fname" id="input" class="form-control " 
					  		value=<?php echo $first_name ;?> required="required" pattern="" title="" ng-model='fname'>
					  	</div>
					  		
					  	</div>

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">Surname</label>		
					  		</div>
					  	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					  		<input type="text" name="surname" id="input" class="form-control " 
					  		ng-model='sname' value=<?php echo $surname ;?> required="required" pattern="" title="">
					  	</div>
					  		
					  	</div>

					  	<!-- Gender -->

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">I am</label>		
					  		</div>
					  	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  		<select name="gender" id="input" class="form-control" required="required" ng-model='gender'>
					  			<option value="1" >Gender </option>
					  			<option value="2" <?php if($gender==2) echo  'selected="selected"';?> >Male </option>
					  			<option value="3" <?php if($gender==3) echo  'selected="selected"';?>>Female</option>
					  			<option value="4" <?php  if($gender==4) echo'selected="selected"';?>>Other</option>
					  		</select>
					  	</div>
					  		
					  	</div>

					  	<!-- Birth Date -->

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">Birth date</label>		
					  		</div>
					  	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
					  		<input type="date" name="date" id="inputDate" ng-model='bday' class="form-control" 
					  		value=<?php echo $birth_date ;?> required="required" title="">
					  	</div>

					  	</div>

					  	<!-- Email Address -->

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">Email</label>		
					  		</div>
					  	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
					  		<input type="text" name="" id="input" class="form-control " value=<?php echo $email ;?> required="required" pattern="" title="" ng-model="email">
					  	</div>
					  		
					  	</div>

					  	<!-- phone number -->

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			
					  		<label for="input-id" class= "pull-right">Contact number</label>		
					  		</div>
					  	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					  		<input type="tel" name="telephone" id="input" class="form-control" ng-model='contact' 
					  		required="required" title="" value= <?php $contact!=0 ?$contact: ""; ?> >
					  	</div>
					  		
					  	</div>

					  	<div class="row row-form">
					  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					  			<label for="input-id" class= "pull-right"> Address</label>		
					  		</div>


					  	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">



					  		<div style="display:inline">
						  		<input type="text" name="company_name" required="required"  title="" placeholder="Company name" id="Company_name" ng-model='companyname'class="form-control" value=<?php echo $company_name ;?> >
						  		<input type="text" name="address1" required="required"  title="" placeholder="Building name" ng-model='addr1' id="address1" class="form-control" value=<?php echo $address1 ;?> >
						  		<input type="text" name="address2" required="required"  title="" placeholder="Street address" ng-model='addr2' id="address2" class="form-control" value=<?php echo $address2 ;?> >
						  		<input type="text" name="city" required="required"  title="" placeholder="City, State" id="city" ng-model='city'class="form-control" 
						  		value=<?php echo $city ;?> >
						  		<input type="text" name="pincode" ng-model='pincode' id="pincode" required="required" title="" placeholder="Pincode" class="form-control" 
						  		value=<?php $pincode!=0? $pincode: "" ;?> >
					  		</div>

					  				<a href="#" style="display:none"> <p><em>Edit</em></p> </a>
					  		
					  		</div>
					  	</div>
					  		
					  	</div>
					  	


					  	<button type="submit" class="btn btn-primary" ng-click="updateData()" style="margin-left:17%; margin-top:2%">Save</button>

					  	</div>

					  </div>
				
		
			</div>
				