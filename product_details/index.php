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
  
$query = mysql_query($sql,$conn);


    
  while($row = mysql_fetch_assoc($query)){
    $data=$row;
  }
mysql_close($conn);

print_r($data);




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

<?php

include("../header/headerafterlogin.html");

?>

    <p class="hidden">{{host_id=<?php echo $data['user_id'] ?>}}
        {{venue_id=<?php echo $data['venue_id']  ?>}}
        {{workspace_id=<?php echo $data['workspace_id'] ?>}}
        



    </p>
    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
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
                                            
                                            <div class="col-md-12" class="pull-right">
                                                <span> 
                                                <input type="date" ng-model="fromdate" name="" id="input" class="form-control" value="" required="required" title="" placeholder="From Date">
                                                <input type="date" name="" ng-model="todate" id="input" class="form-control" value="" required="required" title="" placeholder="To Date">
                                                <button type="button" class="btn btn-primary  col-md-12"  ng-click="bookspace()">Book</button>
                                                </span>
                                            </div>
                                            
                                                
                                            



                                        </div>


                                  </div>
                            </div>


                         </h5>
                        <h4><a href="#"><?php echo $data['name']."/".$data['space_name'] ?></a>
                        </h4>
                        
                    </div>
                    
                </div>

<div class="well">
    <div class="container-fluid">
        
        <div class="spaceDetails">
           <p> About this venue :  <small> <?php echo $data['venue_desc']?> </small>         </p>
        </div>
            


    <div class= "spaceDetails">
        <p> Monthly Price :  <small> INR <?php echo $data['monthly_price'] ?>  </small> </p>
        <p> Weekly Price : <small> INR <?php echo $data['weekly_price'] ?> </small> </p>
        <p> Hourly Price : <small> INR <?php echo $data['hourly_price'] ?> </small> </p>        
        
    </div>
        
            
    </div>
    
</div>







                <div class="well">

                    <div class="text-right">
                        <p class="text-info">Latest Reviews</p>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src = "../Angular/js/angular.min.js"></script>
    <script src= "js/book.js" ></script>



</body>

</html>
