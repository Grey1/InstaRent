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
$booking  = mysql_real_escape_string($data->booking);

$date = date("Y/m/d");

if($booking=='1'){
$sql = "SELECT * from booking where host_id = '".$_SESSION['currentuserid']."' && from_date >= '".$date."'";
}
else if($booking=='2'){
	$sql = "SELECT * from booking where host_id = '".$_SESSION['currentuserid']."' && to_date < '".$date."'";
}
else if($booking=='3'){
	$sql = "SELECT * from booking where user_id = '".$_SESSION['currentuserid']."' && from_date >= '".$date."'";	
}
else if($booking=='4'){
	$sql = "SELECT booking.booking_id,booking.user_id,booking.host_id,booking.confirmation_from_host,
	booking.from_time,booking.to_time,booking.to_date,booking.from_date,booking.payment_status,booking.workspace_id,
	booking.total_amount,booking.booking_status,reviews.review_id
	 from booking LEFT JOIN reviews ON booking.booking_id = reviews.booking_id
	 where booking.user_id = '".$_SESSION['currentuserid']."' && booking.to_date < '".$date."'";	
}



$query = mysql_query($sql);
$no_of_rows = 0;
if(is_resource($query)){
while($row = mysql_fetch_assoc($query)) {
	$bookings[] = $row;
	$no_of_rows++;
}




$j = 0;


while($j < $no_of_rows){
if($booking=='1' || $booking=='2'){
$sql = "SELECT user.first_name,user.surname,user_details.contact,user_details.company_name,user_details.address1,
user_details.address2, user_details.photo_path from user INNER JOIN user_details 
ON user.userid = user_details.user_id where user.userid = '".$bookings[$j]['user_id']."'";
}
else{
	$sql = "SELECT user.first_name,user.surname,user_details.contact,user_details.company_name,user_details.address1,
user_details.address2, user_details.photo_path from user INNER JOIN user_details 
ON user.userid = user_details.user_id where user.userid = '".$bookings[$j]['host_id']."'";


}

$query = mysql_query($sql);

$host_details = mysql_fetch_assoc($query);

$sql = "SELECT * from workspace where workspace_id = '".$bookings[$j]['workspace_id']."'";


$query = mysql_query($sql);
$workspace_details = mysql_fetch_assoc($query);


${"bookings".$j} = array_merge($host_details,$bookings[$j],$workspace_details);
$booking_data[$j] = ${"bookings".$j};
$j++;
}
}
if(isset($booking_data)){
echo (json_encode($booking_data));
}

?>