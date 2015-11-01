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
        
        
    $sql = "SELECT * FROM venue where event_type = '".$event_type."' AND city = '".$city."' AND state = '".$state."' ";

        $query = mysql_query($sql);
        $i = 0;
        if(!is_resource($query)){
            die('Can\'t connect : ' . mysql_error());
        }
        while($row = mysql_fetch_assoc($query)){


        ${"workspace_".$i}=$row;

        $i++;
        
        
        }
        
        $j=0;
        while($j<$i){

            $sql = "SELECT * FROM workspace INNER JOIN spacetype ON workspace.type = spacetype.spacetype_id where workspace_id='".${"workspace_".$j}['workspace_id']."'";
            $querydetails = mysql_query($sql);  
            if(!is_resource($querydetails)){
            die('Can\'t connect : ' . mysql_error());
            }

            ${"details_".$j} = mysql_fetch_assoc($querydetails);
            $sql = "SELECT hourly_price, weekly_price, monthly_price from workspace_pricing where venue_id='".${"workspace_".$j}['workspace_id']."'"; 
            $query_pricing = mysql_query($sql); 
            if(!is_resource($query_pricing)){
            die('Can\'t connect : ' . mysql_error());
            }
            $sql="SELECT * FROM amenities where workspace_id ='".${"workspace_".$j}['workspace_id']."' ";
            $query_amenities = mysql_query($sql);
            ${"amenity_".$j}[]= mysql_fetch_assoc($query_amenities);

            ${"pricing_".$j} = mysql_fetch_assoc($query_pricing);
            ${"details_".$j}['name']=${"workspace_".$j}['name'];
            ${"details_".$j}['event_type']=${"workspace_".$j}['event_type'];
            
            ${"workspacedata_".$j}=array_merge(${"details_".$j},${"pricing_".$j},${"amenity_".$j});
            $workspace_data[$j]= ${"workspacedata_".$j};
            
            $j++;
        }
        

        

        // // convert to json
        if(isset($workspace_data)){
          $json = json_encode( $workspace_data );

        
        // // // echo the json string
        echo $json;
    }
?>
