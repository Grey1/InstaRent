<?php

session_start();

      // set up the connection variables
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="instarent";		

		$data = json_decode(file_get_contents("php://input"));

		$state = mysql_real_escape_string($data->state);
		
		$event_type = mysql_real_escape_string($data->event_type);

		$city = mysql_real_escape_string($data->city);

		$conn = mysql_connect($servername, $username,$password);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}

		mysql_select_db($dbname,$conn);
        
        $x=strlen($event_type);
        $y=strlen($state);
        $z=strlen($city);
        // connect to the database
        // $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // a query get all the records from the users table
        if($x and $y and $z)
            $sql = "SELECT event_type, name, workspace_id FROM venue where event_type = '".$event_type."' AND city = '".$city."' AND state = '".$state."' ";
        else if(!$x and !$y and !$z){
            $sql = "SELECT event_type, name, workspace_id FROM venue where 1=1";
        }


        // $sql1 = "SELECT photo_id from workspace where workspace_id = '".$workspace_id."' ";

        // use prepared statements, even if not strictly required is good practice
        // $stmt = $dbh->prepare($sql);

        // execute the query
        // $stmt->execute();
        $query = mysql_query($sql);
        
        // fetch the results into an array
        // $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
        $i = 0;
        while($row = mysql_fetch_assoc($query)){


        ${"workspace_".$i}=$row;

        $i++;
        
        
        }
        
        $j=0;
        while($j<$i){

            $sql = "SELECT * FROM workspace where workspace_id='".${"workspace_".$j}['workspace_id']."'";
            $querydetails = mysql_query($sql);  
            ${"details_".$j} = mysql_fetch_assoc($querydetails);
            $sql = "SELECT hourly_price, weekly_price, monthly_price from workspace_pricing where workspace_id='".${"workspace_".$j}['workspace_id']."'"; 
            $query_pricing = mysql_query($sql); 
            ${"pricing_".$j} = mysql_fetch_assoc($query_pricing);
            ${"details_".$j}['name']=${"workspace_".$j}['name'];
            ${"details_".$j}['event_type']=${"workspace_".$j}['event_type'];
            ${"workspacedata_".$j}=array_merge(${"details_".$j},${"pricing_".$j});
            $workspace_data[$j]= ${"workspacedata_".$j};
            $j++;
        }
        

        

        // // convert to json
          $json = json_encode( $workspace_data );

        
        // // // echo the json string
        echo $json;
?>
