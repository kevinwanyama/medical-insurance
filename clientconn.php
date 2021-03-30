<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'K1');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$idno = $_POST['idno'];
$status = $_POST['status'];
$gender = $_POST['gender'];
$file = addslashes(file_get_contents($_FILE["image"]["tmp_name"]));


$sql="insert into p1 (name,email,idno,status,pic,gender) values('$name','$email','$idno','$status','$file','$gender')";

if(!mysqli_query($link,$sql))
{
    echo 'not inserted';
}
else
{
    echo 'inserted';
}

header("location:insu1.php");
exit();

?>
