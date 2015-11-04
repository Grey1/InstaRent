<?php


session_start();

      // set up the connection variables
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		

		$data = json_decode(file_get_contents("php://input"));
        $booking_id = mysql_real_escape_string($data->bookingid);
        $reject = mysql_real_escape_string($data->reject);
        $conn = mysql_connect($servername, $username,$password);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}

		mysql_select_db($dbname,$conn);
		if($reject==1){
		$sql = "UPDATE booking set confirmation_from_host =0, rejected_by_host = 1 
		where booking_id = '".$booking_id."'";
			
		$query = mysql_query($sql);
		if(isset($query)){
			echo $booking_id;
		}	

		}
		else {
		$sql = "UPDATE booking set confirmation_from_host =1 where booking_id = '".$booking_id."'";
		$query = mysql_query($sql);
		if(isset($query)){
			echo $booking_id;
		}
	}

?>