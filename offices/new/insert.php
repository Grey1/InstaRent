<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="instarent";		
$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);




	$data = json_decode(file_get_contents("php://input"));
	$num = mysql_real_escape_string($data->num);
	


if($num==1){
$descr = mysql_real_escape_string($data->descr);
  $type = mysql_real_escape_string($data->type);
  $floors = mysql_real_escape_string($data->floors);
  $area = mysql_real_escape_string($data->area);
  $rooms = mysql_real_escape_string($data->rooms);
  $desks = mysql_real_escape_string($data->typedesks);

$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==2){    
  $addr = mysql_real_escape_string($data->addr);
  $neighbours = mysql_real_escape_string($data->neighbours);
  $tel = mysql_real_escape_string($data->tel);
  $email = mysql_real_escape_string($data->email);
  $url = mysql_real_escape_string($data->url);
  
  


$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET addr = '".$addr."' , neighbourhood = '".$neighbours."' ,telephone='".$tel."' ,email='".$email."' ,website='".$url."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==3){    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==4){    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==5){    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==6){    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==7){    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}








if(isset($_POST['submit'])){
  $name = $_POST['venue'];
  $city = $_POST['city'];
  $sql = "INSERT INTO venue (name,city)VALUES ('".$name."','".$city."')";
  $query = (mysql_query($sql,$conn));
  $sql = "SELECT venue_id from venue";
  $query = mysql_query($sql,$conn);
   	
  while($row = mysql_fetch_assoc($query)){
    $data[]=$row['venue_id'];
  }

   	$_SESSION["venueid"]=max($data);
   	mysql_close($conn);
    header("location:hosting_venue_details.php");

	}





 ?>