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
$body  = mysql_real_escape_string($data->body);
$author_id  = mysql_real_escape_string($data->author_id);
$createdOn  = date("Y-m-d");
$workspace_id = mysql_real_escape_string($data->workspace_id);
$venue_id = mysql_real_escape_string($data->venue_id);
$host_id =  mysql_real_escape_string($data->host_id);
$stars  = mysql_real_escape_string($data->stars);
$booking_id = mysql_real_escape_string($data->booking_id);

$sql = "INSERT into reviews(booking_id,stars,body,author_id,createdOn,workspace_id,venue_id,host_id)
 values('".$booking_id."','".$stars."','".$body."','".$_SESSION['currentuserid']."',
	'".$createdOn."','".$workspace_id."','".$venue_id."','".$host_id."')";
mysql_query($sql);


?>