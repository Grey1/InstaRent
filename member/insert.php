<?php

session_start();

$server_name="localhost";
$db_name="instarent";
$username="root";
$password="";


$data = json_decode("php://input");
$fname = mysql_real_escape_string($data->fname);
$sname = mysql_real_escape_string($data->sname);
$gender = mysql_real_escape_string($data->gender);
$bday = mysql_real_escape_string($data->bday);
$contact = mysql_real_escape_string($data->contact);
$contactname = mysql_real_escape_string($data->contactname);
$addr1 = mysql_real_escape_string($data->addr1);
$addr2 = mysql_real_escape_string($data->addr2);
$city = mysql_real_escape_string($data->city);
$pincode = mysql_real_escape_string($data->pincode);

$con = mysql_connect($server_name,$username,$password);
if(!con){
	die('Could not connect'.mysql_error());
}



mysql_select_db($db_name);
// query to insert data into user table
$sql = "UPDATE user SET email = '".$email."' , first_name = '".$fname."', surname = '".$sname."', 
where userid = '".$_SESSION['currentuserid']."'";



$sql1 = "UPDATE user_details SET gender  = '".$gender."', birth_date = '".$bday."'  , company_name ='".$companyname."', address1 ='".$addr1."', address2 ='".$addr2."', 
pincode ='".$pincode."' , city ='".$city."'  
WHERE user_id = '".$_SESSION['currentuserid']."' ";


$query = mysql_query($sql,$con);
$query = mysql_query($sql1,$con);

echo "string";

?>