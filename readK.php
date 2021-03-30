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
                        <h1>View Record</h1>
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
                        <label>idno</label>
                        <input class="form-control-static" name="id" value=<?php echo $row["idno"]; ?> readonly>
                    </div>
                <div class="form-group">
                       // <label>status</label>
                       // <p class="form-control-static"><?php echo $row[""]; ?></p></div>
                        </div>
  <div class="col-4">
                        <?php
$con = mysqli_connect('localhost','root','','k1') or die('Unable To connect');


$id=$_GET["id"];
   $res=mysqli_query($con,"select * from p1 where id=$id");
   
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
 
</div>
  </div>                  
                        
                       
    <div class="form-group">
    <label for="BILL">TOTAL BILL</label>
    <input type="int" class="form-control" id="BILL" name="BILL" placeholder="bill in ksh">
  </div>
  <div class="form-group">
    <label for="CONSULTATION">CONSULTATION FEE</label>
    <input type="int" class="form-control" id="CONSULTATION" name="CONSULTATION" placeholder="Fee in ksh">
  </div>
  <div class="form-group">
    <label for="MEDICATION">MEDICATION TYPE</label>
    <input type="text" class="form-control" id="MEDICATION" name="MEDICATION" placeholder="type of medication" required>
  </div>

  <div class="form-group">
    <label for="PHAMACY">MEDICINE GIVEN</label>
    <input type="text" class="form-control" id="PHAMACY" name="PHAMACY" placeholder="type medicines given" required>
  </div>
  <div class="form-group">
    <label for="DIAGNOSIS">DIAGNOSIS</label>
    <input type="text" class="form-control" id="DIAGNOSIS" name="DIAGNOSIS" placeholder="type diagnosis" required>
  </div>
  <div class="form-group">
    <label for="LAB">LAB TEST</label>
    <input type="text" class="form-control" id="LAB" name="LAB" placeholder="type labaroty tests" required>
  </div>
  <div class="form-group">
    <label for="LAB">HSP EMAIL</label>
    <input type="text" class="form-control" id="HEMAIL" name="HEMAIL" placeholder="type hospital email" required>
  </div>

  <input type="submit" class="btn btn-primary" value="Submit" name="P1"><br/><br/>
                    <p><a href="viewK.php" class="btn btn-primary">cancel</a></p>
  </form>
    </div>
                    </div>
                    
                    
                </div>
            </div>        
        </div>
    
   
</body>
</html>