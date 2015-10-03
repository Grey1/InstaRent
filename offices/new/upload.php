<?php
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
    foreach($images_arr as $image_src){ ?>
        <ul>
            <li>
                <img src="<?php echo $image_src; ?>" alt="">
            </li>
        </ul>
<?php }
}
?>