<?php
//conection to database
$link=mysqli_connect("localhost","root","","k1");
//check connection_aborted
  if($link===false){die("ERROR:COULD NOT CONNECT.".mysql_connect_error());
  }	
  //
  $BILL= (int) $_POST['BILL'];
  $MEDICATION=$_POST['MEDICATION'];
 $id=$_POST['id'];
  //save the data into table
  

 
  $q="update p1 set BILL='$BILL',MEDICATION='$MEDICATION', status= status - $BILL where idno=$id";
  
    //process the querry
	if(mysqli_query($link,$q)){
    header('location:viewK.php');}
        else{
            echo "ERROR:COULD NOT execute" .$q.
            mysqli_error($link);
        }
  
	
//close connection
mysqli_close($link)

?>