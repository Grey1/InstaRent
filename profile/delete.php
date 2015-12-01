<?php


session_start();

      // set up the connection variables
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		

		$data = json_decode(file_get_contents("php://input"));
        $venue_id = mysql_real_escape_string($data->venue_id);
        $conn = mysql_connect($servername, $username,$password);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}


		$date = date("Y/m/d");
		mysql_select_db($dbname,$conn);
		$sql_verify_booking_exist = "SELECT * from booking where workspace_id = '".$venue_id."'";
		$query = mysql_query($sql_verify_booking_exist);
		if(mysql_num_rows($query)=0){

		$sql_venue = "DELETE FROM venue where venue_id='".$venue_id."' ";
		$sql_workspace = "DELETE FROM workspace where venue_id='".$venue_id."' ";
		$sql_workspace_pricing = "DELETE FROM workspace_pricing where venue_id='".$venue_id."' ";
		$sql_amenities = "DELETE FROM amenities where venue_id='".$venue_id."' ";
		mysql_query($sql_venue);
		mysql_query($sql_workspace);
		mysql_query($sql_workspace_pricing);
		mysql_query($sql_amenities);
		echo 1;
		}
		else{
		echo 0;
}
?>