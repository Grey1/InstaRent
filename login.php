<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";



$email = $_POST['email'];
$password = $_POST['password'];

$con = mysql_connect($servername,$username);
if(!$con){
	die('Could not connect'.mysql_error());
}

mysql_select_db("instarent",$con);
$sql = "SELECT userid from user where email = '".$email."' && password='".$password."'";
$query = mysql_query($sql, $con);

while($row=mysql_fetch_assoc($query)){
	 $currentuserid= $row['userid'];
}

if($currentuserid){

$_SESSION["currentuserid"]=$currentuserid;

  $sql = "SELECT first_name,surname from user where userid='".$currentuserid."'";
  $query = mysql_query($sql,$con);
  if(is_resource($query)){
    while($row=mysql_fetch_assoc($query)){
      $current_firstname = $row['first_name'];
      $current_surname=$row['surname'];
      $_SESSION["fullname"]=$current_firstname.' '.$current_surname;

    }
    
  }
header("location:member/member_home.php");

mysql_close($con);

}



?>