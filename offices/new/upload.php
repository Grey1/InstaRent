<?php
session_start();
    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        //upload and stored images
        $target_dir = "images/";
        $target_file = $target_dir.$val;
        if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
            $images_arr[] = $target_file;
        }
    }


$index = 0;

if(!empty($images_arr)){ 
    foreach($images_arr as $image_src){ 
        $index++;
        if($index<11){
        ?>

        <div id = "<?php echo $index ?>" style="position:relative; max-width: 250px; margin-top:5%; margin-right:5%; display:inline-flex">
            
                <img id = "img_<?php echo $index ?>" src="<?php echo $image_src; ?>" class="img-rounded img-responsive" alt="Image" style="max-height:150px;cursor:pointer;">
                <a class="btn" data-toggle="modal" href="#" data-target="#delete<?php echo $index ?>"> 
                    <span class ="glyphicon glyphicon-trash" aria-hidden="true" ></span></a>           
                <input type="text" name="" id="inputhidden<?php echo $index ?>" class="form-control" value="<?php echo $image_src; ?>" ng-model="photoname<?php echo $index ?>" style="display:none">
                

        </div>
        <div class="modal fade" id="delete<?php echo $index; ?>" style="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Delete Photo</h4>
                    </div>
                    <div class="modal-body">
                        <p> Are you sure you wish to delete this photo? It's a nice one! <p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id = "deleteimage" onclick="deleteDiv(<?php echo $index; ?>)">Delete</button>
                        <input type="hidden" name="" id="index_id<?php echo $index; ?>" class="form-control" value="<?php echo $index; ?>">

                    </div>
                </div>
            </div>
        </div>



<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname="instarent";        
$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);

$column_name = "image_".$index;
$sql = "UPDATE workspace SET ".$column_name." = '".$image_src."' WHERE venue_id='".$_SESSION["venueid"]."'" ;

$query = mysql_query($sql, $conn);
}
else{
    echo '<span class="label label-warning">Maximum upload limit is 10 Photos</span>';
    break;
}



}
mysql_close($conn);
}
?>
