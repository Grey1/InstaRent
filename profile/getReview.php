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
$venueid  = mysql_real_escape_string($data->venueid);


$sql = "SELECT * from reviews where venue_id = '".$venueid."'";
$query = mysql_query($sql);
if(is_resource($query)){
	while ($row = mysql_fetch_assoc($query)) {
		# code...
		$data_review[] = $row;


	}



if(isset($data_review)){
	for ($i= 0 ;$i<count($data_review);$i++){
	$sql = "SELECT user.first_name, user.surname, user_details.photo_path from user INNER JOIN user_details
	ON user.userid = user_details.user_id where user.userid = '".$data_review[$i]['author_id']."'";
	${"host_details".$i} = mysql_fetch_assoc(mysql_query($sql)); 
	$intermediate_data = array_merge($data_review[$i],${"host_details".$i});
	$final_data[] = $intermediate_data;
}

if (isset($final_data)) {
	# code...
	echo json_encode($final_data);
}
else echo "0";
}

}
?>