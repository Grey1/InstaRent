<?php

session_start();

      // set up the connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname="instarent";		

$data = json_decode(file_get_contents("php://input"));
$workspace = $data->workspace;
// $workspace[0] = 3;
// $workspace[1] = 2;
// $workspace[2] = 1;


$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);
$i = count($workspace);

for ($index = 0; $index < $i ; $index++){
	$sql = "SELECT * from booking where workspace_id = '".$workspace[$index]."' AND confirmation_from_host = 0";	
	$query = mysql_query($sql);
	${"booking_".$index} [] ="";
	 while($row = mysql_fetch_assoc($query)) {
	 	
		${"booking_".$index} [] = $row;	
		
	}

}





for ($j = 0; $j < $index ; $j++) {

	for ($i = 0; $i < count(${"booking_".$j}); $i++) {
if(${"booking_".$j}[$i]!=""){
	$bookingdata[] = ${"booking_".$j}[$i];	
}
	}
}



echo json_encode($bookingdata);

?>
