<!-- save.php -->
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="instarent";		
$conn = mysql_connect($servername, $username,$password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);

$data = json_decode(file_get_contents("php://input"));
$fname = mysql_real_escape_string($data->fname);
$surname = mysql_real_escape_string($data->surname);
$password = mysql_real_escape_string($data->password);
$email = mysql_real_escape_string($data->email);
$company = mysql_real_escape_string($data->company);
$gender = mysql_real_escape_string($data->gender);
$contact =mysql_real_escape_string($data->contact);
$bday = mysql_real_escape_string($data->bday);
$about = mysql_real_escape_string($data->about);

$sql="UPDATE user set email= '".$email."' , password = '".$password."', first_name = '".$fname."',
surname = '".$surname."' where userid = '".$_SESSION['currentuserid']."'  "; 

mysql_query($sql);

$sql = $sql="UPDATE user_details set gender= '".$gender."' , about = '".$about."' , 
birth_date = '".$bday."', contact = '".$contact."', company_name = '".$company."'
where user_id = '".$_SESSION['currentuserid']."'  "; 

mysql_query($sql);

echo "success";


?>
