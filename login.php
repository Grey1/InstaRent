<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

$data = json_decode(file_get_contents("php://input"));

$email =  mysql_real_escape_string($data->email);
$password =  mysql_real_escape_string($data->password);

$con = mysql_connect($servername,$username);
if(!$con){
	die('Could not connect'.mysql_error());
}

mysql_select_db("instarent",$con);
$sql = "SELECT userid, usertype from user where email = '".$email."' && password='".$password."'";
$query = mysql_query($sql, $con);

$row=mysql_fetch_assoc($query);
	 $currentuserid= $row['userid'];
   $currentusertype = $row['usertype'];



if($currentuserid!=""){

$_SESSION["currentuserid"]=$currentuserid;

  $sql = "SELECT first_name,surname,photo_path from user INNER JOIN user_details ON user.userid=user_details.user_id 
  where user.userid='".$currentuserid."'";
  $query = mysql_query($sql,$con);
  if(is_resource($query)){
    while($row=mysql_fetch_assoc($query)){
      $current_firstname = $row['first_name'];
      $current_surname=$row['surname'];
      $image_path = $row['photo_path'];
      $_SESSION["fullname"]=$current_firstname.' '.$current_surname;
    }
    
  }

}
$_SESSION["userimag"] = $image_path;
$user_details['userid'] = $currentuserid;
$user_details['usertype'] = $currentusertype;
mysql_close($con);

echo json_encode($user_details);







?>