

<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'K1');
 if(isset($_POST['submit'])){
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$image = $_FILES['image']['name'];
// $img = file_get_contents($image);
$name = $_POST['name'];
$email = $_POST['email'];
$idno = $_POST['idno'];
$status = $_POST['status'];
$gender = $_POST['gender'];
$target_dir = "img/";
$target_file = $target_dir."".$_FILES['image']['name'];
// $file = $_FILE["image"]["tmp_name"];


if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
  $sql="insert into p1 (name,email,idno,status,pic,gender) values('$name','$email',$idno,$status,'$image','$gender')";
}

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
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 850px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <title>NEW CLIENT</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://image.freepik.com/free-icon/important-person_318-10744.jpg" width="100" height="100" class="d-inline-block align-top" alt="">
    <B><center> MEDIPAY INS</center></B> <BR/>

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="insu1.php">HOME <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="newclientK.php">NEWCLIENT</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="ADDHSP.php">ADDHSP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="HSPrec.php">HSPREC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="K1.PHP">EXIT PG</a>
      </li>
      
      
      
    </ul>
    
  </div>
</nav><br/><br/>


</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<h2 class="pull-left">NEW CLIENT RECORDS</h2><br/><br/><br/><br/>

<div class="form-row">
       <div class="form-group col-md-6">
      <label for="validationServer01">name</label>
      <input type="text" name="name"class="form-control is-valid" id="validationServer01" value="" required>
      <div class="valid-feedback">
       
      </div>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">email</label>
      <input type="email" name="email"class="form-control" id="inputEmail4" >
    </div>
    </div>
    <div class="form-group col-md-6">
      <label for="validationServer01">idno</label>
      <input type="text" name="idno"class="form-control is-valid" id="validationServer01" value="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="validationServer01">status</label>
      <input type="text" name="status" class="form-control is-valid" id="validationServer01" placeholder="ksh" required>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">city</label>
      <input type="text" name="city"class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">gender</label>
      <select id="inputState" name="gender" class="form-control" placeholder="select gender"required>
        <option >MALE</option>
        <option>FEMALE</option>
        <option>BISEXUAL</option>
      </select>
      </div>
  </div><br><br><br><br>
  
    <input type="file" value="upload picture" name="image" />
   
    <br><br>
<button type="submit" value="insert" name="submit" class="btn btn-primary">SUBMIT</button>
  
  </form>
      </div>
    </div>
    
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<?php
// $msg = '';
// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $image = $_FILES['image']['tmp_name'];
//     $img = file_get_contents($image);
//     $con = mysqli_connect('localhost','root','','k1') or die('Unable To connect');
//     $sql = "insert into p1 (pic) values(?)";

//     $stmt = mysqli_prepare($con,$sql);

//     mysqli_stmt_bind_param($stmt, "s",$img);
//     mysqli_stmt_execute($stmt);

//     $check = mysqli_stmt_affected_rows($stmt);
//     if($check==1){
//         $msg = 'Image Successfullly UPloaded';
//     }else{
//         $msg = 'Error uploading image';
//     }
//     mysqli_close($con);
// }
?>

<?php
    // echo $msg;
?>
    
  
  


</body>
</html>