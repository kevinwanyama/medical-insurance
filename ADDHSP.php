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
    <title>crud</title>
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
<form method="post" action="hospcon.php">
<h2 class="pull-left">NEW HOSPITAL RECORDS</h2><br/><br/><br/><br/>
<div class="form-group">
    <label for="inputAddress">name</label>
    <input type="text" name="name" class="form-control" id="inputAddress"  required>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">email</label>
      <input type="email" name="email"class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">city</label>
      <input type="text" name="city"class="form-control" id="inputCity" required>
    </div>
  </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Submit" name="h1"><br/><br/>
  
</form>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</html>