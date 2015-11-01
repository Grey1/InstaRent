<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";





$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("instarent",$conn);

if(isset($_POST['signup'])){

// Inserting Data into user table

$_fname = $_POST['uFname'];
$_sname = $_POST['sname'];
$_email = $_POST['uEmail'];
$_password = $_POST['uPassword'];
$sql = "INSERT INTO user (email,password,first_name, surname, active) VALUES ('".$_email."','".$_password."','".$_fname."','".$_sname."',1)";
$query = mysql_query($sql, $conn);

   if(! $query )
   {
      die('Could not enter data: ' . mysql_error());
   }
}

// Fetching username to store into session variable

  $sql = "SELECT userid from user";
  $query = mysql_query($sql,$conn);
   	
  while($row = mysql_fetch_assoc($query)){
    $data[]=$row['userid'];
    $_SESSION["currentuserid"]=max($data);
  }



$sql = "SELECT first_name,surname from user where userid = '".$_SESSION["currentuserid"]."'";
$query = mysql_query($sql,$conn);
if(is_resource($query)){
  while($row=mysql_fetch_assoc($query)){
    $current_firstname = $row['first_name'];
    $current_surname=$row['surname'];
    $_SESSION["fullname"]=$current_firstname.' '.$current_surname;
  }
}

$sql = "INSERT into user_details (user_id) VALUES('".$_SESSION["currentuserid"]."')";
$query = mysql_query($sql,$conn);
if(! $query )
   {
      die('Could not enter data into user_details: ' . mysql_error());
   }


$sql= "SELECT user_detail_id from user_details where user_id = '".$_SESSION["currentuserid"]."'";
$query = mysql_query($sql,$conn);
if(! $query )
   {
      die('Could not enter data: ' . mysql_error());
   }
$row=mysql_fetch_assoc($query);




$sql = "UPDATE user SET user_detail_id = '".$row['user_detail_id']."' WHERE userid = '".$_SESSION["currentuserid"]."'";

$query = mysql_query($sql,$conn);
if(! $query )
   {
      die('Could not enter data into xyz: ' . mysql_error());
   }










mysql_close($conn);



header("location:member/member_home.php");




?>