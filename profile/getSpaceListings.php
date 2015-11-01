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
$user_id = mysql_real_escape_string($data->user_id);
$i = 0;
$sql = "SELECT venue_id,name,workspace_id from venue where user_id = '".$user_id."' ";
$query = mysql_query($sql);
while($row = mysql_fetch_assoc($query)){
	$data_venue[]=$row;
	$i++;
}
 

$j=0;
while($j<$i){
	$sql = "SELECT space_name,image_1 from workspace where workspace_id= '".$data_venue[$j]['workspace_id']."' ";
	$query = mysql_query($sql);
	while($row = mysql_fetch_assoc($query)){
		$data_workspace[$j] = $row;
	}

	${"data_".$j} = array_merge($data_workspace[$j],$data_venue[$j]);
	$listingdata[$j]=${"data_".$j};
	$j++;
}


if(isset($listingdata)){
echo json_encode($listingdata);
}


?>