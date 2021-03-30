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
$password =$_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];


$sql="INSERT INTO `h1`(`name`,`email`, `password`, `address`, `city`) VALUES ('$name','$email','$password','$address','$city')";
echo $sql;
if(!mysqli_query($link,$sql))
{
    echo 'not inserted';
}
else
{
    echo 'inserted';
    header("location:HSPrec.php");
}


exit();

?>
