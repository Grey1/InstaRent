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


if(!isset($_POST['submit'])){
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
else if($num==2){    
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
else if($num==3){

$spacetype = mysql_real_escape_string($data->spacetype);
$spacename = mysql_real_escape_string($data->spacename);
$no_similar_space = mysql_real_escape_string($data->no_similar_space);
$descr = mysql_real_escape_string($data->descr);



$venue_id = $_SESSION["venueid"];
$sql = "UPDATE workspace SET type = '".$spacetype."',space_name = '".$spacename."', 
similar_workspace='".$no_similar_space."',space_desc='".$descr."' 
WHERE venue_id = '".$venue_id."'"; 

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
else if($num==4){  

$image_1 = mysql_real_escape_string($data->photoname1);
$image_2 = mysql_real_escape_string($data->photoname2);
$image_3 = mysql_real_escape_string($data->photoname3);
$image_4 = mysql_real_escape_string($data->photoname4);

$venue_id = $_SESSION["venueid"];

$sql = "UPDATE workspace SET  image_1 = '".$image_1."',image_2 = '".$image_2."', image_3 = '".$image_3."', image_4 = '".$image_4."' , image_5 = '".$image."',image_6 = '".$image."', image_7 = '".$image."', image_8 = '".$image."', image_9 = '".$image."' WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
else if($num==5){   

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
doorman ='".$doorman."', buzzer ='".$buzzer."', elevator ='".$elevator."', parking ='".$parking."', 
essentials ='".$essentials."', workspace_id= '".$venue_id."'
WHERE venue_id='".$venue_id."' ";
$query = mysql_query($sql, $conn);
mysql_close($conn);

}

else if($num==6){
$pricePerHour = $data->pricePerHour;
$pricePerWeek = mysql_real_escape_string($data->pricePerWeek);
$pricePerMonth = mysql_real_escape_string($data->pricePerMonth);    
$venue_id = $_SESSION["venueid"];
$sql = "UPDATE workspace_pricing SET weekly_price='".$pricePerWeek."',
monthly_price='".$pricePerMonth."',hourly_price='".$pricePerHour."',workspace_id='".$venue_id."' 
WHERE venue_id = '".$venue_id."'"; 

$query = mysql_query($sql);
echo $venue_id;
mysql_close($conn);

}
else if($num==7){    
$venue_id = $_SESSION["venueid"];

$fromtime = ($data->fromtime);
$totime = ($data->totime);
$availabledays = ($data->availabledays);    

$sql = "UPDATE venue SET opening_time = '".$fromtime."' , closing_time = '".$totime."',
'available_days'='".$availabledays."'  
WHERE venue_id='".$venue_id."'";

$query = mysql_query($sql, $conn);

mysql_close($conn);

}
else if($num==0){
  $venue_id = $_SESSION["venueid"];
$sql = "UPDATE workspace SET listedbyuser = 1  WHERE venue_id='".$venue_id."'";  
$query = mysql_query($sql, $conn);

$sql_insert_into_verification = "INSERT INTO verification (workspace_id) VALUES('".$venue_id."') ";
$query = mysql_query($sql_insert_into_verification, $conn);
mysql_close($conn);

}
}








else if (isset($_POST['submit'])){
  $name = $_POST['venue'];
  $city = $_POST['location'];
  $sql = "INSERT INTO venue (name,city,user_id)VALUES ('".$name."','".$city."','".$_SESSION['currentuserid']."')";
  $query = (mysql_query($sql,$conn));
  $sql = "SELECT venue_id from venue";
  $query = mysql_query($sql,$conn);
   	
  while($row = mysql_fetch_assoc($query)){
    $data[]=$row['venue_id'];
  }
   	$_SESSION["venueid"]=max($data);

    $sql_workspace = "INSERT INTO workspace (venue_id,user_id)VALUES ('".$_SESSION["venueid"]."','".$_SESSION['currentuserid']."')";
    $sql_workspace_pricing="INSERT INTO workspace_pricing (venue_id)VALUES ('".$_SESSION["venueid"]."')";
    $sql_workspace_amenities = "INSERT INTO amenities (venue_id)VALUES ('".$_SESSION["venueid"]."')";
    $sql_get_workspace_id  = "SELECT workspace_id from workspace where venue_id = '".$_SESSION["venueid"]."'";
    $query = mysql_query($sql_get_workspace_id);
    while($row=mysql_fetch_assoc($query))
    {$data[]=$row;}
    $workspace_id = max($data);
    $sql_update_venue_workspace = "UPDATE venue SET workspace_id = '".$workspace_id."' where venue_id = '".$_SESSION["venueid"]."'";
    mysql_query($sql_update_venue_workspace);
    mysql_query($sql_workspace);
    mysql_query($sql_workspace_pricing);
    mysql_query($sql_workspace_amenities);

    

   	mysql_close($conn);
    header("location:hosting_venue_details.php");

	}

 ?>