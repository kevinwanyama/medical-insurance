<?php
// Include config file
require_once "configK.php";
 
// Define variables and initialize with empty values
$name = $idno =$EMAIL =$GENDER = $status = "";
$name_err = $idno_err = $EMAIL_err= $GENDER_err = $status_err= "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate  idno
    $input_idno = trim($_POST["idno"]);
    if(empty($input_idno)){
        $idno_err = "Please enter an idno.";     
    } else{
        $idno = $input_idno;
    }
    // Validate  status
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter an status.";     
    } else{
        $status = $input_status;
    }
    
    

    // Validate  GENDER
    $input_GENDER = trim($_POST["GENDER"]);
    if(empty($input_GENDER)){
        $idno_err = "Please enter an GENDER.";     
    } else{
        $GENDER = $input_GENDER;
    }
    // Validate  EMAIL
    $input_EMAIL = trim($_POST["EMAIL"]);
    if(empty($input_EMAIL)){
        $EMAIL_err = "Please enter an EMAIL";     
    } else{
        $EMAIL = $input_EMAIL;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($idno_err) && empty($status_err)&& empty($EMAIL_err)&& empty($GENDER_err)){
        // Prepare an update statement
        $sql = "UPDATE P1 SET name=?, idno=?, status=?  EMAIL=? GENDER=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_idno, $param_status,$param_EMAIL,$param_GENDER, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_idno = $idno;
            $param_status = $status;
            $param_EMAIL = $EMAIL;
            $param_GENDER = $GENDER;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: iNSU1.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM p1 WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $idno = $row["idno"];
                    $status = $row["status"];
                    $EMAIL = $row["EMAIL"];
                    $GENDER = $row["GENDER"];
                    $pic = $row["pic"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($idno_err)) ? 'has-error' : ''; ?>">
                            <label>idno</label>
                            <textarea name="idno" class="form-control"><?php echo $idno; ?></textarea>
                            <span class="help-block"><?php echo $idno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                            <label>status</label>
                            <textarea name="address" class="form-control"><?php echo $status; ?></textarea>
                            <span class="help-block"><?php echo $status_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($EMAIL_err)) ? 'has-error' : ''; ?>">
                            <label>EMAIL</label>
                            <textarea name="EMAIL" class="form-control"><?php echo $EMAIL; ?></textarea>
                            <span class="help-block"><?php echo $EMAIL_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty(GENDER_err)) ? 'has-error' : ''; ?>">
                            <label>GENDER</label>
                            <input type="text" name="GENDER" class="form-control" value="<?php echo $GENDER; ?>">
                            <span class="help-block"><?php echo $GENDER_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="insu1.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>