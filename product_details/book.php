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
    	$sql = "INSERT into booking(user_id,host_id,workspace_id,confirmation_from_host,venue_id,from_time,to_time,from_date,to_date,total_amount,payment_status,booking_status) 
        VALUES ('".$_SESSION['currentuserid']."','".$user_id."',)";
    	$query = mysql_query($sql);
        if(isset($query)){
            echo "success";
        }
        else
        {
            echo "failure";
        }

    	?>
