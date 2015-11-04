<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";


$workspaceid = $_GET['workspace_id'];

$conn = mysql_connect($servername,$username);
if(!$conn){
    die('Could not connect'.mysql_error());
}

mysql_select_db("instarent",$conn);


$sql = "SELECT * from workspace INNER JOIN venue ON workspace.workspace_id = venue.workspace_id 
INNER JOIN amenities ON workspace.workspace_id = amenities.venue_id 
INNER JOIN workspace_pricing ON workspace.workspace_id = workspace_pricing.venue_id
where workspace.workspace_id='".$workspaceid."' ";



$sql_review = "SELECT * from reviews where workspace_id='".$workspaceid."'  ORDER BY createdOn DESC";



  
$query = mysql_query($sql,$conn);
$query_reviews = mysql_query($sql_review);

    
  while($row = mysql_fetch_assoc($query)){
    $data=$row;
  }

$sql_user_data = "SELECT * from user where  userid = '".$data['user_id']."'";
$user_data = mysql_fetch_assoc(mysql_query($sql_user_data));

while($row = mysql_fetch_assoc($query_reviews)){
    $data_reviews_old[]=$row;
  }

$query_userdetail = mysql_query($sql);
$userdetail = mysql_fetch_assoc($query_userdetail);

if(isset($data_reviews_old)){
  for ($i=0; $i <count($data_reviews_old) ; $i++) { 
      # code...
    $sql = "SELECT user.first_name, user.surname, user_details.photo_path from user INNER JOIN user_details ON 
    user.userid = user_details.user_id
     where user.userid = '".$data_reviews_old[$i]['author_id']."'";
    $username = mysql_fetch_assoc(mysql_query($sql));

    $data_reviews_old[$i]['username'] = $username['first_name']." ".$username['surname'];
    $data_reviews_old[$i]['photo_path'] = $username['photo_path'];
  }
}

// print_r($userdetail);

$data_reviews = json_encode($data_reviews_old);
// print_r($data_reviews);

// print_r($user_data);
mysql_close($conn);

?>



<!DOCTYPE html>
<html lang="en" ng-app="instarent">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Workspace - Instarent</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">       
    <link href="css/shop-item.css" rel="stylesheet">
    <link href="../dashboard/css/style_v1.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-controller="BookingController">
<div class="container-fluid">
    
 <div class="row" style="vertical-align:0">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    

<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <a href="#">InstaRent</a>
            </div>

            <div id="top-panel" class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <div class="col-xs-7 col-md-7 col-lg-7 col-sm-7">
        </div>
        
<?php if(!(isset($_SESSION["currentuserid"]))){ 

    ?>                    
                    <div class="col-xs-2  col-sm-2 col-md-2 col-lg-2  pull-right top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            



                            <li>
                                <a href="#signup" data-toggle ="modal">Sign Up </a>
                            </li>
                            <li> &nbsp &nbsp &nbsp</li>
                            <li class="hidden-xs">
                                <a href="#login" data-toggle ="modal">Log In</a>
                                
                            </li>
                            <li> &nbsp &nbsp &nbsp</li>




                        </ul>
                            
                            
                        </ul>
                    </div>
                
          

<?php }

else{

?>

<!-- Insert logged in header here -->
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
            
                            <ul class="nav navbar-nav pull-right panel-menu">
                            <li class="hidden-xs">
                                <a href="#" class="modal-link">
                                    <div class="host"> Host  
                                    <i class="fa fa-building"></i>
                                    <span class="badge">7</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                &nbsp&nbsp&nbsp&nbsp
                            </li>




                            <li class="hidden-xs">
                                <a href="#" class="modal-link">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge">7</span>
                                </a>
                            </li>



                            
                            <li class="hidden-xs">
                                <a href="../ajax/page_messages.html" class="ajax-link">
                                    <i class="fa fa-envelope"></i>
                                    <span class="badge">7</span>
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
                                        <span><?php echo $_SESSION["fullname"]  ?></span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
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



<?php }?>
  </div>
        </div>
    </div>
</header>
 </div>
</div>
 </div>
<script type="text/javascript">
        var host_id=<?php echo $data['user_id'] ?>;
        var venue_id=<?php echo $data['venue_id']  ?>;
        var workspace_id=<?php echo $workspaceid ?>;
        var wifi = '<?php echo $data['wifi'] ?>';
        var internet='<?php echo $data['internet']  ?>';
        var kitchen = '<?php echo $data['kitchen']  ?>';
        var doorman = '<?php echo $data['doorman']  ?>';
        var buzzer = '<?php echo $data['buzzer']  ?>';
        var elevator = '<?php echo $data['elevator']  ?>';
        var parking ='<?php echo $data['parking']  ?>';
        var essentials = '<?php echo $data['essentials']  ?>';
        var hourly_price =  <?php echo $data['hourly_price']  ?>;
        var monthly_price =  <?php echo $data['monthly_price']  ?>;
        var weekly_price =  <?php echo $data['weekly_price']  ?>;


        var reviews = <?php echo($data_reviews)  ?>;
        <?php if (isset($_SESSION['currentuserid'])) {
            
        ?>
        var isLoggedIn = true;
        <?php
}
else {?>
    var isLoggedIn = false;
<?php }?>

</script>


    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">About the Host</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail"> 
                    <img class="img-responsive" alt="" src="<?php echo "../offices/new/".$data['image_1'] ?>" >
                    <div class="caption-full">
                        <h5 class="pull-right">
                            <div class="panel panel-default">
                                  <div class="panel-heading">
                                        <h3 class="panel-title">INR <small class="text-right">  <?php echo $data['hourly_price'] ?> </small> 
                                            <span style="margin-left:30%"> Per Hour  </span>

                                        </h3>
                                  </div>
                                  <div class="panel-body">
                                        <div class="form-group">
                                            
                <div class="col-md-12" >
                    <span> 
                    <form name = "bookingform">                                                    
                    <input type="date" ng-model="fromdate" name="" 
                    id="from" class="form-control" value="" required="required" title="" placeholder="From Date">
                    <input type="date" name="" ng-model="todate" id="to" 
                    class="form-control" value="" required="required" title="" placeholder="To Date">
                    <input type="number" name="" ng-model="team_size" id="teamcount" 
                    class="form-control" value="" min=1 max="" required="required" title="" placeholder="Team Count">
                    

                    <button type="button" class="btn btn-primary  book_button col-md-12"  ng-hide="!isUserLoggedIn()"
                    ng-click="isLoggedIn && bookingform.$valid && bookspace()">Book</button>

                    <button type="button" class="btn btn-primary col-md-12 logintobook"  ng-hide="isUserLoggedIn()"
                    dat-togal="modal" data-target="#login">Login To Book</button>

                    </form>
                    </span>

                </div>

                  
                                                
                                            



                                        </div>


                                  </div>
                            </div>


                         </h5>
                
                        <h4><a href="#"><?php echo $data['name']."/".$data['space_name']."," ?>

                             <?php echo $data['city'] ?> 

                             
                                <div > {{$scope.stars}} </div> 
                             
                        </a>
                        </h4>
                        
                    </div>
                    
                </div>

<div class="well">
    <div class="container-fluid">
        
        <div class="spaceDetails">
           <p class="text-info"> About this venue : </p> <p> <?php echo $data['venue_desc']?> 
           

       </p>  
        </div>

        <div class="spaceDetails">
    <p class="text-info"> About this WorkSpace : </p>

        <span > <?php echo "Number of floors:" ?> </span>
            <span class="propertyvalue"><?php echo $data['no_of_floors'] ?> </span>


          <span > <?php echo " Total Floor Area:" ?></span>
          <span class="propertyvalue"> <?php echo $data['floor_area'] ?></span>
          
           <span > <?php echo "Number of Rooms".":"?> </span>
            <span class="propertyvalue"> <?php echo $data['no_of_rooms'] ?></span>

           <span > <?php echo "Number of Desks".":"?> </span>
            <span class="propertyvalue"> <?php echo $data['no_of_desks'] ?></span>

           <span > <?php echo "Check in time".":"?> </span>
            <span class="propertyvalue"> <?php echo $data['opening_time'] ?></span>

           <span > <?php echo "Check out time".":"?> </span>
            <span class="propertyvalue"> <?php echo $data['closing_time'] ?></span>
           
        </div>
            


    <div class= "spaceDetails">
        <p class="text-info"> Pricing Details </p> 
        <dl class="dl-horizontal">
        <dt> Monthly Price :</dt>
        <dd>INR <?php echo $data['monthly_price'] ?></dd> 
        <dt> Weekly Price :</dt>
        <dd>INR <?php echo $data['weekly_price'] ?></dd> 
        <dt> Hourly Price :</dt>
        <dd>INR <?php echo $data['hourly_price'] ?></dd> 

        </dl>
    </div>


<div class= "spaceDetails">
    <p class="text-info"> Description : </p> <p> <?php echo $data['space_desc'] ?> </p>
</div>
    

    <div class="spaceDetails amenities">
        <p class="text-info"> Available Amenities </p>
        <dl class="dl-horizontal">
            <dd ng-show = "checkAvailability(wifi)">Wifi</dd>
            <dd ng-show = "checkAvailability(internet)">Internet</dd>
            <dd ng-show = "checkAvailability(kitchen)">Kitchen</dd>
            <dd ng-show = "checkAvailability(doorman)">Doorman</dd>
            <dd ng-show = "checkAvailability(buzzer)">Buzzer</dd>
            <dd ng-show = "checkAvailability(elevator)">Elevator</dd>
            <dd ng-show = "checkAvailability(parking)">Parking</dd>
            <dd ng-show = "checkAvailability(essentials)">Essentials</dd>

        </dl>

    </div>






        
            
    </div>
    
</div>


<div class="well">
    <div class="images " style="display:inline-flex;position:relative">
        <?php if ($data['image_2']!="") { ?>
            <img style="margin:2px;max-height:200px; ,max-width:200px" class="img-responsive img-rounded" 
            src = "../offices/new/<?php echo $data['image_2']?>" >    
        <?php }?>
        <?php if ($data['image_3']!="") { ?>
        <img style="margin:2px;max-height:200px; max-width:200px"class="img-responsive img-rounded" 
        src = "../offices/new/<?php echo $data['image_3']?>" >
        <?php }?>
        <?php if ($data['image_4']!="") { ?>
        <img style="margin:2px;max-height:200px; max-width:200px"class="img-responsive img-rounded" 
        src = "../offices/new/<?php echo $data['image_4']?>" >
        <?php }?>
        <?php if ($data['image_4']!="" and $data['imag_5']!="") { ?>
        <img style="margin:2px;max-height:200px; max-width:200px;"class="img-responsive img-rounded" 
        src = "../offices/new/<?php echo $data['image_4']?>" >
        <a href="#" style="position:absolute; bottom:0;right:0;"><h1 class="text-center" style="color:#fff">See All Photos</h1></a>
        <?php }?>
        
        
    </div>
</div>



                <div class="well">

                    <div class="text-right">
                        <p class="text-info">Latest Reviews</p>
                    </div>

                    <hr>
                    <?php foreach ($data_reviews_old as $key => $value) {
                        # code...
                        
                            # code...
                        
                     ?>

                     
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <img src="<?php echo "../profile/".$data_reviews_old[$key]['photo_path'] ?>"
                             class="avatar img-circle" alt="echo" style="height:80px; width:80px">
                             <p class="text-info"> <?php echo $data_reviews_old[$key]['username'] ?>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6">
                            <p> <?php echo $data_reviews_old[$key]['body']?> </p>  
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <uib-rating ng-model="<?php echo "reviews[$key].stars" ;?>" max=5 readonly="true"  
                    on-leave="overStar = null" titles="['one','two','three']">
                </uib-rating>
                        </div>
                        



                    </div>

                    <hr>
                    <?php 
                }?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

<!-- modals -->

<div class="modal fade bs-example-modal-sm" id="signup">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form action="register.php" method="POST" role="form" name="signup">
                    
                <center><legend>Sign up using email</legend></center>
                    <div class="form-group">

                        <div class="input-group">
                            <input type="text" class="form-control" ng-model="fname" name="uFname" placeholder="First name" required="required" ng-pattern="/.{3,}/" title="3 characters minimum" maxlength=15>
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </div>
                        
                        <div ng-show="signup.$submitted||signup.uFname.$touched">

                            
                            <span class="label label-danger" ng-show="signup.uFname.$error.pattern" >
                                Minimum length = 3
                            </span>
                        </div>

                        <br>
                        <div class="input-group">
                            <input type="text" ng-model="sname" required="required"class="form-control" name="sname" placeholder="Surname" ng-pattern="/.{3,}/">
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </div>

                        <div ng-show="signup.$submitted||signup.sname.$touched">
                            <span class="label label-danger" ng-show="signup.sname.$error.pattern" >Minimum Length = 4</span>
                        </div>
<br>
                        <div class="input-group">
                            <input type="email" name = "uEmail" ng-model = "email" required="required" class="form-control" id="" placeholder="Email address">
                            <span class="input-group-addon">
                            <i>@</i>
                            </span>
                        </div>
                        <div ng-show="signup.$submitted || signup.uEmail.$touched">
                        
                        <span ng-show="signup.uEmail.$error.email" class="label label-danger">This is not a valid email.</span>
                        </div>

<br>
                        <div class="input-group">
                            <input type="password" name = "uPassword" ng-model="password" required="required" class="form-control" id="" placeholder="Password" ng-pattern="/^(?=.{6,20}$)(?=.*\d)(?=.*[a-zA-Z]).*$/"/>
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            </span>
                        </div>

                    <div ng-show="signup.$submitted || signup.uPassword.$touched">
                        
                        <span ng-show="signup.uPassword.$error.pattern" class="label label-danger">This is not a valid Password.</span>
                    </div>
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value=""/>
                                I'd like to receive coupons and inspiration
                            </label>
                        </div>
                    </div>
                
                    <input type="submit" name="signup" class="btn btn-primary" value="Sign up"style="width:100%;" ng-disabled="signup.uFname.$dirty && signup.uFname.$invalid ||  
                    signup.uEmail.$dirty && signup.uEmail.$invalid ||signup.sname.$dirty && signup.sname.$invalid ||
                    signup.uPassword.$dirty && signup.uPassword.$invalid"/>

                </form>
                
            </div>
            <div class="modal-footer">
                Already an Instarent member? <a href="#login" data-toggle="modal" class="login"> Log in </a>
            </div>
        </div>
    </div>
</div>

<!-- Login Section -->

<div class="modal fade bs-example-modal-sm" id="login" ng-controller = "LoginController as logincontroller">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form name="login" role="form">
                    
                <center><legend>Log In using Email</legend></center>
                    <div class="form-group">
<br>
                        <div class="input-group">
                            <input type="email" name ="uEmail" required="required" class="form-control" id="" placeholder="Email address" ng-model="email">
                            <span class="input-group-addon">
                            <i>@</i>
                            </span>
                        </div>




<div ng-show="login.$submitted || login.uEmail.$touched">
    <span ng-show="login.uEmail.$error.email" class="label label-danger">This is not a valid email.</span>
</div>
<br>
                        <div class="input-group">
                            <input type="password" name ="uPassword" required="required" class="form-control" id="" placeholder="Password" ng-model="password" ng-pattern="/^(?=.{6,20}$)(?=.*\d)(?=.*[a-zA-Z]).*$/"/>
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            </span>
                    </div>                      

<div ng-show="login.$submitted || login.uPassword.$touched"> 
    <span  ng-show="login.uPassword.$error.pattern" class="label label-danger">This is not a valid Password.</span>
    <span ng-show="logincontroller.checkIsAUser()" class="label label-danger">Invalid email or password </span>

</div>
                    <span style="display:block; margin-top:10%">
                    <input type="submit" ng-click=logincontroller.login() class="btn btn-primary" style="width:100%;" value="Log In" ng-disabled="
                    login.uEmail.$dirty && login.uEmail.$invalid || login.uPassword.$dirty && login.uPassword.$invalid">
                    </span>
                    <span style="display:block; margin-top:5%">
                    <!-- <a href="#" data-toggle="" style="text-align:right">Forgot password</a> -->
                    
                    </span>
                </form>
                
            </div>
            <div class="modal-footer" >
                Don't have an account? <a class="signup" href="#signup" data-toggle="modal">Sign up</a>
            </div>
        </div>
    </div>
</div>


<!-- !modals -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



    <!-- Angular Core JavaScript -->

    <script src = "../Angular/js/angular.min.js"></script>
    <script src = "../dashboard/js/ui-bootstrap.min.js"></script>
    <script src="../dashboard/js/jquery-ui.js"></script>
    <script src= "js/book.js" ></script>
    
    <script type="text/javascript">

$(document).ready(function(){
    $('.signup').on('click',function(){
        $('#login').modal('hide');
    });
    $('.login').on('click',function(){
        $('#signup').modal('hide');
    });
     $('.logintobook').on('click',function(){
        $('#login').modal('show');
    });
})
</script>



</body>

</html>
