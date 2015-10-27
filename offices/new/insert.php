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
  $desks = mysql_real_escape_string($data->desks);

$venue_id = $_SESSION["venueid"];
$sql = "UPDATE venue SET venue_desc = '".$descr."' , event_type = '".$type."' ,no_of_floors='".$floors."' ,floor_area='".$area."' ,no_of_rooms='".$rooms."' ,no_of_desks='".$desks."' WHERE venue_id='".$venue_id."'";

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

$spacetype = mysql_real_escape_string($data->spacetype);
$spacename = mysql_real_escape_string($data->spacename);
$no_similar_space = mysql_real_escape_string($data->no_similar_space);
$descr = mysql_real_escape_string($data->descr);



$venue_id = $_SESSION["venueid"];
$sql = "INSERT INTO workspace(venue_id,user_id,type,space_name,space_desc) VALUES('".$venue_id."',10,'".$spacetype."','".$spacename."','".$no_similar_space."','".$descr."')"; 

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==4){  

$image_1 = mysql_real_escape_string($data->photoname1);
$image_2 = mysql_real_escape_string($data->photoname2);
$image_3 = mysql_real_escape_string($data->photoname3);
$image_4 = mysql_real_escape_string($data->photoname4);

$venue_id = $_SESSION["venueid"];

$sql = "UPDATE workspace SET  image_1 = '".$image_1."',image_2 = '".$image_2."', image_3 = '".$image_3."', image_4 = '".$image_4."' , image_5 = '".$image."',image_6 = '".$image."', image_7 = '".$image."', image_8 = '".$image."', image_9 = '".$image."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
if($num==5){   

$essentials =  mysql_real_escape_string($data->essentials);
$internet =  mysql_real_escape_string($data->internet);
$wireless =  mysql_real_escape_string($data->wireless);
$parking =  mysql_real_escape_string($data->parking);
$elevator =  mysql_real_escape_string($data->elevator);
$buzzer =  mysql_real_escape_string($data->buzzer);
$doorman =  mysql_real_escape_string($data->doorman);
$kitchen =  mysql_real_escape_string($data->kitchen);

$venue_id = $_SESSION["venueid"];
$sql = "UPDATE amenities SET wifi='".$wireless."', internet ='".$internet."', kitchen ='".$kitchen."', 
doorman ='".$doorman."', telecom ='".$telecom."', elevator ='".$elevator."', parking ='".$parking."', essentials ='".$parking."') 
WHERE venue_id='".$venue_id."' ";
$query = mysql_query($sql, $conn);
mysql_close($conn);
}

if($num==6){
$pricePerHour = mysql_real_escape_string($data->pricePerHour);
$pricePerWeek = mysql_real_escape_string($data->pricePerWeek);
$pricePerMonth = mysql_real_escape_string($data->pricePerMonth);    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE workspace_pricing SET weekly_price='".$pricePerWeek."',monthly_price='".$pricePerMonth."',hourly_price='".$pricePerHour."' "; 

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

    $sql_workspace = "INSERT INTO workspace (venue_id)VALUES ('".$_SESSION["venueid"]."')";
    $sql_workspace_pricing="INSERT INTO workspace_pricing (venue_id)VALUES ('".$_SESSION["venueid"]."')";
    $sql_workspace_amenities = "INSERT INTO amenities (venue_id)VALUES ('".$_SESSION["venueid"]."')";
    mysql_query($sql_workspace,$conn);
    mysql_query($sql_workspace_pricing,$conn);
    mysql_query($sql_workspace_amenities,$conn);

    

   	mysql_close($conn);
    header("location:hosting_venue_details.php");

	}

 ?>