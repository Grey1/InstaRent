<?php


$servername = "localhost";
$username = "root";
$password = "";

$conn = mysql_connect($servername, $username,$password);
mysql_select_db("instarent",$conn);
$sql = "SELECT first_name,surname from user where userid = 16";
  $query = mysql_query($sql,$conn);
   	
  while($row = mysql_fetch_assoc($query)){
    $fname=$row['first_name'];
    $sname = $row['surname'];
    $fullname = $fname.' '.$sname;
    $data = json_encode($fullname);
    echo $data;
  }
  

   	mysql_close($conn);

?>
