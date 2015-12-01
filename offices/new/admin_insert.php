<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysql_connect($servername, $username,$password);

if (!$conn) 
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('instarent');

$a=$_POST['txt1'];

$sql = "UPDATE workspace SET verifiedbyadmin = 1 WHERE workspace_id=$a";

$retval = mysql_query( $sql, $conn );
            
            if(! $retval )
            {
               die('Could not update data: '. mysql_error());
            }
           // echo "Updated data successfully\n";


$sql = "UPDATE verification SET verify = 1 WHERE workspace_id=$a";

$retval = mysql_query( $sql, $conn );

            
mysql_close($conn);
header("location:admin.php");

?>