<?php
$con=mysqli_connect('localhost','root','','K1');
if(!$con)
{
    die("The connection could not be established".mysqli_connect_error());
}
if(isset($_POST['submit_form']))
{

    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="SELECT `email`, `password` FROM `i1` WHERE email='".$email."' AND password='".$pass."'";
    echo $sql;
    $sql_run=mysqli_query($con,$sql);
    
    $count = mysqli_num_rows($sql_run);
    
    if($count>0)
    {
        echo "connection successful";
        session_start();
        header('location:insu1.php');
    }
    else{
        header('location:W1.php');
    }

}

?>