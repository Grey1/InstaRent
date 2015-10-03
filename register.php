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

$_fname = $_POST['fname'];
$_sname = $_POST['sname'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$sql = "INSERT INTO user (email,password,first_name, surname, active) VALUES ('".$_email."','".$_password."','".$_fname."','".$_sname."',1)";
$query = mysql_query($sql, $conn);

   if(! $query )
   {
      die('Could not enter data: ' . mysql_error());
   }
}


  $sql = "SELECT userid from user";
  $query = mysql_query($sql,$conn);
   	
  while($row = mysql_fetch_assoc($query)){
    $data[]=$row['userid'];
  }

   	$_SESSION["currentuserid"]=max($data);

  $sql = "SELECT first_name,surname from user";
  $query = mysql_query($sql,$conn);
  if(is_resource($query)){
    while($row=mysql_fetch_assoc($query)){
      $current_firstname = $row['first_name'];
      $current_surname=$row['surname'];
      $_SESSION["fullname"]=$current_firstname.' '.$current_surname;
    }
  }
    mysql_close($conn);

header("location:member/member_home.php");




?>