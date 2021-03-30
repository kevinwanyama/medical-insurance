<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "configK.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM p1 WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $address = $row["idno"];
                $salary = $row["status"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .col-4{
            float:left;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>CLAIM DECISION</h1>
                    </div>
                    <form ACTION="k1con.php"method="post">
<div class="container-fluid">
<div class="row">
  <div class="col-4">
  <div class="form-group">
                        <label>name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <p class="form-control-static"><?php echo $row["EMAIL"]; ?></p></div>
                    <div class="form-group">
                        <label>idno</label>
                        <input class="form-control-static" name="id" value=<?php echo $row["idno"]; ?> readonly>
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <p class="form-control-static"><?php echo $row["status"]; ?></p></div>
                        </div>
                        <div class="form-group">
                        <label>GENDER</label>
                        <p class="form-control-static"><?php echo $row["GENDER"]; ?></p></div>
                        </div>
                        </div>
                        </div>
  <div class="col-4" style="position:absolute;top:100px;left:50%">
                        <?php
$con = mysqli_connect('localhost','root','','k1') or die('Unable To connect');

$id=$_GET['id'];

   $res=mysqli_query($con,"select * from p1 where id='$id'");
   echo "<table>";
   echo "<tr>";
   
   while($row=mysqli_fetch_array($res))
   {
   echo "<td>"; 
   echo '<img src="img/'.$row['pic'].'" height="200" width="150"/>';
   echo "<br>";
   ?><?php
   echo "</td>";
   } 
   echo "</tr>";
   
   echo "</table>";
  
?></div>

    <DIV><p><a href="insu1.php" class="btn btn-primary">APPROVED</a></p></DIV>
    <p><a href="insu1.php" class="btn btn-primary">DECLINE</a></p><BR/><BR/><BR/>
    <p><a href="insu1.php" class="btn btn-primary">EXIT</a></p><BR/><BR/><BR/>
    

</body>
</html>