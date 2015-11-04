<?php

session_start();

      // set up the connection variables
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		

		$data = json_decode(file_get_contents("php://input"));
        
    	$host_id = mysql_escape_string($data->host_id);
        $venue_id = mysql_escape_string($data->venue_id);
        $workspace_id = mysql_escape_string($data->workspace_id);
        $jsfrom_date = strtotime(mysql_escape_string($data->fromdate));
        $jsto_date =strtotime(mysql_escape_string($data->todate)) ;
        $team_size = mysql_escape_string($data->team_size);
        $monthly_price = mysql_escape_string($data->monthly_price);
        $weekly_price = mysql_escape_string($data->weekly_price);
        $hourly_price = mysql_escape_string($data->hourly_price);
        $from_date = date('Y-m-d',$jsfrom_date);
        $to_date = date('Y-m-d',$jsto_date);
        $total_days = mysql_escape_string($data->total_days);

        if($total_days>=31){
            if($total_days%31==0) $total_amount= ($total_days/31)*$monthly_price;  
            else if(($total_days%31)%7==0) $total_amount = (($total_days%31)*$weekly_price)+(($total_days/31)*$monthly_price);
            else $total_amount= (($total_days%31)*8*$hourly_price)+(($total_days/31)*$monthly_price);
        }
        else if($total_days<31 and $total_days>=7){
            if($total_days%7==0) $total_amount=($total_days/7)*$weekly_price;
            else $total_amount=($total_days/7)*$weekly_price+($total_days%7)*$hourly_price;
        }
        else {
            $total_amount=$total_days*$hourly_price*8;
        }
        

    	$conn = mysql_connect($servername, $username,$password);
    	if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($dbname,$conn);
    	$sql = "INSERT into booking(team_size,user_id,host_id,workspace_id,confirmation_from_host,
            from_date,to_date,total_amount,payment_status,booking_status) 
        VALUES ('".$team_size."','".$_SESSION['currentuserid']."','".$host_id."','".$workspace_id."',0,
            '".$from_date."','".$to_date."','".$total_amount."',0,0)";
    	
        $query = mysql_query($sql);

        if(isset($query)){
            echo $jsfrom_date;
        }
        else
        {
            echo "failure";
        }

    	?>
