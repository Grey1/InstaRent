<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysql_connect($servername, $username,$password);

if (!$conn) 
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('instarent');

$sql = 'SELECT * FROM user_details INNER JOIN user on user.userid=user_details.user_id';

$retval = mysql_query( $sql, $conn);
if(!$retval)
{
  die('Could not get data:'.mysql_error());
}

?>


<!DOCTYPE html>
<html lang="" ng-app="AppController">
	<head>

    	<script src="../../dashboard/js/devoops.js"></script>
		<script src="../../dashboard/js/jquery.js"></script>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instarent</title>

		<!-- Bootstrap CSS -->
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
		
		
    	<script src="appadmin.js"></script>

    	


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->


<style type="text/css">
			.modal {
    top: 10%;
}
.modal-sm {
    width: 650px;
    height: 600px;
}
</style>


	</head>

	<body>

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



<div class="well" ng-controller="HintController as hint">
	<div class="row" ng-controller="dataController as panel">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body" id ="top-menu">
				   
  	<ul class="nav nav-pills nav-stacked">
						<p claas="pull-right" style="color:#C0C0C0" > Admin </p>
  						<li role="presentation" ng-class = "{current:panel.isSelected(1)}"><a href ng-click="panel.selectTab(1)" style="color:#808080" > Users <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(2)}" ><a href ng-click="panel.selectTab(2)" style="color:#808080"> Workspaces <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
  						<li role="presentation" ng-class = "{current:panel.isSelected(3)}"><a href ng-click="panel.selectTab(3)" style="color:#808080"> Verifications <p class="pull-right">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> </p> </a></li>
					</ul>

				</div>
				
			</div>
		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(1)"> User Details </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(2)"> Workspace Details </h3>
					<h3 class="panel-title lead text-center" style="padding:35px" ng-model="header" ng-show="panel.isSelected(3)"> Verifications </h3>
				</div>

				<div class="panel-body">	
					<div ng-show="panel.isSelected(1)"><!--1st panel -->
					<h4><label class="label label-primary"> User </label></h4>
						<table class="table table-hover">	
						<tr>
							<th>User ID</th>
							<th>Email</th>
							<th>First Name</th>
							<th>Surname</th>
							<th>Active</th>
							<th>User Detail ID</th>
							<th>City</th>
							<th>Pincode</th>
							<th>Edit</th>

						</tr>
							<?php
								while($row = mysql_fetch_assoc($retval))
{
    echo "<tr><td>{$row['userid']}</td>".
         "<td>{$row['email']}</td>".
         "<td>{$row['first_name']}</td>".
         "<td>{$row['surname']}</td>".
         "<td>{$row['active']}</td>".
         "<td>{$row['user_detail_id']}</td>".
		 "<td>{$row['city']}</td>".
		 "<td>{$row['pincode']}</td>".
		 "<td>"
		 ?>
		 
		 	<a href=<?php echo "../../profile/user_profile.php?userid=".$row['userid']; ?> > Edit </a>
  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
  

		 <?php
		 "</td>".
         "</tr>";
} 

?>			
						</table>					
					</div>
					
					<div class="panel-body">	
					<div ng-show="panel.isSelected(2)"><!--2nd panel -->
					<h4><label class="label label-primary"> Workspace </label></h4>
					<table class="table table-hover">	
						<tr>
							<th>Workspace ID</th>
							<th>Venue ID</th>
							<th>User ID</th>
							<th>Type</th>
							<th>Space Name</th>
							
							<th>Space desc</th>
						</tr>
							<?php
							$sql = 'SELECT * FROM workspace';

							$retval = mysql_query( $sql, $conn);
							if(!$retval)
								{
  									die('Could not get data:'.mysql_error());
								}

								while($row = mysql_fetch_assoc($retval))
								{
    echo "<tr><td>{$row['workspace_id']}</td>".
         "<td>{$row['venue_id']}</td>".
         "<td>{$row['user_id']}</td>".
         "<td>{$row['type']}</td>".
         "<td>{$row['space_name']}</td>".
         
		 "<td>{$row['space_desc']}</td>".
		 "</tr>";
								} 


?>
						</table>					
					</div>

				</div>

					<!--3-->
					<div class="panel-body">
					<div ng-show="panel.isSelected(3)"><!--3rd panel -->

						
						<h4><label class="label label-primary"> Verifications </label></h4>
					<table class="table table-hover">	
						<tr>
							<th>Workspace ID</th>
							<th>Image Path</th>
							<th>Verified</th>
							<th>Edit</th>
						</tr>
	<?php
							$sql1 = 'SELECT * FROM verification';

							$retval1 = mysql_query( $sql1, $conn);
							if(!$retval1)
								{
  									die('Could not get data:'.mysql_error());
								}
							while($row1 = mysql_fetch_assoc($retval1))
								{
?>

<tr><td><?php echo " {$row1['workspace_id']}" ?></td>
<td>
 
<button type='button' class='btn btn-primary' data-toggle="modal" data-target=<?php echo "#"."{$row1['workspace_id']}"?>> </button>

<div class='modal fade' id=<?php echo "{$row1['workspace_id']}"?> tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
  <div class='modal-dialog modal-sm'>
    <div class='modal-content'>
    	<div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
        <h4 class='modal-title' id='myModalLabel'>Image preview</h4>
        </div>
	<?php echo "<img src={$row1['img_path']} height=450 width=650> " ?>    
    </div>
  </div>
</div>
</td>

							<td> <?php echo "{$row1['verify']}" ?></td>
   							
   							<td>
   							<form action="admin_insert.php" method="POST" role="form">
<button type='submit' class='btn btn-default' aria-label='Left Align' onclick="demo()">
  <span class='glyphicon glyphicon-edit' aria-hidden='true'>
  <script type="text/javascript">
function demo()
{
alert("updated");
}
</script>
  <input type="text" name="txt1" value=<?php echo "{$row1['workspace_id']}" ?> hidden="true"/></span>
</button></form>
		 					</td>
         </tr>
         <?php 
								} 

mysql_close($conn);
?>
						</table>				
					</div>

				</div>

						
					<!-- 3 end-->
				</div>
				</div>
				</div>
				</div>
	</body>
</html>