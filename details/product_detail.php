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
INNER JOIN amenities ON workspace.workspace_id = amenities.workspace_id 
INNER JOIN workspace_pricing ON workspace.workspace_id = workspace_pricing.workspace_id
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

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-controller ="BookingController">
<p style = "display:none">
    {{user_id = <?php echo $data['user_id'] ;?>}}
    {{workspace_id = <?php echo $data['workspace_id'] ;?>}}



</p>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">INSTARENT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Portfolio Item
                    <small>Item Subheading</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <img class="img-responsive" src="<?php echo "../offices/new/".$data['image_1'];?>" alt="">
            </div>
        </div>
        <div class="row">
            
        <div class="col-md-4 col-md-offset-8 ">
 <!--                <h3>Project Description</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3>Project Details</h3>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
  -->           

            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h2 class="panel-title"> 
                            Booking Information
                         </h2>
                  </div>
                  <div class="panel-body">
                    <button type="button" class="btn btn-primary" ng-click="book()">button</button>
                  </div>
                  
            </div>
        </div>

        
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?php echo "../offices/new/".$data['image_2'];?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?php echo "../offices/new/".$data['image_3'];?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?php echo "../offices/new/".$data['image_4'];?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#" class="lastImage">
                    <img class="img-responsive portfolio-item" src="<?php echo "../offices/new/".$data['image_4'];?>" alt="">
                </a>
                <a href="#" class="moreImages">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../dashboard/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src = "../Angular/js/angular.min.js"></script>
    <script src= "book.js" ></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>    

</body>

</html>

