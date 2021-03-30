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
    <title>ADMISTRATOR</title>
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
        <a class="nav-link" href="W1.php">EXIT PG</a>
      </li>
      
      
      
    </ul>
    
  </div>
</nav><br/><br/>


}

</head>
<body>
<div class="wrapper">
  <div class="container-fluid">
     <div class="row">
         <div class="col-md-12">
              <div class="page-header clearfix">
                  <h2 class="pull-left">CLIENT RECORDS</h2>
                  <div class="active-pink-3 active-pink-4 mb-4">
  <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search by ID number" aria-label="Search">
</div>
               </div>
                    <?php
                    // Include config file
                    require_once "configK.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM p1";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table id ='myTable'class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>name</th>";
                                        echo "<th>idno</th>";
                                        echo "<th>status</th>";
                                        echo "<th>BILL</th>";
                                        echo "<th>MEDICATION</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['idno'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['BILL'] . "</td>";
                                        echo "<td>" . $row['MEDICATION'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='readK2.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "<a href='updateK.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='deleteK.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>

            </div>        
        </div>
    </div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>


<div>
    <div id="result"></div>
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    <script>
   
    $(document).ready(function(){

        $("#search").keyup(function(){
var K=$("#search").val();
            var txt=$(this).val();
            if(txt!=''){
            var dataString={'id':txt};
            console.log(txt);
      $.ajax({
        
        type: "POST",
      url: "search.php",
      data: dataString,
      success: function() {
       console.log("sucess");
      }
               });
            }else{
          
                $.ajax({
        type: "POST",
      url: "search.php",
      data: dataString,
      success: function() {
       console.log("sucfailess");
      }
               }); 
            }
        });
    });
    
    
    </script>

</body>

</html>