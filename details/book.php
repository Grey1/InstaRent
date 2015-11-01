<?php

session_start();

      // set up the connection variables
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		

		$data = json_decode(file_get_contents("php://input"));
    	$user_id = mysql_escape_string($data->user_id);
    	$conn = mysql_connect($servername, $username,$password);
    	if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($dbname,$conn);
    	$sql = "INSERT into booking(user_id,host_id) VALUES ('".$user_id."','".$_SESSION['currentuserid']."')";
    	$query = mysql_query($sql);
    	if($query){
    		echo "success";
    	}
    	else echo "failure";
    	?>
