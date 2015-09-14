<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InstaRent";

$_fname = $_POST['fname'];

echo $_fname;

$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("instarent",$conn);
$sql = 'INSERT INTO user'.'(unique_id, first_name, surname, password,email,active)'.'VALUES (1, "arjun","nair","arjun","arjun@gmail.com",1)';
$query = mysql_query($sql, $conn);

   if(! $query )
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);


?>