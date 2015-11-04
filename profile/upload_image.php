<!-- upload_image.php -->
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


if(!empty($images_arr)){ 
    foreach($images_arr as $image_src){ 
        
        
        ?>
    

<img src="<?php echo $image_src; ?>" class="avatar img-circle" alt="avatar"
 style="height:80px; width:80px;cursor:pointer;">



  <?php  } }




$servername = "localhost";
$username = "root";
$password = "";
$dbname="instarent";        
$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);

$column_name = "photo_path";
$sql = "UPDATE user_details SET ".$column_name." = '".$image_src."' WHERE user_id='".$_SESSION["currentuserid"]."'" ;
$_SESSION['currentuserphoto'] = $image_src;
$query = mysql_query($sql, $conn);




mysql_close($conn);
?>












 
